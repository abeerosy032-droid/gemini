<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model {
    // 1. استخدام $fillable بشكل صحيح لمنع الـ mass assignment
    protected $fillable = ['title', 'body', 'slug', 'published_at', 'status', 'featured_image', 'user_id'];
    protected $casts = ['published_at' => 'datetime'];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function tags(): BelongsToMany { return $this->belongsToMany(Tag::class); }
}