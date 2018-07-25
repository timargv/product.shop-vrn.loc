<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use  Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{

    use Sluggable;
//    use NodeTrait;

    protected $fillable = ['title', 'parent_id', 'slug'];

    // -------------------------
    public function products() {
       return $this->belongsToMany(
           Product::class,
           'products_categories',
           'category_id',
           'product_id'
       );
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
