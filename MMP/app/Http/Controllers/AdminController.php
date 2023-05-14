<?php

namespace App\Http\Controllers;


use App\Model\Categorie;
use App\Model\Product;
use Illuminate\Http\Request;


class AdminController extends Controller
{


    public function index() {
        $products =  Product::all();
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

        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
        ]);

        product::create($data);

        return redirect()->route('admin.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {

        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
        ]);

        $product = product::findOrFail($id);

        $product->update($data);
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
