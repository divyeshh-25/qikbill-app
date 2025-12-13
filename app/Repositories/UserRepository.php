<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Support\Str;

class UserRepository implements UserInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function all()
    {
        // Implementation for retrieving all users
    }

    public function find($id)
    {
        // Implementation for finding a user by ID
    }

    public function create(array $data)
    {
        if(isset($data['image'])){
            $image = $data['image'];
            $imageName = Str::slug($data['name']).'-'.time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('users', $imageName, 'public');
            $data['image'] = $imageName;
        }

        if(!isset($data['tenant_id'])){
            $data['tenant_id'] = auth()->user()->tenant_id;
        }
        $role_id = $data['role_id'];
        $user = User::create($data);
        if($user){
            $user->assignRole(Role::find($role_id));
            return $user;
        }
        return false;
    }

    public function update($user, array $data)
    {
        if(isset($data['image']) && $data['image']){
            $image = $data['image'];
            $imageName = Str::slug($data['name']).'-'.time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('users', $imageName, 'public');
            $data['image'] = $imageName;
        }else{
            unset($data['image']);
        }
        if($data['password'] == null){
            unset($data['password']);
        }
        $updated = $user->update($data);
        if($updated){
            return $user;
        }
        return false;
    }

    public function delete($user)
    {
        if($user->profile){
            unlink('storage/users'.$user->profile);
        }
        $user = $user->delete();
        if($user){
            return $user;
        }
        return false;
    }
}
