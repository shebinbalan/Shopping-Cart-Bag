<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request ,Product $product)
   {
   
    if ($user = Auth::user()) {
        $cart = new Cart;
        $cart->user_id = $user->id;
        $cart->product_id =$request->product_id;
        $cart->prod_qty =$request->input('prod_qty');
        $cart->save();
        if ($cart->save()) {
            return redirect()->back()->with('success', 'Product added to cart successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add product to cart');
        }
    } else {
            return redirect('login');
        }
   
}

public static function cartItem()
{
    $user = auth()->user();
    if ($user) {
        // Get the user ID
        $userId = $user->id;
       return Cart::where('user_id',$userId)->count();   
    }

}

public  function cartList()
{
    $user = auth()->user();
    if ($user) {
        // Get the user ID
        $userId = $user->id;
        $products = DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->where('carts.user_id', $userId)
        ->select('products.*','carts.id as cart_id')
        ->get();
        //dd($products);
        return view('frontend.cart.cartlist', ['products' => $products]);
    }

}
public function removeCart($id)
{
    $cart = Cart::find($id);

    if (!$cart) {
        return redirect()->back()->with('error', 'Cart item not found.');
    }

    $cart->delete();
    
    return redirect()->back()->with('success', 'Cart deleted successfully.');
}

public function updateCart(Request $request, $id)
{
    $validatedData = $request->validate([
        'stock' => 'required|numeric|min:1',
    ]);

    $product = Product::find($id);
    if (!$product) {
        return back()->with('error', 'Product not found.');
    }

    $product->stock = $request->stock;
    $product->save();
    return redirect()->back()->with('success', 'Cart updated successfully.');
   
}
   
}
