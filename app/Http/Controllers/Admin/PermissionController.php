<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DataTablesColumnsBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePermissionRequest;
use App\Http\Requests\Admin\UpdatePermissionRequest;
use App\Models\Permission;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Yajra\DataTables\DataTables;

class PermissionController extends Controller
{
   public function index(Request $request): View | JsonResponse
    {
        if ($request->ajax()) {
            $rows = Permission::offset($request->start)->limit($request->length);
            $totalRecords = Permission::count();

            return DataTables::of($rows)
                ->setTotalRecords($totalRecords)
                ->setFilteredRecords($totalRecords)
                ->addColumn('actions', function ($row) {
                    return Blade::render('
                        <div class="btn-group">
                            <a href="{{ route(\'admin.permissions.edit\', $row) }}" class="btn btn-default">Update</a>
                            <button type="button" class="btn btn-danger delete-btn" data-destroy="{{ route(\'admin.permissions.destroy\', $row) }}">Delete</button>
                        </div>
                    ', ['row' => $row->id]);
                })
                ->addColumn('updated_at', function ($row) {
                    return Blade::render('
                        {{ $row->updated_at->format(\'M d, Y\') }}
                    ', ['row' => $row]);
                })
                ->rawColumns(['actions', 'updated_at'])
                ->make(true);
        }

        $tableConfigs = (new DataTablesColumnsBuilder(Permission::class))
            ->setSearchable('name')
            ->setOrderable('name')
            ->setName('updated_at', 'Updated at')
            ->removeColumns(['created_at'])
            ->withActions()
            ->make();

        return view('admin.permissions.index', compact('tableConfigs'));
    }

    public function create(): View
    {
        $permission = new Permission();
        return view('admin.permissions.create', compact('permission'));
    }

    public function store(StorePermissionRequest $request): RedirectResponse
    {
        Permission::create($request->only('name'));

        return redirect()
            ->route('admin.permissions.index')
            ->with('success', 'Permission created successfully!');
    }

    public function edit(Permission $permission): View
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission): RedirectResponse
    {
        $permission->update($request->only('name'));

        return redirect()
            ->route('admin.permissions.index')
            ->with('success', 'Permission updated successfully!');
    }

    public function destroy(Permission $permission): RedirectResponse
    {
        $permission->delete();
        return redirect()
            ->route('admin.permissions.index')
            ->with('success', 'Permission deleted successfully!');
    }
}
