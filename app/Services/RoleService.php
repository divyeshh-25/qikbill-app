<?php

namespace App\Services;

use App\Models\Role;
use App\Repositories\RoleRepository;

class RoleService
{
    protected $RoleRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(RoleRepository $RoleRepository)
    {
        $this->RoleRepository = $RoleRepository;
    }
    
    public function getAllRoles()
    {
        return $this->RoleRepository->all();
    }   

    public function getRoleById($id)
    {
        return $this->RoleRepository->find($id);
    }

    public function createRole(array $data)
    {
        return $this->RoleRepository->create($data);
    }


    public function updateRole($role, array $data)
    {
        return $this->RoleRepository->update($role, $data);
    }

    public function deleteRole($role)
    {
        return $this->RoleRepository->delete($role);
    }
    
}
