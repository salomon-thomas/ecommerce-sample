<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Carts;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\ProductVariants;
use App\Models\ShippingAddress;
use App\Models\UserAddress;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkoutPreview(Request $request)
    {
        $address = ShippingAddress::where('user_id', $request->user()->id)->get()->last();
        $cart = Carts::where('user_id', $request->user()->id)->get();
        return view('order.checkout', compact('address', 'cart'));
    }
    public function placeOrder(AddressRequest $request)
    {
        $cart = Carts::where('user_id', $request->user()->id)->get();
        if (count($cart) == 0) {
            return redirect()->route('home')->with('error', 'No valid items in cart');
        }
        $sub_total = 0;
        $discount = 0;
        $tax = 0;
        $total = 0;
        DB::beginTransaction();
        try {
            $order = new Orders();
            $order->user_id = $request->user()->id;
            $order->sub_total = $sub_total;
            $order->discount = $discount;
            $order->tax = $tax;
            $order->status = 'approved';
            $order->total = $total;
            $order->save();

            $shipping = new ShippingAddress();
            $shipping->user_id = $request->user()->id;
            $shipping->order_id = $order->id;
            $shipping->first_name = $request->first_name;
            $shipping->last_name = $request->last_name;
            $shipping->city = $request->city;
            $shipping->postal_code = $request->postal_code;
            $shipping->telephone = $request->telephone;
            $shipping->save();

            foreach ($cart as $item) {
                $sub_total += $item->variant->price * $item->units;
                $order_item = new OrderItems();
                $order_item->product_id = $item->product_id;
                $order_item->product_variant_id = $item->product_variant_id;
                $order_item->order_id = $order->id;
                $order_item->units = $item->units;
                $order_item->price = $item->variant->price;
                $order_item->total = $item->variant->price * $item->units;
                $order_item->save();
                $product_variant = ProductVariants::find($item->product_variant_id);
                $product_variant->decrement('stock', $item->units);
            }
            $total = $sub_total - $discount + $tax;

            $order->sub_total = $sub_total;
            $order->discount = $discount;
            $order->tax = $tax;
            $order->total = $total;
            $order->save();
            Carts::where('user_id', $request->user()->id)->delete();
            DB::commit();
            return view('order.confrim');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to place order.');
        }
    }
    public function details($order_id)
    {
        $order = Orders::findOrfail($order_id);
        $order_total = 0;
        return view('order.details', compact('order', 'order_total'));
    }
    public function list()
    {
        $orders = Orders::where('user_id', Auth::user()->id)->paginate(10);
        return view('order.list', compact('orders'));
    }
}
