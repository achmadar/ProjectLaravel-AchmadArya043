@extends('layouts.app', [
  'namePage' => 'Category',
  'activePage' => 'category',
])

@push('css')
  <style type="text/css">
    
    .content{
      margin-top: -250px !important;
    }

    th{
      text-align: center;
      background-color: #3a3a3a;
      border-top: 1px solid #000 !important;
      border-left: 1px solid #000 !important;
      border-bottom: 1px solid #000 !important;
      font-size: 1.3em !important;
      font-weight: 500 !important;
      color: #ffffff;
    }

    td{
      border-top: 1px solid #000 !important;
      border-left: 1px solid #000 !important;
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
          <div class="card-header">
            <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('category.create') }}">Add Category</a>
            <h4 class="card-title">Category Items</h4>
            <div class="col-12 mt-2">
            </div>
          </div>
          <div class="card-body">
            <table id="myTable" class="table table-bordered table-hover table-striped tblind">
              <thead>
                <tr>
                  <th style="width: 30px">No.</th>
                  <th>Nama Kategori</th>
                  <th>Status</th>
                  <th style="width: 130px; border-right: 1px solid #000">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                @foreach($kategori as $k)
                <tr>
                  <td style="text-align: center;">
                    {{ $no }}
                  </td>
                  <td>{{ $k->nama_kategori }}</td>
                  <td style="text-transform: capitalize; text-align: center;">{{ $k->status }}</td>
                  <td style="text-align: center; border-right: 1px solid #000">
                      <!-- <a href="#" class="btn btn-info">
                        <i class="fa fa-eye"></i>
                      </a> -->
                      <a href="{{ route('category.edit', ['id'=>$k->id ]) }}" class="btn btn-success">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <a href="{{ route('category.destroy', ['id'=>$k->id ]) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ?');">
                        <i class="fas fa-trash"></i>
                      </a>
                  </td>
                </tr>
                <?php $no++ ?>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

