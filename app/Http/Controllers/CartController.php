<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $data['route'] = 'cart_page';
        $data['items']= Cart::where('user_id',Auth::user()->id)->get();
        return view('website.cart.index',$data);
    }
    public function addToCart(Request $request)
    {
        $product_id = $request->product_id;
        $qty = $request->qty;
        $user_id = Auth::id();
        if (Auth::check()) {
            $product = Product::where('id', $product_id)->where('qty', '>', 0)->exists();
            if ($product) {
                if (Cart::where('product_id', $product_id)->where('user_id', $user_id)->exists()) {
                    return response()->json(['msg' => 'Product Already Add To Cart']);
                } else {
                    Cart::create([
                        'user_id' => $user_id,
                        'qty' => $qty,
                        'product_id' => $product_id
                    ]);
                    $product_name = Product::findOrFail($product_id);
                    return response()->json(['msg' => $product_name->name . ' Added To Cart']);
                }

            } else {
                return response()->json(['msg' => 'Product Not Found']);
            }

        } else {
            return response()->json(['msg' => 'login_first']);
        }
    }
    public function destroy($id){
        //$item_cart = Cart::findOrFail($id);
        $item_cart = Cart::where(['id'=>$id,'user_id'=>Auth::id()])->first();
        $item_cart->delete();
        //$data['route'] = 'cart_page';
        $data['items']= Cart::where('user_id',Auth::user()->id)->get();
        return redirect()->back()->with('success message');
    }
    public function update(Request $request){
        if(Auth::check()){
            if(Cart::where('id',$request->id)->exists()){
                $cart = Cart::where('id',$request->id)->first();
                $cart->update([
                    'qty'=>$request->qty,
                ]);
            }
            return response()->json(['msg'=>'cart updated']);
        }
    }
}
