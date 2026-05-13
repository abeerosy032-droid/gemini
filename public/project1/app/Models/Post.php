<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'featured_image',
        'status',
        'published_at',
        'user_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * ننشئ الـ slug تلقائياً من العنوان عند الإنشاء
     */
    protected static function booted(): void
    {
        static::creating(function (Post $post) {
            if (empty($post->slug)) {
                $post->slug = $post->generateUniqueSlug($post->title);
            }
        });
    }

    /**
     * توليد slug فريد - نمنع التكرار
     */
    public function generateUniqueSlug(string $title): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }

    /**
     * الكاتب المرتبط بالمقال
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * الوسوم المرتبطة بالمقال (علاقة many-to-many)
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * نطاق الاستعلام: المقالات المنشورة فقط
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', Carbon::now());
    }

    /**
     * نطاق الاستعلام: المسودات
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    /**
     * المسار الكامل لصورة المقالة
     * نستخدم storage/app/public عبر Storage facade
     */
    public function getFeaturedImageUrlAttribute(): ?string
    {
        return $this->featured_image
            ? \Illuminate\Support\Facades\Storage::url($this->featured_image)
            : null;
    }

    /**
     * ملخص قصير للمقالة
     */
    public function getExcerptAttribute(): string
    {
        return Str::limit(strip_tags($this->body), 200);
    }
}
