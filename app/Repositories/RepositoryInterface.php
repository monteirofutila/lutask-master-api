<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function getAll();
    public function findById(string $id): Model|null;
    public function delete(string $id);
    public function new(array $data): Model;
    public function update(string $id, array $data): Model;
}
