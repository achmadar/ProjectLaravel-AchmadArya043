<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\DetailOrder;
use App\Product;
use App\Category;
use Carbon\Carbon;
use Validator;

class OrderController extends Controller
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
    public function index(Request $request)
    {
        $data['maxValue'] = Order::max('id');
        $data['maxValue']++;
        $data['trcode'] = "TRC". Carbon::now()->month . sprintf("%05s", $data['maxValue']);
        //
        $data['list_produk'] = Product::all();
        $data['list_kategori'] = Category::all();
        //
        $data['detail'] = Product::join('tbl_detailorder','tbl_detailorder.id_produk','tbl_produk.id')
            ->select(
                'tbl_detailorder.id', 
                'tbl_detailorder.nomor_pesanan', 
                'tbl_produk.nama_produk', 
                'tbl_produk.harga', 
                'tbl_detailorder.jumlah_beli', 
                'tbl_detailorder.subtotal', 
            )
            ->where("nomor_pesanan",$data['trcode'])
            ->orderBy('tbl_detailorder.id', 'ASC')
            ->get();
        //
        return view('order.index', $data);
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
        Order::create([
            'nomor_pesanan' => $request->nomor_pesanan,
            'id_users' => $request->id_users,
            'pembeli' => $request->pembeli,
            'total_harga' => $request->total_harga,
            'bayar' => $request->bayar,
            'kembali' => $request->kembali,
        ]);
        return redirect()->route('report.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        DetailOrder::where("id",$id)->delete();
        return redirect()->route("order.index");
    }

    // Simpan Detail Pesanan

    public function simpan_detail(Request $request)
    {
        $nomor_pesanan = $request->get('nomor_pesanan');
        $id_produk = $request->get('id_produk');
        $jumlah_beli = $request->get('jumlah_beli');
        $subtotal = $request->get('subtotal');

        $insert = DetailOrder::create([
            'nomor_pesanan' => $request->nomor_pesanan,
            'id_produk' => $request->id_produk,
            'jumlah_beli' => $request->jumlah_beli,
            'subtotal' => $request->subtotal,
        ]);

        if ($insert) {
            return response()->json(['task'  => $insert]);            
        } else {
            return response()->json(['error' => true]);
        }       

    }

}
