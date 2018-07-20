<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property mixed $products
 * @property mixed $parent_id
 * @property mixed $products_category
 */
class Category extends Model
{

    use Sluggable;

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
