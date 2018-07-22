<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [

            [
                'title' => 'Electronics',
                'children' => [
                    [
                        'title' => 'TV',
                        'children' => [
                            ['title' => 'LED'],
                            ['title' => 'Blu-ray'],
                        ],
                    ],
                    [
                        'title' => 'Mobile',
                        'children' => [
                            ['title' => 'Samsung'],
                            ['title' => 'iPhone'],
                            ['title' => 'Xiomi'],
                        ],
                    ],
                ],
            ],
        ];
        foreach($categories as $category)
        {
            App\Category::create($category);
        }
    }
}
