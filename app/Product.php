<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property mixed $category
 * @property mixed $category_parent
 * @property mixed $manufacturer
 * @property mixed $author
 */
class Product extends Model
{

  use Sluggable;

  protected $fillable = ['title'];

  // --------------------------
  public function categories()
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
    return $this->belongsTo(User::class);
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
  public static function add($fields)
  {
      $product = new static;
      $product->fill($fields);
      $product->user_id = 1;
      $product->save();

      return $product;
  }

  // --------------------------
  public function edit($fields)
  {
      $this->fill($fields);
      $this->save();
  }

  // --------------------------
  public function remove()
  {
      $this->removeImage();
      $this->save();
  }

  // --------------------------
  public function removeImage()
  {
    if ($this->image != null) {
        Storage::delete('upload/'. $this->image);
    }
  }

  // --------------------------
  public function uploadImage($image)
  {
      if ($image == null) { return; }

      $this->removeImage();
      $filename = str_random(10) .'.'. $image->extension();
      $image->storeAs('uploads', $filename);
      $this->image = $filename;
      $this->save();
  }

  // --------------------------
  public function getImage()
  {
    if($this->image == null)
    {
      return '/img/no-image.png';
    }
    return '/uploads/' . $this->image;
  }

  // --------------------------
  public function setCategories($ids)
  {
      if ($ids == null) { return; }

      $this->categories()->sync($ids);
  }

  public function getCategoriesTitle()
  {
      return (!$this->categories->isEmpty())   ?   implode(', ', $this->categories->pluck('title')->all()) : '-';
  }









}
