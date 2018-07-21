<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{

    use Sluggable;

    protected $fillable = ['title', 'position'];

    // -------------------------
    public function products() {
        return $this->belongsToMany(
            Product::class,
            'products_categories',
            'category_id',
            'product_id'
        );
    }


    // -------------------------
    public function parentId() {
        return $this->hasMany(Category::class, 'parent_id');
    }


    // --------------------------
    public function sluggable()
    {
      return [
          'slug' => [
              'source' => 'title'
          ]
      ];
    }


}
