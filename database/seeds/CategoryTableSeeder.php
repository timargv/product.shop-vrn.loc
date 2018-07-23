<?php

use Illuminate\Database\Seeder;
use \Kalnoy\Nestedset\NodeTrait;
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
                'slug' => 'electronics',
                'children' => [
                    [
                        'title' => 'TV',
                        'slug' => 'tv',
                        'children' => [
                            ['title' => 'LED', 'slug' => 'led'],
                            ['title' => 'Blu-ray', 'slug' => 'blu-ray'],
                        ],
                    ],
                    [
                        'title' => 'Mobile',
                        'slug' => 'mobile',
                        'children' => [
                            ['title' => 'Samsung', 'slug' => 'Samsung'],
                            ['title' => 'iPhone', 'slug' => 'iPhone'],
                            ['title' => 'Xiomi', 'slug' => 'Xiomi'],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Electronics-2',
                'slug' => 'electronics',
                'children' => [
                    [
                        'title' => 'TV',
                        'slug' => 'tv',
                        'children' => [
                            ['title' => 'LED', 'slug' => 'led'],
                            ['title' => 'Blu-ray', 'slug' => 'blu-ray'],
                        ],
                    ],
                    [
                        'title' => 'Mobile',
                        'slug' => 'mobile',
                        'children' => [
                            ['title' => 'Samsung', 'slug' => 'Samsung'],
                            ['title' => 'iPhone', 'slug' => 'iPhone'],
                            ['title' => 'Xiomi', 'slug' => 'Xiomi'],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Electronics',
                'slug' => 'electronics-3',

            ],
        ];
        foreach($categories as $category)
        {
            App\Category::create($category);
        }
    }
}
