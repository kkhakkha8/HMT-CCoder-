<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Blog::truncate();
        User::factory(10)->create();

        $frontend = Category::create([
            'name'=>"Frontend",
            'slug'=>"front-end"
        ]);
        $backend = Category::create([
            'name'=>"Backend",
            'slug'=>"back-end"
        ]);

        Blog::create([
            'title'=>'Front end Post',
            'category_id'=>$frontend->id,
            'slug'=>'front-end',
            'intro'=>'this is intro',
            'body'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias quisquam laboriosam itaque quam vero consequatur, repellat accusantium repellendus esse aut assumenda? Tempore earum molestiae assumenda optio accusantium aspernatur vitae aliquam.'
        ]);
        Blog::create([
            'title'=>'Back end Post',
            'category_id'=>$backend->id,
            'slug'=>'back-end',
            'intro'=>'this is intro',
            'body'=>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias quisquam laboriosam itaque quam vero consequatur, repellat accusantium repellendus esse aut assumenda? Tempore earum molestiae assumenda optio accusantium aspernatur vitae aliquam.'
        ]);
}
}