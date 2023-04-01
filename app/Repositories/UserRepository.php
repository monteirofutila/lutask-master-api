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

    public function listTask(string $id)
    {
        return $this->model->find($id)->tasks()->where('status', 'pending')->get();
    }

    public function listTaskAll(string $id)
    {
        return $this->model->find($id)->tasks;
    }

    public function findById(string $id): Model
    {
        return $this->model->find($id);
    }

    public function findByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function findByUserName(string $userName)
    {
        return $this->model->where('user_name', $userName)->first();
    }

    public function delete(string $id)
    {
        return $this->model->find($id)->delete();
    }

    public function new(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(string $id, array $data): Model
    {
        return $this->model->find($id)->update($data);
    }
}
