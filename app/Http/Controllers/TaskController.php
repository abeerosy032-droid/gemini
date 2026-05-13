<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request): AnonymousResourceCollection
    {
        $query = $request->user()->tasks();

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('priority')) {
            $query->where('priority', $request->priority);
        }

        if ($request->has('due') && $request->due === 'today') {
            $query->whereDate('due_date', today());
        }

        return TaskResource::collection($query->latest()->get());
    }

    public function store(StoreTaskRequest $request): TaskResource
    {
        $task = $request->user()->tasks()->create($request->validated());
        return new TaskResource($task);
    }

    public function show(Request $request, Task $task): TaskResource
    {
        $this->authorize('view', $task);
        return new TaskResource($task);
    }

    public function update(UpdateTaskRequest $request, Task $task): TaskResource
    {
        $this->authorize('update', $task);
        $task->update($request->validated());
        return new TaskResource($task);
    }

    public function destroy(Request $request, Task $task): Response
    {
        $this->authorize('delete', $task);
        $task->delete();
        return response()->noContent();
    }

    public function toggle(Request $request, Task $task): TaskResource
    {
        $this->authorize('update', $task);
        
        $task->update([
            'status' => $task->status === 'done' ? 'todo' : 'done'
        ]);

        return new TaskResource($task);
    }
}