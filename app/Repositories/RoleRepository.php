<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Interfaces\RoleInterface;

class RoleRepository implements RoleInterface
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
        // Implementation for retrieving all roles
    }

    public function find($id)
    {
        // Implementation for finding a role by ID
    }

    public function create(array $data)
    {
        if(!isset($data['tenant_id'])){
            $data['tenant_id'] = auth()->user()->tenant_id;
        }
        $role = Role::create($data);
        if($role){
            return $role;
        }
        return false;
    }

    public function update($role, array $data)
    {
        $updated = $role->update($data);
        if($updated){
            return $role;
        }
        return false;
    }

    public function delete($role)
    {
        $role = $role->delete();
        if($role){
            return $role;
        }
        return false;
    }
}
