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

    public function list(string $userID, string $all = null)
    {
        //
        $data = $this->service->list($userID, $all);
        return TaskResource::collection($data);
    }


    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();
        $task = $this->service->new($data);
        return new TaskResource($task);
    }

    public function delete(string $userID, string $taskID)
    {
        //
        $data = $this->service->delete($userID, $taskID);
        if ($data) {
            return response()->json(['message' => 'Eliminado com sucesso!'], 204);
        } else {
            return response()->json(['message' => 'Erro ao eliminar!'], 400);
        }
    }
}
