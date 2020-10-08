<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StockRequest;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        // $is_image = false;
        // if (Storage::disk('local')->exists('public/Stock_images/')) {
        //     $is_image = true;
        // }
        // dd($contacts);
        return view('admin.index',  compact('stocks'));
    }

    public function create()
    {
        //
        return view('admin.create');
    }

    public function store(StockRequest $request)
    {
            $stock = new Stock();
            $stock->name = $request->input('name');
            $stock->detail = $request->input('detail');
            $stock->fee = $request->input('fee');
            $stock->imgpath = $request->imgpath->store('public/Stock_images');
            $stock->imgpath = str_replace('public/Stock_images', '', $stock->imgpath);
            // $stock->imgpath = $request->input('imgpath');
            // dd($stock);
                $stock->save();
                return redirect('admin/index');
    }

}