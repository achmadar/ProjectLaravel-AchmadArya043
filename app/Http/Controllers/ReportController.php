<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\DetailOrder;
use App\Product;
use Validator;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $month = Carbon::now()->addMonth(1)->format('M');
        $data['month'] = Order::groupBy()
        //
        $data['report'] = User::join('tbl_order','tbl_order.id_users','users.id')
            ->select(
                'tbl_order.nomor_pesanan', 
                'tbl_order.created_at', 
                'users.name', 
                'tbl_order.pembeli', 
                'tbl_order.total_harga', 
            )
            ->orderBy('tbl_order.created_at', 'DESC')
            ->get();
        //
        return view('report.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nomor_pesanan)
    {
        $data['report'] = Order::where("nomor_pesanan",$nomor_pesanan)->first();
        $data['det_report'] = Product::join('tbl_detailorder','tbl_detailorder.id_produk','tbl_produk.id')
            ->select(
                'tbl_produk.nama_produk', 
                'tbl_produk.harga', 
                'tbl_detailorder.jumlah_beli', 
                'tbl_detailorder.subtotal'
            )
            ->where("nomor_pesanan",$nomor_pesanan)
            ->get();
        return view('report.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
