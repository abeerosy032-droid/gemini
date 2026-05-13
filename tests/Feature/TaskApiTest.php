<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_tasks()
    {
        $response = $this->getJson('/api/tasks');
        $response->assertStatus(401);
    }

    public function test_user_can_get_their_tasks()
    {
        $user = User::factory()->create();
        Task::factory()->count(3)->create(['user_id' => $user->id]);
        
        $otherUser = User::factory()->create();
        Task::factory()->create(['user_id' => $otherUser->id]);

        $response = $this->actingAs($user)->getJson('/api/tasks');

        $response->assertStatus(200)
                 ->assertJsonCount(3, 'data');
    }

    public function test_user_can_create_task()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->postJson('/api/tasks', [
            'title' => 'New Task',
            'priority' => 'high'
        ]);

        $response->assertStatus(201)
                 ->assertJsonPath('data.title', 'New Task')
                 ->assertJsonPath('data.priority', 'high');
                 
        $this->assertDatabaseHas('tasks', ['title' => 'New Task', 'user_id' => $user->id]);
    }

    public function test_user_can_update_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->putJson("/api/tasks/{$task->id}", [
            'title' => 'Updated Task'
        ]);

        $response->assertStatus(200)
                 ->assertJsonPath('data.title', 'Updated Task');
    }

    public function test_user_can_delete_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}