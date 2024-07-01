<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DataTablesColumnsBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoleRequest;
use App\Http\Requests\Admin\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function index(Request $request): View | JsonResponse
    {
        if ($request->ajax()) {
            $roles = Role::offset($request->start)->limit($request->length);
            $totalRecords = Role::count();

            return DataTables::of($roles)
                ->setTotalRecords($totalRecords)
                ->setFilteredRecords($totalRecords)
                ->addColumn('actions', function ($role) {
                    return Blade::render('
                        <div class="btn-group">
                            <a href="{{ route(\'admin.roles.edit\', $role) }}" class="btn btn-default">Update</a>
                            <button type="button" class="btn btn-danger delete-btn" data-destroy="{{ route(\'admin.roles.destroy\', $role) }}">Delete</button>
                        </div>
                    ', ['role' => $role->id]);
                })
                ->addColumn('updated_at', function ($role) {
                    return Blade::render('
                        {{ $role->updated_at->format(\'M d, Y\') }}
                    ', ['role' => $role]);
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        $tableConfigs = (new DataTablesColumnsBuilder(Role::class))
            ->setSearchable('name')
            ->setOrderable('name')
            ->setName('updated_at', 'Updated at')
            ->removeColumns(['created_at'])
            ->withActions()
            ->make();

        return view('admin.roles.index', compact('tableConfigs'));
    }

    public function create(): View
    {
        $role = new Role();
        $permissions = Permission::all();
        return view('admin.roles.create', compact('role', 'permissions'));
    }

    public function store(StoreRoleRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $role = Role::create($request->only('name'));

            if ($request->has('permissions')) {
                $role->permissions()->sync($request->get('permissions'));
            }
        });

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Role created successfully!');
    }

    public function edit(Role $role): View
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        DB::transaction(function () use ($request, $role) {
            $role->update($request->only('name'));

            if ($request->has('permissions')) {
                $role->permissions()->sync($request->get('permissions'));
            }
        });

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Role updated successfully!');
    }

    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();
        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Role deleted successfully!');
    }
}
