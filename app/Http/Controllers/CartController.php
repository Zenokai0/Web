<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserCart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function getCartView()
    {
        return view('pages.cart');
    }
    public function addToCart(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $product_id = $request->input('product_id');

        UserCart::create([
            'user_id' => $user->user_id,
            'product_id' => $product_id,
        ]);


        return response()->json(['success' => true]);
    }
    public function removeFromCart(Request $request){

        $cart_id = $request->input('user_cart_id');
        $product_id = $request->input('product_id');

        $item = UserCart::where('user_cart_id', $cart_id)
                        ->where('product_id', $product_id)
                        ->first();
        $item->delete();

        return response()->json(['success' => true]);
    }
    public function itemCount()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $count = UserCart::where('user_id', $user->user_id)->count();

        return response()->json(['count' => $count]);
    }
    public function userCart()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $cart = DB::table('user_carts')
            ->join('products', 'user_carts.product_id', '=', 'products.product_id')
            ->select('user_cart_id', 'user_carts.product_id', 'products.product_name', 'products.price', 'products.product_image')
            ->where('user_carts.user_id', $user->user_id)
            ->get();

        return response()->json(['cart' => $cart, 'success' => true]);
    }
    public function checkout(){
        $user = Auth::user();

        UserCart::where('user_id', $user->user_id)->delete();

        return response()->json(['success' => true]);
    }
}
