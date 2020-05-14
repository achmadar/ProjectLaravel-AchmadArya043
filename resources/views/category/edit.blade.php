@extends('layouts.app', [
  'namePage' => 'Edit Category ',
  'activePage' => 'category',
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

  </style>
@endpush

@section('content')
  <div class="panel-header panel-header-lg">
    
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
		<div class="container card">

			<form action="{{ route('category.update',['id'=>$kategori->id]) }}" method="post">

                {{ csrf_field() }}
                
                <div class="card card-primary" style="box-shadow: unset;">

                    <div class="card-header">
                        <h3 class="card-title">Edit Data</h3>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 mr-4 ">

                                <div class="form-group">
                                    <label for="nama_kategori">Nama Kategori</label>
                                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Enter kategori" value="{{ $kategori->nama_kategori }}">
                                </div>

                                @error('nama_kategori')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="status" class="labeltop">Status Aktif</label>
                                    <div class="row">
                                        <label for="status" class="mrlbl text-secondary">Tidak Aktif</label>
                                        <div class="custom-control custom-switch">
                                            <input type="hidden" name="status" value="tidak" />

                                            @if ($kategori->status == 'aktif')
                                                <input class="custom-control-input" id="status" checked="checked" name="status" type="checkbox" value="aktif">
                                            @else
                                                <input class="custom-control-input" id="status" name="status" type="checkbox" value="aktif">
                                            @endif

                                            <label for="status" class="custom-control-label text-secondary">Aktif</label>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-gradient-dark">
                        <div class="float-left">
                            <a href="{{ route('category.index') }}" class="btn btn-default">Back</a>
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