<?php
namespace App\Repository;

use App\models\Comment;
use Illuminate\Http\Request;


class CommentRepository
{
    public function addNewComment(Request $request){
        $comment = new Comment;
        $data = [
            'name'=> $request->name,
            'email' => $request->email,
            'user_id' => $request->user_id,
            'content' => $request->content,
            'post_id' => $request->post_id,
            'creator_at' => $request->user_id,
            'is_delete' => 0,
            'parent' => $request->parent,
        ];
        $comment->fill($data);
        $comment->save();
    }

    public function index(){
        return Comment::with(['post','user'])->where('parent', 0)->where('is_delete',0)->get();
    }
    public function comment($id){
        return Comment::with(['post','user'])->where('parent', 0)->where('is_delete',0)->find($id);
    }
    public function listReply($id){
        return Comment::with(['post','user'])->where('parent', $id)->where('is_delete',0)->get();
    }
    public function detroyReply($id){
        $comment = Comment::find($id);
        $comment->is_delete = 1;
        $comment->save();
    }
    public function detroy($id){
        $comment = Comment::find($id);
        $reply = Comment::where('parent', $id)->pluck('id');
        $comment->is_delete = 1;
        $comment->save();
        foreach ($reply as $key => $value){
            $reply = Comment::find($value);
            $reply->is_delete = 1;
            $reply->save();
        }
    }
    public function countComment(){
        return Comment::where('is_delete', 0)->pluck('id');
    }
    public function countNewComment(){
        $range = \Carbon\Carbon::now(0)->subYears(0)->subMonths(0);
        $date_range1 = date_format($range,"m");
         return Comment::where('is_delete', 0)->where('created_at', '>=', $date_range1)->pluck('id');

    }
}
