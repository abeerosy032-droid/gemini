<?php
namespace App\Policies;
use App\Models\Post;
use App\Models\User;

class PostPolicy {
    // 2. استخدام Policies للتمييز بين Admin و Editor
    public function viewAny(User $user): bool { return true; }
    public function view(User $user, Post $post): bool { return true; }
    
    public function create(User $user): bool {
        return in_array($user->role, ['admin', 'editor']);
    }
    
    public function update(User $user, Post $post): bool {
        return $user->role === 'admin' || $user->id === $post->user_id;
    }
    
    public function delete(User $user, Post $post): bool {
        return $user->role === 'admin' || $user->id === $post->user_id;
    }
}