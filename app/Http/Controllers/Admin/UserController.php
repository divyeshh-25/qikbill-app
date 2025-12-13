<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('admin.users.index');
    }

    public function create(Request $request)
    {
        $roles = Role::where('tenant_id',auth()->user()->tenant_id)->get();
        return view('admin.users.create',compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = $this->userService->createUser($data);
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User created successfully.',
                'user' => $user
            ], 201);
        }
        return response()->json([
            'success' => false,
            'message' => 'Failed to create user.'
        ], 500);
    }

    public function edit(User $user)
    {
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.'
            ], 404);
        }
        $roles = Role::where('tenant_id',auth()->user()->tenant_id)->get();
        return view('admin.users.edit', compact('user','roles'));
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        $user = $this->userService->updateUser($user, $data);
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User updated successfully.',
                'user' => $user
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Failed to update user.'
        ], 500);
    }

    public function destroy(User $user)
    {
        $user = $this->userService->deleteUser($user);
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully.',
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Failed to delete user.'
        ], 500);
    }
}
