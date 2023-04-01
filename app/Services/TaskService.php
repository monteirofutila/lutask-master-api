<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    public function __construct(protected TaskRepository $repository)
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
        return $this->repository->new($data);
    }

    public function update(string $id, array $data)
    {
        return $this->repository->update($id, $data);
    }
}
