<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * مقالات المستخدم
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * هل المستخدم مدير؟
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * هل المستخدم محرر؟
     */
    public function isEditor(): bool
    {
        return $this->role === 'editor';
    }
}
