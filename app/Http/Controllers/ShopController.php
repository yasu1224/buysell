<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Stock;

class ShopController extends Controller
{
    //
    public function index()
    {
        $stocks = Stock::Paginate(6);
        return view('shop',compact('stocks')); //追記変更
    }

    public function myCart()
    {
        $my_carts = Cart::all();
        return view('mycart',compact('my_carts'));
    }
}
