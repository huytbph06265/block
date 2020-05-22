<?php
namespace App\Repository;

use App\models\Comment;
use App\models\Permission;
use App\User;
use Illuminate\Http\Request;



class PermissionRepository
{
    public function index(){
        return Permission::pluck('code','id');
    }

}
