<?php

namespace App\Http\Controllers;


use App\Model\Categorie;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{


    public function index() {
        $products =  Product::all();
        if(Auth::user()->admin==0){
            return abort(404);
        }
        return view('admin.index')->with('products', $products);
    }

    public function show($id)
    {
        $product = product::findOrFail($id);

        return view('admin.show', compact('product'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->category_name = $request->category_name;
        $product->img = $request->img;
        $product->save();
        return redirect()->route('admin.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::findOrFail($id);;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->category_name = $request->category_name;
        $product->img = $request->img;
        $product->update();
        return redirect()->route('admin.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.index')->with('success', 'Product deleted successfully');
    }

    public function showCategoriesDashboard(){
        $cats = Categorie::select('name')->get();
        return view('admin.index',compact('cats'));
    }
}
