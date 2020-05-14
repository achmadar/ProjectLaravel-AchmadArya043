@extends('layouts.app', [
  'namePage' => 'Detail List',
  'activePage' => 'report',
])

@push('css')
  <style type="text/css">
    
    .content{
      margin-top: -280px !important;
    }

    .form-control{
        font-size: 13px;
    }

    .form-control[readonly]{
      background-color: #ececec;
      color: #000;
      cursor: unset;
    }

    .form-control[disabled]{
      background-color: unset;
      color: #000;
      cursor: unset;
    }

    .card-header h4{
      margin-bottom: unset !important;
    }

    .table th{
        text-align: center;
        background-color: #3a3a3a;
        border-top: 1px solid #000 !important;
        border-left: 1px solid #000 !important;
        border-bottom: 1px solid #000 !important;
        font-size: 1.3em !important;
        font-weight: 500 !important;
        color: #ffffff;
    }

    .table td{
        border-top: 1px solid #000 !important;
        border-left: 1px solid #000 !important;
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
		<div class="card">
            <div class="container">
                <div class="card card-primary" style="box-shadow: unset;">

                    <div class="card-header">
                        <h3 class="card-title">Detail Transaction</h3>
                    </div>
                    
                    <div class="card-body">
                        <div class="container">
                            <div class="row">

                                <div class="col-md-6 mb-1 pl-0 row">
                                    <div class="col-md-3 m-auto pr-0">
                                        ID Transaksi
                                    </div>
                                    <div class="col-md-8 mb-1 pl-0">
                                        <input type="text" name="nomor_pesanan" id="nomor_pesanan" class="form-control" readonly="" value="{{ $report->nomor_pesanan }}">
                                    </div>

                                    <div class="col-md-3 m-auto pr-0">
                                        Tanggal
                                    </div>
                                    <div class="col-md-8 mb-1 pl-0">
                                        <input type="text" name="created_at" id="created_at" class="form-control" readonly="" value="{{ $report->created_at }}">
                                    </div>

                                    <div class="col-md-3 m-auto pr-0">
                                        Pembeli
                                    </div>
                                    <div class="col-md-8 mb-1 pl-0">
                                        <input type="text" name="pembeli" id="pembeli" class="form-control" readonly="" value="{{ $report->pembeli }}">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1 pr-0 row">
                                    <div class="col-md-4 m-auto pr-0">
                                        Total Pembelian
                                    </div>
                                    <div class="col-md-7 pl-0">
                                        <input type="text" name="total_harga" id="total_harga" class="form-control" readonly="" value="{{ $report->total_harga }}">
                                    </div>

                                    <div class="col-md-4 m-auto pr-0">
                                        Dibayar
                                    </div>
                                    <div class="col-md-7 pl-0">
                                        <input type="text" name="bayar" id="bayar" class="form-control" readonly="" value="{{ $report->bayar }}">
                                    </div>

                                    <div class="col-md-4 m-auto pr-0">
                                        Kembali
                                    </div>
                                    <div class="col-md-7 pl-0">
                                        <input type="text" name="kembali" id="kembali" class="form-control" readonly="" value="{{ $report->kembali }}">
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2 mb-2">
                                    <table id="myTable3" class="table table-bordered table-hover table-striped tblind">
                                        <thead>
                                            <tr>
                                                <th style="width: 30px">No.</th>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th style="border-right: 1px solid #000">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                            @foreach($det_report as $r)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $r->nama_produk }}</td>
                                                <td>{{ $r->harga }}</td>
                                                <td>{{ $r->jumlah_beli }}</td>
                                                <td style="border-right: 1px solid #000">{{ $r->subtotal }}</td>
                                            </tr>
                                            <?php $no++ ?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-gradient-dark">
                        <div class="float-left">
                            <a href="{{ route('report.index') }}" class="btn btn-default">Back</a>
                        </div>
                    </div>

                </div>
            </div>
		</div>
      </div>
    </div>
  </div>

@endsection