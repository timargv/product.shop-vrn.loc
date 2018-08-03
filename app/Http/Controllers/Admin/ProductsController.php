<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = Product::orderBy('id');


        if (!empty($value = $request->get('title'))) {
            $query->where('title', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('num'))) {
            $query->where('num', 'like', '%' . $value . '%');
        }

        $products = $query->paginate(10);

        $productCount = DB::table('products')->count();
        return view('admin.products.index', compact('products', 'productCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'numeric'
        ]);

        $product = Product::add($request->all());
        $product->uploadImage($request->file('image'));
        $product->setCategories($request->get('categories'));

        return redirect(route('products.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::pluck('title', 'id')->all();
        $selectedCategories = $product->categories->pluck('id')->all();

        return view('admin.products.edit', compact('categories', 'product', 'selectedCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'numeric'
        ]);

        $product = Product::find($id);
        $product->edit($request->all());
        $categories = Category::pluck('title', 'id')->all();
        $selectedCategories = $product->categories->pluck('id')->all();

        $product = Product::find($id);
        $product->edit($request->all());
        $product->uploadImage($request->file('image'));
        $product->setCategories($request->get('categories'));

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        Product::find($id)->remove();
        return redirect()->route('products.index');
    }

    //----------------------------------

    public  function export() {
        $product = Product::select('title', 'num', 'price', 'slug')->get();
        return Excel::create('Экспорт Товара', function ($excel) use($product) {
            $excel->sheet('mysheet', function ($sheet) use ($product) {
                $sheet->fromArray($product);
            });
        })->export('xlsx');
    }

    //-****************************************
    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
        ]);

        $path = $request->file('file')->getRealPath();

        Excel::filter('chunk')->load($path)->chunk(200, function($results){
            foreach($results as $row) {

                $attributes = $row->only('title', 'num', 'price')->toArray();
                Product::create($attributes);
            }
        });


        return back();
    }
}
