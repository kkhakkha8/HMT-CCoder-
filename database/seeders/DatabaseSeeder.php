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
        // User::truncate();
        // Category::truncate();
        // Blog::truncate();


        // $frontend = Category::factory()->create(['name'=>'frontend']);
        // $backend = Category::factory()->create(['name'=>'backend']);

        // Blog::factory(2)->create(['category_id'=>$frontend->id]);
        // Blog::factory(2)->create(['category_id'=>$backend->id]);

        $mgmg=User::factory()->create(['name'=>'mgmg','username'=>'mgmg']);
        $aungaung=User::factory()->create(['name'=>'aungaung','username'=>'aungaung']);
        $frontend=Category::factory()->create(['name'=>'frontend','slug'=>'frontend']);
        $backend=Category::factory()->create(['name'=>'backend','slug'=>'backend']);

        Blog::factory(2)->create(['category_id'=>$frontend->id,'user_id'=>$mgmg->id]);
        Blog::factory(2)->create(['category_id'=>$backend->id,'user_id'=>$aungaung->id]);

}
}
