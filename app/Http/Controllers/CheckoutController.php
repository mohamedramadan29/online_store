<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $data['carts'] = Cart::where('user_id', Auth::id())->get();
        $data['user'] = User::where('id',Auth::id())->first();
        $data['route'] = 'checkout_page';
        return view('website.checkout.index', $data);
    }
}
