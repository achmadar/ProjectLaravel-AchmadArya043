@extends('layouts.app', [
  'namePage' => 'Detail Product',
  'activePage' => 'product',
])

@push('css')
  <style type="text/css">
    
    .content{
      margin-top: -250px !important;
    }

    .mrlbl{
    	margin-left: 20px;
    	margin-right: 10px;
    }

    .labeltop{
    	margin-top: 10px;
    }

    .form-control{
        font-size: 13px;
        cursor: default;
    }

    .form-control[readonly]{
        background-color: unset;
        color: #000;
        cursor: unset;
    }

    .form-control[disabled]{
        background-color: unset;
        color: #000;
        cursor: unset;
    }

    select{
        -moz-appearance: window;
        -webkit-appearance: none;
    }

  </style>
@endpush

@section('content')
  <div class="panel-header panel-header-lg">
    
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
		<div class="card">
            <div class="container">
                <div class="card card-primary" style="box-shadow: unset;">

                    <div class="card-header">
                        <h3 class="card-title">Detail Data</h3>
                    </div>
                    
                    <div class="card-body">
                        <div class="container">
                            <div class="row">

                                <div class="col-md-12 text-center mb-3">
                                    <img src="{{ Storage::url( $produk->photo ) }}" alt="{{ Storage::url( $produk->photo ) }}" width="300px">
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" name="nama_produk" id="nama_produk" class="form-control" readonly="" value="{{ $produk->nama_produk }}">
                                </div>
                                
                                <div class="col-md-6 mb-1">
                                    <label for="nama_kategori">Kategori</label>
                                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" readonly="" value="{{ $produk->nama_kategori }}">
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label for="harga">Harga Produk</label>
                                    <input type="text" name="harga" id="harga" class="form-control" readonly="" value="RP. {{ $produk->harga }}">
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label for="stok">Stok Produk</label>
                                    <input type="text" name="stok" id="stok" class="form-control" readonly="" value="{{ $produk->stok }} buah">
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label for="status">Status Produk</label>
                                    @if ($produk->status == 'aktif')
                                        <input class="form-control" id="status" readonly="" name="status" type="text" value="Aktif">
                                    @else
                                        <input class="form-control" id="status" readonly="" name="status" type="text" value="Tidak Aktif">
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea type="text" name="deskripsi" id="deskripsi" class="form-control" readonly="" style="padding: 0px 10px; height: 200px;">{{ $produk->deskripsi }}</textarea>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-gradient-dark">
                        <div class="float-left">
                            <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
                        </div>
                    </div>

                </div>
            </div>
		</div>
      </div>
    </div>
  </div>

@endsection