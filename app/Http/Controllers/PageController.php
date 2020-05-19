<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccountRequest;
use App\Http\Requests\Request\CommentRequest;
use App\models\Post;
use App\models\Category;
use App\Repository\CategoryRepository;
use App\Repository\CommentRepository;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;

class PageController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->post= new PostRepository();

    }

    public function home()
    {
        $data['postNew'] = $this->post->getPostNew();
        $data['postView'] = $this->post->getPostView();
        $data['postMain'] = $this->post->getPostMain();

        return view('client.home', $data);
    }

    public function cate($id)
    {
        $this->cate = new CategoryRepository();
        $data['postView'] = $this->post->getPostView();
        $data['postCate'] = $this->post->getPostCate($id);
        $data['cate'] = $this->cate->show($id);
        return view('client.cate', $data);
    }
    public function detail(Request $request,$id){
        $this->post->view($request,$id);
        $data['postView'] = $this->post->getPostView();
        $data['postDetail'] = $this->post->getPostDetail($id);
        return view('client.detail', $data);
    }
    public function comment(\App\Http\Requests\CommentRequest $request){
        $this->comment = new CommentRepository();
        $this->comment = $this->comment->addNewComment($request);
        return redirect()->back();
    }
    public function replyComment(Request $request){
        $this->comment = new CommentRepository();
        $this->comment = $this->comment->addNewComment($request);
        return redirect()->back();
    }
    public function login(){
        return view('client.sign-in');
    }
    public function create(){
        return view('client.create');
    }
    public function createAccount(CreateAccountRequest $request){
        $user = new UserRepository();
        $user->createAccount($request);
        return redirect()->route('sign-in')->with('msg','Bạn đã đăng kí thành công');
    }
    public function demo(){
        $this->post->index();
        $data['postAll'] = $this->post->index();
        return view('admin.demo', $data);
    }
}
