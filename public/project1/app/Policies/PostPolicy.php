<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Admin يمكنه فعل كل شيء
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->isAdmin()) {
            return true;
        }

        return null;
    }

    /**
     * عرض لوحة التحكم
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isEditor();
    }

    /**
     * عرض مقال واحد
     */
    public function view(User $user, Post $post): bool
    {
        return true;
    }

    /**
     * إنشاء مقال جديد
     */
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isEditor();
    }

    /**
     * تعديل مقال — المحرر يعدل مقالاته فقط
     */
    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * حذف مقال — المحرر يحذف مقالاته فقط
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * نشر/إلغاء نشر مقال
     */
    public function publish(User $user, Post $post): bool
    {
        return $user->isAdmin() || $user->id === $post->user_id;
    }
}
