<?php

namespace App\Services;

use App\Repositories\UserRepository;

class TaskUserService
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

    public function delete(string $userID, $taskID)
    {
        return $this->repository->deleteTask($userID, $taskID);
    }
}
