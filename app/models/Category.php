<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table = "categories";
   protected $fillable =[
       'name',
       'description',
       'is_delete',
       'creator_at',
       'updator_at',
   ];
   public function posts(){
       return $this->hasMany('App\models\Post','cate_id','id');
   }
}
