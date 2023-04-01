<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(protected UserRepository $repository)
    {
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function findById(string $id)
    {
        return $this->repository->findById($id);
    }

    public function delete(string $id)
    {
        return $this->repository->delete($id);
    }

    public function new(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->repository->new($data);
    }

    public function update(string $id, array $data)
    {
        return $this->repository->update($id, $data);
    }
}
