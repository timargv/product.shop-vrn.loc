<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CatList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatListsController extends Controller
{
    public function index() {
        $categories = CatList::get()->toTree();
        $catlist = Category::pluck('title', 'id')->all();


        return view('admin.categories.index', [ 'catlist' => $catlist, 'categories' => $categories, 'title' => 'Категории']);
    }

}
