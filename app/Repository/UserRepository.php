<?php
namespace App\Repository;

use App\models\Comment;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserRepository
{
    public function getAll(){
        return User::where('is_delete',0)->pluck('name','id');
    }
    public function createAccount(Request $request){
        $user = new User();
        $data= [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        $user->fill($data);
        if ($request->has('image'))
        {
            $filename = $request->image->getClientOriginalName();
            $filename = str_replace('','-',$filename);
            $filename = uniqid().'-'.$filename;
            $user->image = request()->image->move('images',$filename);
        }
        $user->save();
        if (empty($request->roles)  ){
            $user->assignRole('Thành viên');
        }
        else{
            $r = $request->roles;
            $user->assignRole($r);
        }
    }
    public function index(){
        return User::where('is_delete', 0)->get();
    }
    public function show($id){
        return User::find($id);
    }
    public function update(Request $request,$id){
        $user = User::find($id);
        $data= [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        $user->fill($data);
        if ($request->has('image'))
        {
            $filename = $request->image->getClientOriginalName();
            $filename = str_replace('','-',$filename);
            $filename = uniqid().'-'.$filename;
            $user->image = request()->image->move('images',$filename);
        }
        else{
            $user->image = $user->image;
        }
        $user->save();
        $b= $request->roles;
        $p= $user->roles;

        if (!empty($b) && count($p) != 0) {
            for ($i=0; $i <count($p) ; $i++) {
                $h[] = $p[$i]->id;
            }
            $k = array_diff($h,$b);
            foreach ($k as $key => $value) {
                $user->removeRole($value);
            }
        }
        elseif (empty($b)) {
            foreach ($p as $key => $value) {
                $user->removeRole($value);
            }
        }
        $user->assignRole($b);
    }
}
