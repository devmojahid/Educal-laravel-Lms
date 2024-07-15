<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:role-list', ['only' => ['index']]);
        $this->middleware('permission:role-create', ['only' => ['store']]);
        $this->middleware('permission:role-edit', ['only' => ['update']]);
        $this->middleware('permission:role-delete', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::where('id', '!=', 1)->latest()->get();
        return view("backend.user.role.index", compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view("backend.user.role.create", compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // role create validation and store with permission assign
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'nullable|array',
        ]);

        $role = Role::create(['name' => sanitizeInput($request->name)]);
        $permissions = $request->input('permissions');
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }


        session()->flash('success', 'Role created successfully');
        return redirect()->route('role.index')->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // edit role with permission
        $role = Role::findById($id);
        if ($role->id == 1) {
            return redirect()->route('role.index')->with('error', 'You can not edit this role');
        }
        $permissions = Permission::all();
        return view("backend.user.role.edit", compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //  update role with permission
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'permissions' => 'nullable|array',
        ]);

        $role = Role::findById($id);
        if ($role->id == 1) {
            return redirect()->route('role.index')->with('error', 'You can not edit this role');
        }
        $role->name = sanitizeInput($request->name);
        $role->save();
        $permissions = $request->input('permissions');
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        session()->flash('success', 'Role updated successfully');
        return redirect()->route('role.index')->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete role with permission
        $role = Role::findById($id);
        if ($role->id == 1) {
            return redirect()->route('role.index')->with('error', 'You can not edit this role');
        }
        $role->delete();
        session()->flash('success', 'Role deleted successfully');
        return redirect()->route('role.index')->with('success', 'Role deleted successfully');
    }

    public function allRoles()
    {
        // get all roles
        $roles = Role::all();
        return response()->json($roles);
    }
}
