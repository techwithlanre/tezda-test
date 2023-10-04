<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return Inertia::render('Products/ProductIndex',compact('products'));
    }

    public function create()
    {
        return Inertia::render('Products/CreateProduct');
    }

    public function store(Request $request)
    {

        $request = $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Product::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'image' => 'wertyuio'
        ]);

        return to_route('products.index');
        
    }

    public function show($product_id)
    {
        $product = Product::find($product_id);

        return Inertia::render('Products/ViewProduct', compact('product'));
    }
}
