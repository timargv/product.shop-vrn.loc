<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Kalnoy\Nestedset\NodeTrait;

class CatList extends Model
{
    use NodeTrait;
    protected $fillable = ['title', 'slug', 'paretn_id'];
    protected $table = 'categories';
}
