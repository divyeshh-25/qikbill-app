<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function getAllUsers()
    {
        return $this->userRepository->all();
    }   

    public function getUserById($id)
    {
        return $this->userRepository->find($id);
    }

    public function createUser(array $data)
    {
        return $this->userRepository->create($data);
    }


    public function updateUser($user, array $data)
    {
        return $this->userRepository->update($user, $data);
    }

    public function deleteUser($user)
    {
        return $this->userRepository->delete($user);
    }
    
}
