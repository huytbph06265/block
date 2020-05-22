<?php
namespace App\Repository;

use App\models\Comment;
use App\models\Role;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class RoleRepository
{
    public function index(){
        return Role::all();
    }
    public function store(Request $request){
        $p = $request->permission;
        $role = Role::create(['name' => $request->role]);
        $role->permissions()->attach($p);;
    }
    public function show($id){
        return Role::find($id);
    }
    public function update(Request $request,$id){
        $role = Role::find($id);
        $role->name = $request->role;
        $role->save();

        $b= $request->permissions;
        $p= $role->permissions;

        if (empty($b)) {
            $role->permissions()->detach($b);
        }
        else{
            $role->permissions()->attach($b);
        }
    }
    public function destroy($id)
    {
        return Role::destroy($id);
    }

}
