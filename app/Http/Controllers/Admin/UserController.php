<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DataTablesColumnsBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request): View | JsonResponse
    {
        validate_permission('users.read');

        if ($request->ajax()) {
            $rows = User::offset($request->start)->limit($request->length);
            $totalRecords = User::count();

            return DataTables::of($rows)
                ->setTotalRecords($totalRecords)
                ->setFilteredRecords($totalRecords)
                ->addColumn('actions', function ($row) {
                    return Blade::render('
                        <div class="btn-group">
                            @permission(\'users.create\')
                                <a href="{{ route(\'admin.users.edit\', $row) }}" class="btn btn-default">Update</a>
                            @endpermission
                            @permission(\'users.delete\')
                                <button type="button" class="btn btn-danger delete-btn" data-destroy="{{ route(\'admin.users.destroy\', $row) }}">Delete</button>
                            @endpermission
                        </div>
                    ', ['row' => $row]);
                })
                ->addColumn('created_at', function ($row) {
                    return Blade::render('
                        {{ $row->created_at->format(\'M d, Y\') }}
                    ', ['row' => $row]);
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        $tableConfigs = (new DataTablesColumnsBuilder(User::class))
            ->setSearchable('name')
            ->setOrderable('name')
            ->setOrderable('email')
            ->setOrderable('email')
            ->setName('created_at', 'Created at')
            ->removeColumns(['updated_at', 'remember_token', 'password', 'email_verified_at'])
            ->withActions()
            ->make();

        return view('admin.users.index', compact('tableConfigs'));
    }

    public function create(): View
    {
        validate_permission('users.create');

        $user = new User();
        $roles = Role::all();
        $userRoles = [];
        return view('admin.users.create', compact('user', 'roles', 'userRoles'));
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        validate_permission('users.create');

        DB::transaction(function () use ($request) {
            $user = User::create($request->only('name', 'email') + ['password' => Hash::make($request->password)]);

            if ($request->has('roles')) {
                $user->roles()->sync($request->post('roles'));
            }
        });

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User created successfully!');
    }

    public function show(User $user): View
    {
        validate_permission('users.read');

        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        validate_permission('users.update');

        $roles = Role::all();
        $userRoles = $user->roles->pluck('id')->toArray();
        return view('admin.users.edit', compact('user', 'roles', 'userRoles'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        validate_permission('users.update');

        DB::transaction(function () use ($request, $user) {
            $user->update($request->only('name', 'email'));

            if ($request->has('roles')) {
                $user->roles()->sync($request->post('roles'));
            }
        });

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User updated successfully!');
    }

    public function destroy(User $user): RedirectResponse
    {
        validate_permission('users.delete');

        $user->delete();
        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User deleted successfully!');
    }
}
