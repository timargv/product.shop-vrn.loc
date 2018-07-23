<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    // --------------------
    public function create() {
        $categories = Category::pluck('title', 'id')->all();
        return view('admin.categories.create', ['categories' => $categories]);
    }


    // --------------------
    public function store(Request $request) {

        $this->validate($request, [
            'title' => 'required',
        ]);
        Category::create($request->all());
        return redirect()->route('catlists.index');
    }



    // --------------------
    public function edit($id) {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }


    // --------------------
    public function update(Request $request, $id) {
        $this->validate($request, [
          'title' => 'required'
        ]);
        $category = Category::find($id);
        $category->update($request->all());

        return redirect()->route('categories.index');
    }


    // --------------------
    public function destroy($id) {}


}
