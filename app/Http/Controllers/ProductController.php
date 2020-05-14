<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Validator;

class ProductController extends Controller
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
        // $data['produk'] = Product::all();
        $data['produk'] = Category::join('tbl_produk','tbl_produk.id_kategori','tbl_kategori.id')
            ->select(
                'tbl_kategori.nama_kategori', 
                'tbl_produk.id', 
                'tbl_produk.nama_produk', 
                'tbl_produk.harga',
                'tbl_produk.stok',
                'tbl_produk.status',
                'tbl_produk.photo',
                'tbl_produk.deskripsi'
            )
            ->whereNull('tbl_produk.deleted_at')
            // ->where("nama_kategori","Kursi")
            ->get();
        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['list_kategori'] = Category::all();
        return view('products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_produk' => 'required|min:3|unique:tbl_produk,nama_produk',
            'harga' => 'required',
            'stok' => 'required',
            'photo' => 'required',
            'deskripsi' => 'required',
        ];

        $message = [
            'required' => ':attribute tidak boleh kosong',
            'min:3' => ':attribute terlalu pendek',
            'unique' => ':attribute sudah ada di database'
        ];

        $validasi = Validator::make($request->all(), $rules, $message);

        if ($validasi->fails()) {

            return redirect()->route('products.create')->withErrors(
                $validasi->errors()
            )->withInput($request->all());

        } else {

            $insert = Product::create([
                'nama_produk' => $request->nama_produk,
                'id_kategori' => $request->id_kategori,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'status' => $request->status,
                'photo' => $request->file("photo")->store("public"),
                'deskripsi' => $request->deskripsi
            ]);

            if ($insert) {
                return redirect()->route('products.index')->with('success', 'Berhasil menambah data produk.');
            } else
                return redirect()->route('products.index')->with('error', 'Gagal menambah data produk.');
                            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['produk'] = Category::join('tbl_produk','tbl_produk.id_kategori','tbl_kategori.id')
            ->select(
                'tbl_kategori.nama_kategori', 
                'tbl_produk.id', 
                'tbl_produk.nama_produk', 
                'tbl_produk.harga',
                'tbl_produk.stok',
                'tbl_produk.status',
                'tbl_produk.photo',
                'tbl_produk.deskripsi'
            )
            ->where("tbl_produk.id",$id)
            ->first();
        return view("products.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['list_kategori'] = Category::all();
        $data['produk'] = Product::find($id);
        return view("products.edit", $data);
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
        Product::where("id",$id)->update([
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->id_kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'status' => $request->status,
            'photo' => $request->file("photo")->store("public"),
            'deskripsi' => $request->deskripsi
        ]);
        return redirect()->route("products.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where("id",$id)->delete();
        return redirect()->route("products.index");
    }
}
