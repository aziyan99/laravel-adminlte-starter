<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignPermissionController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('backend.assign-permission.index', compact('roles'));
    }

    public function editRolePermission(Role $role)
    {
        $permissions = Permission::all();
        $raw_role_permissions = $role->permissions()->get()->toArray();
        $role_permissions = [];
        for ($i = 0; $i < count($raw_role_permissions); $i++) {
            array_push($role_permissions, $raw_role_permissions[$i]['id']);
        }
        return view('backend.assign-permission.edit', compact('permissions', 'role_permissions', 'role'));
    }

    public function updateRolePermission(Request $request)
    {
        $request->validate([
            'role_id' => 'required'
        ]);
        $role = Role::findById($request->role_id);
        $role->syncPermissions($request->update_role_permissions);
        return redirect()->route('backend.assignpermission.index')->with('success', 'Hak akses role berhasil diperbarui');
    }
}
