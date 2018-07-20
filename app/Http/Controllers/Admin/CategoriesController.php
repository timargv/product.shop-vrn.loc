<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    // --------------------
    public function index() {
        $categories = Category::all();
        return view('admin.categories.index', ['title' => 'Категория', 'categories' => $categories]);
    }


    // --------------------
    public function create() {
        return view('admin.categories.create');
    }


    // --------------------
    public function store(Request $request) {

        $this->validate($request, [
            'title' => 'required'
        ]);
        Category::create($request->all());
        return redirect()->route('categories.index');
    }



    // --------------------
    public function edit($id) {

    }


    // --------------------
    public function update(Request $request, $id) {

    }


    // --------------------
    public function destroy($id) {}


}
