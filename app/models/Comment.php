<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="comments";
    protected $fillable=[
        'content',
        'post_id',
        'user_id',
        'name',
        'email',
        'parent',
        'is_delete',
        'creator_at',
        'updator_at',
    ];

    public function post(){
        return $this->belongsTo('App\models\Post','post_id','id');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
