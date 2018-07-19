<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use Sluggable;

  // --------------------------
  public function products()
  {
    return $this->hasMany(Products::class);
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
