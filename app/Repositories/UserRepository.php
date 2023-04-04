<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements RepositoryInterface
{
    public function __construct(protected User $model)
    {
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function listTask(string $userID)
    {
        return $this->model->find($userID)->tasks()->where('status', 'pending')->get();
    }

    public function listTaskAll(string $userID)
    {
        return $this->model->find($userID)->tasks;
    }

    public function nextTask(string $userID)
    {
        return $this->model->find($userID)->tasks()->orderBy('priority')->get();
    }

    public function findById(string $userID): Model|null
    {
        return $this->model->find($userID);
    }

    public function findByEmail(string $email): Model|null
    {
        return $this->model->where('email', $email)->first();
    }

    public function findByUserName(string $userName): Model
    {
        return $this->model->where('user_name', $userName)->first();
    }

    public function delete(string $userID)
    {
        return $this->model->find($userID)->delete();
    }

    public function deleteTask(string $userID, string $taskID)
    {
        return $this->model->find($userID)->tasks->find($taskID)->delete();
    }

    public function new(array $data): Model
    {
        return $this->model->firstOrcreate($data)->refresh();
    }

    public function addTask(string $userID, array $data): Model
    {
        return $this->model->find($userID)->tasks()->create($data)->refresh();
    }

    public function update(string $userID, array $data): Model
    {
        return $this->model->find($userID)->update($data);
    }

    public function completeTask(string $userID, string $taskID): Model
    {
        $task = $this->model->find($userID)->tasks->find($taskID);
        $task->status = 'done';
        $task->save();
        return $task->refresh();
    }
}
