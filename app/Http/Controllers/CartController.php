<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Products;
use App\Models\ProductVariants;
use App\Traits\CartTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    use CartTrait;
    public function index()
    {
        $list = $this->getUserCart();
        return view('cart.list', compact('list'));
    }
    public function add($product_id, $variant_id)
    {
        $quantity = 1;
        $query = Carts::query();
        $query->where('product_id', $product_id);
        $query->where('product_variant_id', $variant_id);

        if (Auth::check()) {
            // User is authenticated, use their user ID
            $query->where('user_id', Auth::user()->id);
        } else {
            // User is not authenticated, use the session ID
            $query->Where('session_id', session()->getId());
        }

        $cartItem = $query->first();

        if ($cartItem) {
            // Item exists in cart, update the quantity
            $cartItem->increment('units', $quantity);
            if (ProductVariants::where('id', $variant_id)->get()->pluck('stock')->first() < $quantity + $cartItem->quandity) {
                return redirect()->back()->with('error', 'Low in stock please select a lower quandity!');
            }
        } else {
            // Item does not exist in cart, add it
            Carts::updateOrInsert(
                [
                    'product_id' => $product_id,
                    'product_variant_id' => $variant_id,
                    'user_id' => Auth::check() ? Auth::user()->id : null, // Set to null if user is not authenticated
                    'session_id' => Auth::check() ? null : session()->getId(), // Set to session ID if user is not authenticated
                ],
                ['units' => $quantity]
            );
        }

        return response()->json([
            'status' => true,
            'message' => 'Item added to cart.',
            'count' => getCartCount()
        ], 200);
    }
    public function updateQuantity(Carts $cartItem, $action = 'inc')
    {
        if ($action == 'dec' && $cartItem->units - 1 == 0) {
            return redirect()->back()->with('error', 'Quandity cannot go below 1 units.');
        }
        $newQuantity = $action == 'inc' ? $cartItem->units + 1 : $cartItem->units - 1;
        // Check if the new quantity exceeds the product's stock limit.
        if ($cartItem->variant->stock < $newQuantity) {
            // Quantity exceeds stock limit.
            return redirect()->back()->with('error', 'Quantity exceeds stock limit.');
        }

        // Update the quantity of the cart item.
        $cartItem->units = $newQuantity;
        $cartItem->save();

        return response()->json([
            'status' => true,
            'data' => $this->getUserCart(),
            'item_sub_total' => $cartItem->units * $cartItem->variant->price
        ], 200);
    }

    public function deleteItem(Carts $cartItem)
    {
        try {
            $cartItem->delete();
            return response()->json([
                'status' => true,
                'message' => 'Item removed from cart.',
                'data' => $this->getUserCart()
            ], 200);
        } catch (Exception $e) {

            dd($e);
        }
    }
}
