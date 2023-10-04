<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
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

    public function store(CreateProductRequest $request)
    {
        $file_name = time().$request->file('image')->getClientOriginalName();
        $image = $request->file('image')->storeAs('products', $file_name ,'public');

        if(!$image) throw ValidationException::withMessages([
            'message' => 'An error occured while creating product'
        ]);
        
        $image_path = '/storage/' . $image;

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image_path
        ]);

        if(!$product) throw ValidationException::withMessages([
            'message' => 'An error occured while creating product'
        ]);
        
        return to_route('products.index');
        
    }

    public function show($product_id)
    {
        $product = Product::find($product_id);

        return Inertia::render('Products/ViewProduct', compact('product'));
    }
}
