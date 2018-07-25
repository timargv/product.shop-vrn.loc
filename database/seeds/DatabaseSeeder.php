<?php

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
        // $this->call(UsersTableSeeder::class);
          // $this->call(CategoryTableSeeder::class);

          //        $categories = factory(\App\Category::class, 100)->create();
       $products = factory(\App\Product::class, 100)->create();



    }
}
