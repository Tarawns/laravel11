<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Database\Factories\CategoryFactory;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Category::create([
        //     'name' => 'Web Desain',
        //     'slug' => 'web-desain'
        // ]);

        // Post::create([
        //     'title' => 'judul artikel 1',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'judul-artikel-1',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit repudiandae, minus sint aperiam, cumque laboriosam amet officia autem hic asperiores tempore nam corrupti reprehenderit non sequi, ut cum maxime numquam.'
        // ]);


        $this->call([CategorySeeder::class, UserSeeder::class]);
        Post::factory(100)->recycle([
            Category::all(),
            User::all()        
        ])->create();
    }
}
