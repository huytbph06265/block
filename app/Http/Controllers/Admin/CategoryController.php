<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repository\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:list category', ['only' => ['index',]]);
        $this->middleware('permission:add category', ['only' => ['create','store']]);
        $this->middleware('permission:edit category', ['only' => ['show','update']]);
        $this->middleware('permission:detroy category', ['only' => ['detroy']]);
    }
    public function index(){
        $this->category = new CategoryRepository();
        $data['category'] = $this->category->getAll();
        return view('admin.category.category', $data);
    }
    public function create(){
        return view('admin.category.add-category');
    }
    public function store(CategoryRequest $request){
        $this->category = new CategoryRepository();
        $this->category->store($request);
        return redirect()->route('list-category')->with('msg','Thêm danh mục thành công');
    }
    public function detroy($id){
        $category = new CategoryRepository();
        $category->detroy($id);
        return redirect()->back()->with('msg','Xóa danh mục thành công');
    }
    public function show($id){
        $category = new CategoryRepository();
        $data['category'] = $category->show($id);
        return view('admin.category.edit-category', $data);
    }
    public function update(CategoryRequest $request,$id){
        $category = new CategoryRepository();
        $category->update($request,$id);
        return redirect()->route('list-category')->with('msg','Sửa danh mục thành công');
    }
}
