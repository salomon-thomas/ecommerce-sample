<?php

use App\Models\Carts;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

function getCartCount()
{

    $cart = 0;

    if (Auth::check()) {
        $cart = Carts::where('user_id', Auth::id())->count();
    } else {
        $cart = Carts::where('session_id', session()->getId())->count();
    }

    return $cart;
}
function getTopCategories()
{
    return Categories::inRandomOrder()
        ->take(3)
        ->get();
}
function sliderProducts()
{
    return Products::inRandomOrder()
        ->take(4)
        ->get();
}
function getCategories()
{
    return Categories::all();
}
function topSelling()
{
    return Products::inRandomOrder()
        ->take(8)
        ->get();
}
function featured()
{
    return Products::inRandomOrder()
        ->take(6)
        ->get();
}
