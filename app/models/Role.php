<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "role";
    protected $fillable = [
        'name',
    ];
    public function users(){
        $this->belongsToMany(\App\User::class, 'user_role');
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class,'permission_role','role_id','permission_id');
    }


}
