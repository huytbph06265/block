<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAccountRequest;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{

    function __construct()
    {
        $this->user = new UserRepository();
    }

    public function index(){
        if (Gate::allows('user.create')){
            $data['users'] = $this->user->index();
            return view('admin.user.user', $data);
        }
        else{
            return redirect()->route('403');
        }
    }
    public function create(){
        if (Gate::allows('user.create')){
            $this->role = new RoleRepository();
            $data['roles'] = $this->role->index();
            return view('admin.user.add-user',$data);
        }
        else{
            return redirect()->route('403');
        }
    }
    public function store(CreateAccountRequest $request){
        if (Gate::allows('user.create')){
            $this->user->createAccount($request);
            return redirect()->route('list-user');
        }
        else{
            return redirect()->route('403');
        }
    }
    public function show($id){
        if (Gate::allows('user.update')){
            $role = new RoleRepository();
            $data['roles'] = $role->index();
            $data['user'] = $this->user->show($id);
            return view('admin.user.edit-user',$data);
        }
        else{
            return redirect()->route('403');
        }
    }
    public function update(Request $request,$id){
        if (Gate::allows('user.update')){
            $this->user->update($request,$id);
            return redirect()->route('list-user');
        }
        else{
            return redirect()->route('403');
        }

    }
}
