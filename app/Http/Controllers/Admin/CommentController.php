<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Repository\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:list comment', ['only' => ['index','listReply']]);
        $this->middleware('permission:detroy comment', ['only' => ['detroyReply','detroy']]);
        $this->middleware('permission:reply-comment', ['only' => ['replyComment']]);
    }

    public function index(){
       $this->comment = new CommentRepository();
       $data['comments'] = $this->comment->index();
       return view('admin.comment.comment', $data);
   }
   public function listReply($id){
       $this->comment = new CommentRepository();
       $data['replyComment'] = $this->comment->listReply($id);
       $data['comment'] = $this->comment->comment($id);
       return view('admin.comment.reply_comment', $data);
   }
   public function replyComment(CommentRequest $request,$id){
       $this->comment = new CommentRepository();
       $this->comment->addNewComment($request,$id);
       return redirect()->back()->with('msg','Trả lời bình luận thành công');
   }
   public function detroyReply($id){
       $this->comment = new CommentRepository();
       $this->comment->detroyReply($id);
       return redirect()->back()->with('msg','Xóa bình luận thành công');
   }
   public function detroy($id){
       $this->comment = new CommentRepository();
       $this->comment->detroy($id);
       return redirect()->back()->with('msg','Xóa bình luận thành công');
   }
}
