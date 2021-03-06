<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Stock;
use Illuminate\Support\Facades\Mail;
use App\Mail\Thanks;

class ShopController extends Controller
{
    //
    public function index()
    {
        $stocks = Stock::orderBy("created_at", "DESC")->Paginate(6);
        return view('shop',compact('stocks')); //追記変更
    }

    public function myCart(Cart $cart)
    {
        $data = $cart->showCart();
        return view('mycart',$data);
    }
    public function addMycart(Request $request,Cart $cart)
    {
 
        //カートに追加の処理
        $stock_id=$request->stock_id;
        $message = $cart->addCart($stock_id);
 
        //追加後の情報を取得
        $data = $cart->showCart();
 
        return view('mycart',$data)->with('message',$message); //追記
 
    }
 

    public function deleteCart(Request $request,Cart $cart)
    {
 
        //カートから削除の処理
        $stock_id=$request->stock_id;
        $message = $cart->deleteCart($stock_id);
 
        //追加後の情報を取得
        $data = $cart->showCart();
 
        return view('mycart',$data)->with('message',$message);//追記
 
    }

    public function checkout(Request $request,Cart $cart)
    {
        $user = Auth::user();
        $mail_data['user'] = $user->name;
        $mail_data['checkout_items'] = $cart->checkoutCart();
        Mail::to($user->email)->send(new Thanks($mail_data));
        return view('checkout');
    }
}
