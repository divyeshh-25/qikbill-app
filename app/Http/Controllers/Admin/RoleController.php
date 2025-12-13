<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    protected $roleService;
    
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index(RoleDataTable $dataTable)
    {
        return $dataTable->render('admin.roles.index');
    }

    public function permissions(Request $request, Role $role)
    {
        $rolePermissions = $role->getAllPermissions()->pluck('name')->toArray();
        $rolePermissionsByModule = $role->getAllPermissions()
            ->groupBy(function($permission) {
                return explode('.', $permission->name)[0]; // module name
            });
        $permissions = Permission::all()->groupBy('module');
        return view('admin.roles.permissions.index',compact('rolePermissions','permissions','role','rolePermissionsByModule'));
    }

    public function create(Request $request)
    {
        return view('admin.roles.create');
    }

    public function store(RoleRequest $request)
    {
        $data = $request->validated();
        $role = $this->roleService->createRole($data);
        if ($role) {
            return response()->json([
                'success' => true,
                'message' => 'Role created successfully.',
                'role' => $role
            ], 201);
        }
        return response()->json([
            'success' => false,
            'message' => 'Failed to create role.'
        ], 500);
    }

    public function edit(Role $role)
    {
        if (!$role) {
            return response()->json([
                'success' => false,
                'message' => 'Role not found.'
            ], 404);
        }
        return view('admin.roles.edit', compact('role'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $data = $request->validated();
        $role = $this->roleService->updateRole($role, $data);
        if ($role) {
            return response()->json([
                'success' => true,
                'message' => 'Role updated successfully.',
                'role' => $role
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Failed to update role.'
        ], 500);
    }
    
    public function destroy(Role $role)
    {
        $user = $this->roleService->deleteRole($role);
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Role deleted successfully.',
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Failed to delete role.'
        ], 500);
    }

    public function syncPermissions(Request $request, Role $role)
    {
        $permission = $role->syncPermissions($request->permissions);
        if($permission){
            return response()->json([
                'success' => true,
                'message' => 'Permission synced successfully.',
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to synced permissions.'
        ], 500);
    }

  
}
