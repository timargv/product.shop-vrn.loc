<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $category
 * @property mixed $category_parent
 * @property mixed $manufacturer
 * @property mixed $author
 */
class Product extends Model
{

  use Sluggable;

  // -------------------------
  public function category()
  {
    return $this->hasOne(Category::class);
  }

  // --------------------------
  public function categoryParent()
  {
    return $this->belongsToMany(Category::class, 'products_categories', 'product_id', 'category_id');
  }


  // --------------------------
  public function manufacturer()
  {
    return $this->hasOne(Manufacturer::class);
  }


  // --------------------------
  public function author()
  {
    return $this->hasOne(User::class);
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


  // --------------------------
  public function add(){

  }

}
