<?php
namespace App\Repository;

use App\models\Comment;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionRepository
{
    public function index(){
        return Permission::pluck('name','id');
    }

}
