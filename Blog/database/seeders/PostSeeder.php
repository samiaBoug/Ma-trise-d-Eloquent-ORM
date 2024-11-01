<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technology = Category::where('name', 'Technology')->first();
        $education = Category::where('name', 'Education')->first();

        Post::create([
            'title' => 'first post',
            'body' => 'first post body',
            'category_id' => $technology->id,
        ]);

        Post::create([
            'title' => 'second post',
            'body' => 'second post body',
            'category_id' => $education->id,
        ]);
    }
}
