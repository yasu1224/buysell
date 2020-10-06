<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $guarded = [
        'id'
    ];

    public static $rules = [
        'name' => 'required|max: 30',
        'fee' => 'required|max: 10',
        'detail' => 'required|max: 50',
        'imgpath' => 'image|file',
    ];
}
