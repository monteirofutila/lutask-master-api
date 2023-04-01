<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Services\UserTaskService;

class UserTaskController extends Controller
{
    public function __construct(protected UserTaskService $service)
    {
    }

    public function list($userID, $all = null)
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


    public function show(string $id)
    {
        $data = $this->service->findById($id);
        return TaskResource::collection($data);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }


    public function destroy(Task $task)
    {
        //
    }
}
