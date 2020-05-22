<?php

namespace App\Repository;

use App\models\Comment;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use function GuzzleHttp\Psr7\str;


class PostRepository
{
    public function getPostNew()
    {
        return Post::select('view','id','title','image','summary')->where('is_delete', 0)->orderBy('created_at', 'desc')->limit(5)->withCount(['comments'])->get();
    }

    public function getPostView()
    {
        return Post::where('is_delete', 0)->limit(8)->withCount(['comments'])->get();
    }

    public function getPostMain()
    {
        $cate_info = Category::where('is_delete', 0)->get();
        $cate_info = $cate_info->map(function ($q) {
            $q->setRelation('posts', $q->posts->take(4));
            return $q;
        });
        return $cate_info;
    }

    public function getPostCate($id)
    {
        $cate = Category::find($id);
        return Post::where('cate_id', $id)->where('is_delete', 0)->withCount(['comments'])->paginate(6);;
    }

    public function getPostDetail($id)
    {
        $post = Post::with(['category','user'])->withCount(['comments'])->find($id);
        return $post;
    }
    public function index(){
        return Post::with(['category','user'])->where('is_delete', 0)
            ->get();
    }
    public function store(Request $request){
        $post = new Post();
        $data = [
            'title' => $request->title,
            'cate_id' => $request->cate_id,
            'user_id' => $request->user_id,
            'publish_date' =>$request->publish_date,
            'summary' => $request->summary,
            'content' => $request['content'],
            'creator_at'=> $request->user_id,
        ];
        $post->fill($data);
        if ($request->has('image'))
        {
            $filename = $request->image->getClientOriginalName();
            $filename = str_replace('','-',$filename);
            $filename = uniqid().'-'.$filename;
            $post->image = request()->image->move('images', $filename);
        }
        $post->save();
    }

    public function show($id){
        return $post = Post::with(['category','user'])->find($id);
    }
    public function update(Request $request,$id){
        $post = Post::find($id);
        $data = [
            'title'=> $request->title,
            'cate_id' => $request->cate_id,
            'user_id' =>$request->user_id,
            'publish_date' =>$request->publish_date,
            'summary' => $request->summary,
            'content' => $request['content'],
            'updator_at' => $request->user_id
        ];
        $post->fill($data);
        if ($request->has('image'))
        {
            $filename = $request->image->getClientOriginalName();
            $filename = str_replace('','-',$filename);
            $filename = uniqid().'-'.$filename;
            $post->image = request()->image->move('images', $filename);
        }
        $post->save();

    }
    public function destroy($id){
        $post = Post::where('id','=', $id)->where('is_delete', 0)->first();
        if(!empty($post)){
            $post->is_delete = 1;
            $post->save();
        }

        $comments = Comment::where('is_delete', 0)->where('post_id', $id)->pluck('id');
        foreach ($comments as $key => $value){
            $comment = new CommentRepository();
            $comment->detroy($value);
        }
    }
    public function view(Request $request,$id){
        $value = $request->session()->get('key');
        $post = Post::findOrFail($id);
        if (!$value) { //nếu chưa có session
            $request->session()->put('key', 1);
            $post->increment('view');
        }
    }
}
