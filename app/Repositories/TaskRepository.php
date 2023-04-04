<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;

class TaskRepository implements RepositoryInterface
{
    public function __construct(protected Task $model)
    {
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function findById(string $id): Model
    {
        return $this->model->find($id);
    }

    public function delete(string $id)
    {
        return $this->model->find($id)->delete();
    }

    public function new(array $data): Model
    {
        $user = auth()->user();
        $task = $user->tasks()->firstOrCreate($data)->refresh();
        return $task;
    }

    public function update(string $id, array $data): Model
    {
        return $this->model->find($id)->update($data);
    }
}
