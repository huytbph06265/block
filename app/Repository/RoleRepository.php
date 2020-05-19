<?php
namespace App\Repository;

use App\models\Comment;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleRepository
{
    public function index(){
        return Role::pluck('name','id');
    }
    public function store(Request $request){
        $p = $request->permission;
        $role = Role::create(['name' => $request->role]);
        $role->givePermissionTo($p);
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
        if (!empty($b) && count($p) != 0) {
            for ($i=0; $i <count($p) ; $i++) {
                $h[] = $p[$i]->id;
            }
            $k = array_diff($h,$b);
            foreach ($k as $key => $value) {
                $role->revokePermissionTo($value);
            }
        }
        elseif (empty($b)) {
            $role->revokePermissionTo($p);
        }
        $role->givePermissionTo($b);
    }
    public function destroy($id)
    {
        return Role::destroy($id);
    }

}
