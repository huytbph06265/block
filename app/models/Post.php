<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table="posts";
    protected $fillable=[
        'title',
        'cate_id',
        'user_id',
        'image',
        'publish_date',
        'summary',
        'content',
        'is_delete',
        'creator_at',
        'updator_at',
    ];
    public function category(){
        return $this->belongsTo('App\models\Category','cate_id','id');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function comments(){
        return $this->hasMany('App\models\Comment','post_id','id');
    }
    public function scopeSearchPost($query, $title){
        return $query->where('title', 'like','%'.$title.'%');
    }
}
