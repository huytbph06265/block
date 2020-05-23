<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\models\Post;
use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{
    function __construct()
    {

        $this->post = new PostRepository();

    }


    public function index()
    {
        if (Gate::allows('post.view')){
            $this->cate = new CategoryRepository();
            $this->user = new UserRepository();
            $data['cateAll'] = $this->cate->getAll();
            $data['userAll'] = $this->user->getAll();
            return view('admin.post.list-post', $data);
        }
        else{
            return redirect()->route('403');
        }
    }

    public function postData(Request $request)
    {
        if (Gate::allows('post.view')){

            $totalRecord = Post::count();
            $s = $request->search['value'];

            $postData = Post::with(['category', 'user'])
                ->where('is_delete', 0);
            if (!empty($s)) {
                $postData = $postData->searchPost($s);
            }
            $totalFillter = $postData->count();
            $postData = $postData->orderBy('id', 'desc')
                ->offset($request->start)
                ->limit($request->length)->get();
            $postData->map(function ($postInfo) {
                if (in_array('edit_post', Auth::user()->hasPermission())){
                    $postInfo->update = 1;
                }
                else{
                    $postInfo->update = 0;
                }
                if (in_array('delete_post', Auth::user()->hasPermission())){
                    $postInfo->delete = 1;
                }
                else{
                    $postInfo->delete = 0;
                }
                return $postInfo;
            });
            $postData = $postData->toArray();
            $draw = $request->draw;
            $a = array(
                "draw" => $draw,
                "recordsTotal" => $totalRecord,
                "recordsFiltered" => $totalFillter,
                "data" => $postData,
            );
            return json_encode($a);
        }
        else{
            return redirect()->route('403');
        }
    }

    public function store(Request $request)
    {

        if (Gate::allows('post.create')){
            $this->post = $this->post->store($request);
            return response()->json(['success' => 'Thêm bài viết mới thành công.']);
        }
        else{
            return redirect()->route('403');
        }
    }

    public function show($id)
    {
        if (Gate::allows('post.update')){
            $data = $this->post->show($id);
            return response()->json(['data'=> $data]);
        }
        else{
            return redirect()->route('403');
        }
    }
    public function update(Request $request, $id)
    {
        if (Gate::allows('post.update')){
            $this->post->update($request, $id);
            return response()->json(['success' => 'Sửa bài viết mới thành công']);
        }
        else{
            return redirect()->route('403');
        }
    }

    public function detroy($id)
    {
        $post = Post::where('user_id', Auth::user()->id)->first();
        if (Gate::allows('post.delete', $post)){
            $this->post->destroy($id);
        }
        else{
            return redirect()->route('403');
        }
    }

    public function detail($id)
    {
        $data['post'] = $this->post->getPostDetail($id);
        return view('admin.post.detail-post', $data);
    }
}
