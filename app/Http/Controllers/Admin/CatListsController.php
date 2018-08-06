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

        $categoryList = CatList::defaultOrder()->withDepth()->get();


        return view('admin.categories.index', [ 'catlist' => $catlist, 'categories' => $categories, 'categoryList' => $categoryList,'title' => 'Категории']);
    }


    



}
