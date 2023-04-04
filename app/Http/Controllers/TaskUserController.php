<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Services\TaskUserService;

class TaskUserController extends Controller
{
    public function __construct(protected TaskUserService $service)
    {
    }

    public function listTask(string $userID, string $all = null)
    {
        //
        $data = $this->service->listTask($userID, $all);
        return TaskResource::collection($data);
    }

    public function addTask(string $userID, StoreTaskRequest $request)
    {
        $data = $request->validated();
        $task = $this->service->addTask($userID, $data);
        return new TaskResource($task);
    }

    public function completeTask(string $userID, string $taskID)
    {
        $task = $this->service->completeTask($userID, $taskID);
        return new TaskResource($task);
    }

    public function deleteTask(string $userID, string $taskID)
    {
        //
        $data = $this->service->deleteTask($userID, $taskID);
        if ($data) {
            return response()->json(['message' => 'Eliminado com sucesso!'], 204);
        } else {
            return response()->json(['message' => 'Erro ao eliminar!'], 400);
        }
    }
}
