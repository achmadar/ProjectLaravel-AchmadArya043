@extends('layouts.app', [
  'namePage' => 'Edit Product',
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

    .form-group input[type=file]{
        position: unset;
        opacity: unset;
    }

  </style>
@endpush

@section('content')
  <div class="panel-header panel-header-lg">
    
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
		<div class="container card">

			<form action="{{ route('products.update',['id'=>$produk->id]) }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                
                <div class="card card-primary" style="box-shadow: unset;">

                    <div class="card-header">
                        <h3 class="card-title">Edit Data</h3>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group col-md-6 mr-4 ">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" name="nama_produk" id="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" placeholder="Enter kategori" value="{{ $produk->nama_produk }}">
                                    @error('nama_produk')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 mr-4 ">
                                    <label>Kategori</label>
                                    <select class="form-control @error('id_kategori') is-invalid @enderror" id="id_kategori" name="id_kategori">
                                        @foreach ($list_kategori as $kategori)
                                        <option value="{{ $kategori->id }}" status="{{ $kategori->status }}">
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('id_kategori')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 mr-4 ">
                                    <label for="harga">Harga Produk</label>
                                    <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Enter Price" value="{{ $produk->harga }}">
                                    @error('harga')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 mr-4 ">
                                    <label for="stok">Jumlah Stok</label>
                                    <input type="number" name="stok" id="stok" class="form-control @error('stok') is-invalid @enderror" placeholder="Enter Stok" value="{{ $produk->stok }}">
                                    @error('stok')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 mr-4 ">
                                    <label for="status" class="labeltop">Status Aktif</label>
                                    <div class="row">
                                        <label for="status" class="mrlbl text-secondary">Tidak Aktif</label>
                                        <div class="custom-control custom-switch">
                                            <input type="hidden" name="status" value="tidak" />

                                            @if ($produk->status == 'aktif')
                                                <input class="custom-control-input" id="status" checked="checked" name="status" type="checkbox" value="aktif">
                                            @else
                                                <input class="custom-control-input" id="status" name="status" type="checkbox" value="aktif">
                                            @endif

                                            <label for="status" class="custom-control-label text-secondary">Aktif</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6 mr-4 ">
                                    <label class="control-label">Foto Produk</label>
                                    <br>

                                    @if ( is_null( $produk->photo ) )
                                        <input type="file" name="photo" id="photo" class="@error('photo') is-invalid @enderror" value="{{ old('photo') }}" >
                                    @else 
                                        <img src="{{ Storage::url( $produk->photo ) }}" alt="{{ Storage::url( $produk->photo ) }}" style="width: 150px; margin-bottom: 10px">
                                        <input type="file" name="photo" id="photo" class="@error('photo') is-invalid @enderror" value="{{ Storage::url( $produk->photo ) }}" >
                                    @endif
                                    
                                    @error('photo')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Produk</label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" rows="4" id="deskripsi" name="deskripsi" placeholder="Write some description ...">{{ $produk->deskripsi }}</textarea>
                                    @error('deskripsi')
                                        <div class="text-danger mt-1">{{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-gradient-dark">
                        <div class="float-left">
                            <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary float-right">Save</button>
                        </div>
                    </div>

                </div>
            </form>

		</div>
      </div>
    </div>
  </div>

@endsection

@push('js')
<script type="text/javascript">
    var slctd = "{{ $produk->id_kategori }}";
    $(function() {
        $('#id_kategori').val(slctd).prop('selected', true);
    });
</script>
@endpush