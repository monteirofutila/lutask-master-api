<?php

namespace App\Services;

use App\Repositories\UserRepository;

class TaskUserService
{
    public function __construct(protected UserRepository $repository)
    {
    }

    public function listTask(string $userID, string|null $all)
    {
        if ($all) {
            return $this->repository->listTaskAll($userID);
        } else {
            return $this->repository->listTask($userID);
        }
    }

    public function addTask(string $userID, array $data)
    {
        $data['priority'] = $data['priority'] ?? 'normal';
        return $this->repository->addTask($userID, $data);
    }

    public function completeTask(string $userID, string $taskID)
    {
        return $this->repository->completeTask($userID, $taskID);
    }

    public function deleteTask(string $userID, string $taskID)
    {
        return $this->repository->deleteTask($userID, $taskID);
    }
}
