<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function categories(Categories $category)
    {

        $products = Products::where('categories_id', $category->id)->paginate(20);

        return view('product.list', compact('products'));
    }
    public function index()
    {

        $products = Products::paginate(8);

        return view('product.list', compact('products'));
    }
    public function details(Products $product)
    {
        $related = Products::where('id', '!=', $product->id)->limit(6)->get();
        return view('product.details', compact('product', 'related'));
    }
}
