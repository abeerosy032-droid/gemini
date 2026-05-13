<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        $tags = ['Laravel', 'PHP', 'Web Dev', 'Tailwind', 'AI'];
        foreach ($tags as $tag) {
            Tag::create(['name' => $tag, 'slug' => Str::slug($tag)]);
        }

        for ($i = 1; $i <= 15; $i++) {
            $post = Post::create([
                'user_id' => $admin->id,
                'title' => "مقال تجريبي رقم $i",
                'slug' => "test-post-$i",
                'body' => "هذا نص تجريبي للمقال رقم $i. يهدف لاختبار العرض والأرشفة.",
                'status' => 'published',
                'published_at' => now()->subDays(rand(1, 10))
            ]);
            
            $post->tags()->attach(Tag::inRandomOrder()->take(2)->pluck('id'));
        }
    }
}
