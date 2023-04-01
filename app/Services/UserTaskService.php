<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserTaskService
{
    public function __construct(protected UserRepository $repository)
    {
    }

    public function list($userID, $all)
    {
        if ($all) {
            return $this->repository->listTaskAll($userID);
        } else {
            return $this->repository->listTask($userID);
        }
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
        return $this->repository->new($data);
    }

    public function update(string $id, array $data)
    {
        return $this->repository->update($id, $data);
    }
}
