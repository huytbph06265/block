<?php
namespace App\Repository;

use App\Models\Category;
use App\models\Post;
use Illuminate\Http\Request;

class CategoryRepository
{
    public function getAll()
    {
        return Category::where('is_delete', 0)->withCount(['posts'])->get();
    }
    public function store(Request $request){
        $category = new Category();
        $data = [
            'name' => $request->name,
            'description'=> $request->description,
            'creator_at' => $request->user_id,
        ];
        $category->fill($data);
        if ($request->has('image')){
            $filename = $request->image->getClientOriginalName();
            $filename = str_replace('','-',$filename);
            $filename = uniqid().'-'.$filename;
            $category->image = request()->image->move('images', $filename);
        }
        $category->save();
    }
    public function detroy($id){
        $post = new PostRepository();
        $category = Category::find($id);
        $posts = Post::where('cate_id', $id)->pluck('id');
        $category->is_delete = 1;
        $category->save();
        foreach ($posts as $key => $value){
            $post->destroy($value);
        }
    }
    public function show($id)
    {
        return Category::find($id);
    }
    public function update(Request $request,$id){
        $category = Category::find($id);
        $data = [
          'name' => $request->name,
            'description' =>$request->description,
            'updator_at' => $request->user_id,
        ];
        $category->fill($data);
        if ($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $filename = str_replace('','-',$filename);
            $filename = uniqid().'-'.$filename;
            $category->image = request()->image->move('images',$filename);
        }
        else{
            $category->image = $category->image;
        }
        $category->save();
    }
}
