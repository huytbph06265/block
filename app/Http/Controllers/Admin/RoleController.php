<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\PermissionRepository;
use App\Repository\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    function __construct()
    {
        $this->role = new RoleRepository();
        $this->permission = new PermissionRepository();
    }

    public function index(){

        if (Gate::allows('role.view')){
            $data['roles'] = $this->role->index();
            return view('admin.role.role', $data);
        }
        else{
            return redirect()->route('403');
        }

    }
    public function create(){
        if (Gate::allows('role.create')){
            $data['permissions'] = $this->permission->index();
            return view('admin.role.add-role', $data);
        }
        else{
            return redirect()->route('403');
        }

    }
    public function store(Request $request){

        if (Gate::allows('role.create')){
            $this->role->store($request);
            return redirect()->route('list-role');
        }
        else{
            return redirect()->route('403');
        }

    }
    public function show($id){

        if (Gate::allows('role.update')){
            $data['permissions'] = $this->permission->index();
            $data['role'] = $this->role->show($id);
            return view('admin.role.edit-role', $data);
        }
        else{
            return redirect()->route('403');
        }
    }
    public function update(Request $request,$id){

        if (Gate::allows('role.update')){
            $this->role->update($request,$id);
            return redirect()->route('list-role');
        }
        else{
            return redirect()->route('403');
        }

    }
    public function detroy($id){
        if (Gate::allows('role.delete')){
            $this->role->destroy($id);
            return redirect()->back();
        }
        else{
            return redirect()->route('403');
        }

    }
}
