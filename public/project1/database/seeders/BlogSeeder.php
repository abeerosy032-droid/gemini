<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        // إنشاء أدمن ومحرر
        $admin = User::factory()->create([
            'name'  => 'أحمد الأدمن',
            'email' => 'admin@blog.test',
            'role'  => 'admin',
        ]);

        $editor = User::factory()->create([
            'name'  => 'سارة المحررة',
            'email' => 'editor@blog.test',
            'role'  => 'editor',
        ]);

        // إنشاء وسوم
        $tags = collect(['تقنية', 'تصميم', 'برمجة', 'ذكاء اصطناعي', 'أمن معلومات'])
            ->map(fn ($name) => Tag::create([
                'name' => $name,
                'slug' => \Str::slug($name),
            ]));

        // إنشاء مقالات
        $posts = Post::factory(25)->create([
            'user_id' => $admin->id,
        ])->merge(
            Post::factory(15)->create([
                'user_id' => $editor->id,
            ])
        );

        // ربط الوسوم بالمقالات عشوائياً
        $posts->each(function ($post) use ($tags) {
            $post->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
