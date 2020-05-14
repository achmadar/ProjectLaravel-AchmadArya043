@extends('layouts.app', [
  'namePage' => 'Order Management',
  'activePage' => 'order',
  'class' => 'order',
])

@push('css')
  <style type="text/css">
    
    .content{
      margin-top: -280px !important;
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
      text-align: center;
    }

    .card-header h4{
      margin-bottom: unset !important;
    }

  </style>
@endpush

@section('content')
  <div class="panel-header panel-header-lg">
    
  </div>
  <div class="content">

    <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
    <input type="hidden" name="id_users" id="id_users" class="form-control" readonly="" value="{{ Auth::user()->id }}">

    <div class="row">   
      <div class="col-md-6">
        <div class="card card-tasks">
          <div class="container">

            <div class="card-header">
              <h4 class="card-title">Select Product</h4>
            </div>

            <div class="card-body row">

              <div class="col-md-12 mb-3 mt-2 text-center">
                <label>Nama Barang</label>
                <select class="form-control nicesl " id="id_produk" name="id_produk" data-dependent="harga">
                  <option value="" disabled="" selected="" hidden="">Pilih Produk</option>
                  @foreach ($list_produk as $produk)
                  <option value="{{ $produk->id }}" harga="{{ $produk->harga }}" status="{{ $produk->status }}">
                    {{ $produk->nama_produk }} 
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-4 text-center">
                <label>Harga</label>
                <input type="text" class="form-control text-center" name="harga" id="harga" readonly>
              </div>

              <div class="col-md-4 pl-0 pr-0 mb-3 text-center">
                <label>Jumlah Beli</label>
                <input type="number" class="form-control text-center" name="jumlah" id="jumlah" onkeyup="subttl()">
              </div>

              <div class="col-md-4 text-center">
                <label>SubTotal</label>
                <input type="number" class="form-control text-center" name="total" id="total" readonly>
              </div>

              <div class="col-md-12 mb-2">
                <input type="button" name="simpan" class="form-control btn btn-success" value="Tambahkan" onclick="simpan_detail();">
              </div>

            </div>  
          </div>
          
        </div>
      </div>

      <div class="col-md-6">
        <div class="card card-tasks">
          <div class="container">

            <div class="card-header">
              <h4 class="card-title">Checkout</h4>
            </div>

            <div class="card-body row">

              <div class="col-md-3 m-auto">
                ID Transaksi
              </div>

              <div class="col-md-9 mb-1">
                <input type="text" name="nomor_pesanan" id="nomor_pesanan" class="form-control head-form mb-1" readonly value="{{ $trcode }}">
              </div>

              <div class="col-md-4 text-center">
                <label for="total_harga">Total Pembayaran</label>
                <input type="number" class="form-control text-center" name="total_harga" id="total_harga" readonly="">
              </div>

              <div class="col-md-4 pl-0 pr-0 mb-1 text-center">
                <label for="bayar">Dibayar</label>
                <input type="number" class="form-control text-center" name="bayar" id="bayar" onkeyup="byr()" required="" value="0">
              </div>

              <div class="col-md-4 text-center">
                <label for="kembali">Kembalian</label>
                <input type="number" class="form-control text-center" name="kembali" id="kembali" readonly>
              </div>

              <div class="col-md-12 mb-1 text-center">
                <label for="pembeli">Nama Pembeli</label>
                <input type="text" class="form-control text-center" name="pembeli" id="pembeli" required="" style="font-size: 14px;">
              </div>

              <div class="col-md-12 mb-2">
                <input type="submit" class="form-control btn btn-danger" name="submit" id="submit" value="Buat Pesanan">
              </div>

            </div>  
          </div>

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="container">

            <div class="card-header">
              <h4 class="card-title">Order List</h4>
            </div>

            <div class="card-body">
              <table id="myTable2" class="table table-bordered table-hover table-striped tblind">
                <thead>
                  <tr>
                    <th style="width: 30px">No.</th>
                    <!-- <th>Nomor Pesanan</th> -->
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th style="width: 90px; border-right: 1px solid #000;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no=1; $tot = 0;
                    foreach($detail as $d){
                      $tot = $tot+$d->subtotal;
                  ?>
                  <tr>
                    <td>{{ $no }}</td>
                    <td hidden="">{{ $d->id }}</td>
                    <!-- <td>{{ $d->nomor_pesanan }}</td> -->
                    <td>{{ $d->nama_produk }}</td>
                    <td>{{ $d->harga }}</td>
                    <td>{{ $d->jumlah_beli }}</td>
                    <td>{{ $d->subtotal }}</td>
                    <td style="border-right: 1px solid #000">
                        <a href="{{ route('order.destroy', ['id'=>$d->id ]) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ?');">
                          <i class="fas fa-trash"></i>
                        </a>
                    </td>
                  </tr>
                  <?php 
                    $no++;
                    }
                  ?>
                </tbody>
              </table>
            </div>

            <div class="card-footer"></div>
            
          </div>
        </div>
      </div>
    </div>

    </form> 

  </div>
@endsection

@push('js')

<script type="text/javascript">
  $('#jumlah').prop('readonly', true);
  $(document).ready(function() {
    $(document).on('change', '#id_produk', function() {
      var id =  $(this).val();
      var harga = $("#id_produk option:selected").attr("harga");
      var status = $("#id_produk option:selected").attr("status");
      if ( status == 'aktif') {
        $('#jumlah').prop('readonly', false).val('0');
        $('#harga').val(harga);
        $('#total').val('0');
      } else {
        $('#jumlah').prop('readonly', true).val('');
        $('#harga').val('Tidak aktif');
        $('#total').val('');
      };
    });
  });
</script>

<script type="text/javascript">
  function subttl(){
    hrg = $('#harga').val();
    jml = $('#jumlah').val();
    tot = hrg * jml;
    $('#total').val(tot);
  };
</script>

<script type="text/javascript">
  function simpan_detail(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
      type : "POST",
      url : "{{ route('simpan_detail') }}",
      dataType : "JSON",
      data : {
        nomor_pesanan:$('#nomor_pesanan').val(),
        id_produk : $('#id_produk').val(),
        jumlah_beli:$('#jumlah').val(),
        subtotal:$('#total').val(),
        "_token": "{{ csrf_token() }}"
      },
      success:function(data){
        alert("Data Berhasil Ditambahkan");
        window.location.reload();
        // $('#tabel_detail').load("/order#tabel_detail");
      },
      error: function(data) {
        alert("Isikan Data Dengan Benar !");
      }
    })
  };
</script>

<script type="text/javascript">
  $('#total_harga').val("<?php echo $tot; ?>");
  function byr(){
    b = $('#bayar').val();
    tb = $('#total_harga').val();
    kmbl = b-tb;
    $('#kembali').val(kmbl);
  }
</script>

<!-- <script type="text/javascript">
  function rupiah1($angka){
  $hasil_rupiah = "Rp " . number_format($angka, 0, ".", ".");
  return $hasil_rupiah;
}
</script> -->

<script type="text/javascript">
  $(document).ready(function(){
    $('.nicesl').niceSelect();
  });
</script>

@endpush

