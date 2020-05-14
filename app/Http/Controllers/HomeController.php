<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['t_produk'] = Product::count('id');
        $data['t_stok'] = Product::sum('stok');
        $data['t_trns'] = Order::count('id');
        $data['t_hrg'] = Order::sum('total_harga');
        return view('home', $data);
    }

}
