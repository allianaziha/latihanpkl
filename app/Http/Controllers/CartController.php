<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Auth;



class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

            return view ('cart', compact(cartItems));
    }

    public function addToCart(Request $request, $id)
    {
        if (! Auth::check()) {
            //jika belu  login redirect dengan alert
            toast ('silahkan login terlebih dahulu untuk menambahkan ke kerangjang.' , 'error');
            return redirect('/login');
        }

        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if ($cart) {
            $cart->increment('qty', $request->qty);
        } else {
            cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'qty' => $request->qty,
            ]);
        }
        toast ('product berhasil ditambahkan ke keranjang.', 'success');
        return back();
    }
}
