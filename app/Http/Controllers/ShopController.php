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

    public function myCart(Cart $cart)
    {
        $data = $cart->showCart();
        return view('mycart', $data);
    }
    public function addMycart(Request $request, Cart $cart)
   {
        $stock_id = $request->stock_id;
        $message = $cart->addCart($stock_id);

        $my_carts = $cart->showCart();
        return view('mycart',compact('my_carts' , 'message'));
    }

    public function deleteCart(Request $request, Cart $cart)
    {
        $stock_id = $request->stock_id;
        $message = $cart->deleteCart($stock_id);

        $my_carts = $cart->showCart();
        return view('mycart', compact('my_carts', 'message'));
    }
}