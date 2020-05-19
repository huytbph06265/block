<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\PermissionRepository;
use App\Repository\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:list role', ['only' => ['index']]);
        $this->middleware('permission:add role', ['only' => ['create','store']]);
        $this->middleware('permission:edit role', ['only' => ['show','update']]);
        $this->middleware('permission:detroy role', ['only' => ['detroy']]);
    }

    public function index(){
        $role = new RoleRepository();
        $data['roles'] = $role->index();
        return view('admin.role.role', $data);
    }
    public function create(){
        $permission = new PermissionRepository();
        $data['permissions'] = $permission->index();
        return view('admin.role.add-role', $data);
    }
    public function store(Request $request){
        $this->role = new RoleRepository();
        $this->role->store($request);
        return redirect()->route('list-role');
    }
    public function show($id){
        $this->role = new RoleRepository();
        $this->permission = new PermissionRepository();
        $data['permissions'] = $this->permission->index();
        $data['role'] = $this->role->show($id);
        return view('admin.role.edit-role', $data);
    }
    public function update(Request $request,$id){
        $this->role = new RoleRepository();
        $this->role->update($request,$id);
        return redirect()->route('list-role');
    }
    public function detroy($id){
        $this->role = new RoleRepository();
        $this->role->destroy($id);
        return redirect()->back();
    }
}
