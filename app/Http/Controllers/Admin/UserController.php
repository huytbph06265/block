<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAccountRequest;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{


    public function index(){
       $user = new UserRepository();
       $data['users'] = $user->index();
       return view('admin.user.user', $data);
   }
   public function create(){
       $user = new RoleRepository();
       $data['roles'] = $user->index();
       return view('admin.user.add-user',$data);
   }
   public function store(CreateAccountRequest $request){
       $user = new UserRepository();
       $user->createAccount($request);
       return redirect()->route('list-user');
   }
   public function show($id){
       $user = new UserRepository();
       $role = new RoleRepository();
       $data['roles'] = $role->index();
       $data['user'] = $user->show($id);
       return view('admin.user.edit-user',$data);
   }
   public function update(Request $request,$id){
        $user = new UserRepository();
        $user->update($request,$id);
        return redirect()->route('list-user');
   }
}
