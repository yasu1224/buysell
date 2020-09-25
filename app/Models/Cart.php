<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    protected $fillable = [
        'stock_id','user_id',
    ];

    public function showCart()
    {
        $user_id = Auth::id();
        $data['my_carts'] = $this->where('user_id', $user_id)->get();
        
        $data['count']=0;
        $data['sum']=0;

        foreach($data['my_carts'] as $my_cart){
            $data['count']++;
            $data['sum'] += $my_cart->stock->fee;
        }

        return $data;
    }


    public function stock()
    {
        return $this->belongsTo('\App\Models\Stock');
    }


    public function addCart($stock_id)
    {
        $user_id = Auth::id();
        $cart_add_info = Cart::firstOrCreate(['stock_id' => $stock_id, 'user_id' => $user_id]);
        if($cart_add_info->wasRecentlyCreated){
            $message = 'カートに追加しました';
        }else{
            $message ='カートに登録済です';
        }
        return $message;
    }


    public function deleteCart($stock_id)
    {
        $user_id = Auth::id();
        $delete = $this->where('user_id', $user_id)->where('stock_id', $stock_id)->delete();
        if($delete > 0){
            $message = 'カートから選択した商品を削除しました';
        }else{
            $message = '削除に失敗しました';
        }
        return $message;
    }
}
