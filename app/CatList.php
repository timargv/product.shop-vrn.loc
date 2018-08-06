<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Kalnoy\Nestedset\NodeTrait;

class CatList extends Model
{
    use NodeTrait;
    protected $fillable = ['title', 'slug', 'paretn_id'];
    protected $table = 'categories';

    public function getPath(): string
   {
       return implode('/', array_merge($this->ancestors()->defaultOrder()->pluck('slug')->toArray(), [$this->slug]));
   }
}
