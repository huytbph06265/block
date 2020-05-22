<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\models\Category;
use App\Repository\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->category = new CategoryRepository();
    }
    public function index()
    {
        if (Gate::allows('cate.view')){
            $data['category'] = $this->category->getAll();
            return view('admin.category.category', $data);
        }
        else{
            return redirect()->route('403');
        }
    }

    public function create()
    {
        if (Gate::allows('cate.create')){
            return view('admin.category.add-category');
        }
        else{
            return redirect()->route('403');
        }
    }

    public function store(CategoryRequest $request)
    {
        if (Gate::allows('cate.create')){
            $this->category->store($request);
            return redirect()->route('list-category')->with('msg', 'Thêm danh mục thành công');
        }
        else{
            return redirect()->route('403');
        }
    }

    public function detroy($id)
    {
        if (Gate::allows('cate.delete')){
            $this->category->detroy($id);
            return redirect()->back()->with('msg', 'Xóa danh mục thành công');
        }
        else{
            return redirect()->route('403');
        }
    }

    public function show($id)
    {
        if (Gate::allows('cate.update')){
            $category = $this->category->show($id);
            return view('admin.category.edit-category', compact('category'));
        }
        else{
            return redirect()->route('403');
        }
    }
    public function update(CategoryRequest $request, $id)
    {
        if (Gate::allows('cate.update')){
            $this->category->update($request, $id);
            return redirect()->route('list-category')->with('msg', 'Sửa danh mục thành công');
        }
        else{
            return redirect()->route('403');
        }
    }
}
