<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function home()
    {
        return view('admin.home');
    }

    public function index()
    {
        $query = DB::table('stocks');
        $query->select('imgpath', 'id', 'name', 'detail', 'fee', 'created_at');
        $query->orderBy('created_at', 'asc');
        $stocks = $query->paginate(20);

        // dd($contacts);
        return view('admin.index',  compact('stocks'));
    }

    public function create()
    {
        //
        return view('admin.create');
    }


}