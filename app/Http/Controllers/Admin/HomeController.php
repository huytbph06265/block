<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository;
use App\Repository\CommentRepository;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:home admin', ['only' => ['index']]);
    }

    public function index(){
        $this->post = new PostRepository();
        $this->comment = new CommentRepository();
        $this->user = new UserRepository();
        $this->category = new CategoryRepository();
        $data['comment'] = $this->comment->countComment();
        $data['post'] = $this->post->index();
        $data['user'] = $this->user->index();
        $data['category'] = $this->category->getAll();
        $commentNew = $this->comment->countNewComment();
        $data['range'] =  (count($commentNew)/count($data['comment']))*100;
        return view('admin.home', $data);
    }
}
