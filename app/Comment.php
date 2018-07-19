<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $product
 * @property mixed $author
 */
class Comment extends Model
{

    // -----------------------
    public function product()
    {
      return $this->hasOne(Product::class);
    }


    // -----------------------
    public function author()
    {
      return $this->hasOne(User::class);
    }
}
