<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Blog;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Category::truncate();
        Blog::truncate();
        
        //User::factory()->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // //By Manual
        // $fe=Category::create([
        //     'name'=>'frontend',
        //     'slug'=>'frontend'
        // ]);
        // $be=Category::create([
        //     'name'=>'backend',
        //     'slug'=>'backend'
        // ]);

        // Blog::create([
        //     'title'=>'First Blog',
        //     'slug'=>'first-blog',
        //     'intro'=>'I love',
        //     'body'=>'I love cats',
        //     'category_id'=>$fe->id
        // ]);
        // Blog::create([
        //     'title'=>'Second Blog',
        //     'slug'=>'second-blog',
        //     'intro'=>'I am',
        //     'body'=>'I am Tommy Shelby',
        //     'category_id'=>$be->id
        // ]);

        //By factory
        //Blog::factory(10)->create();
        
        $fe=Category::factory()->create(['name'=>'frontend']);
        $be=Category::factory()->create(['name'=>'backend']);
        
        Blog::factory(2)->create(['category_id'=>$fe->id]);
        Blog::factory(2)->create(['category_id'=>$be->id]);
    }
}
