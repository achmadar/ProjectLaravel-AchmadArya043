@extends('layouts.app', [
  'namePage' => 'Transaction Report',
  'activePage' => 'report',
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
      border-right: 1px solid #000;
      border-top: 1px solid #000;
      text-align: center;
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
            <!-- <a class="btn btn-primary btn-round text-white pull-right" href="{{ route('products.create') }}">Add Product</a> -->
            <h4 class="card-title">Transaction List</h4>
            <div class="col-12 mt-2">
            </div>
          </div>
          <div class="card-body">
            <table id="myTable" class="table table-bordered table-hover table-striped tblind">
              <thead>
                <tr>
                  <th style="width: 30px">No.</th>
                  <th>ID Transaksi</th>
                  <th>Tanggal</th>
                  <th>Penjual</th>
                  <th>Pembeli</th>
                  <th>Total Harga</th>
                  <th style="width: 120px; border-right: 1px solid #000">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                @foreach($report as $r)
                <tr>
                  <td style="text-align: center;">
                    {{ $no }}
                  </td>
                  <td>{{ $r->nomor_pesanan }}</td>
                  <td>{{ $r->created_at }}</td>
                  <td>{{ $r->name }}</td>
                  <td>{{ $r->pembeli }}</td>
                  <td>{{ $r->total_harga }}</td>
                  <td style="border-right: 1px solid #000">
                      <a href="{{ route('report.show', ['nomor_pesanan'=>$r->nomor_pesanan ]) }}" class="btn btn-info">
                        <i class="fa fa-eye"></i>
                      </a>
                      <a href="{{ route('report.destroy', ['nomor_pesanan'=>$r->nomor_pesanan ]) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ?');">
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

