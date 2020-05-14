@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'activePage' => 'home',
])

@push('css')
<style type="text/css">

  .content{
    min-height: unset !important;
  }

  .card{
    box-shadow: 0px 1px 15px 1px rgba(39,39,39,0.4);
  }

  h2{
    font-weight: unset; 
    margin: 10px 30px;
    font-size: 55px;
    color: #fff;
  }

  h5{
    font-size: 25px;
    margin: 0px 30px;
    color: #fff;
  }

  h4{
    margin-bottom: 0.50rem !important;
  }

  /*.font-widget{
    font-size: 12px;
  }*/

  .icon-widget{
    position: absolute; 
    right: 25px; 
    top: 37%; 
    color: #b7b7b7; 
    font-size: 40px;
  }

  .booked-wzs-160-110{
      margin:unset;
  }

</style>
@endpush

@section('content')
  <div class="panel-header panel-header-lg">

    <h2>Welcome Back !</h2>
      <br>
    <h5>Hai, {{ Auth::user()->name }}</h5>

    <!-- Widget Weather -->
    <div style="float: right; position: absolute; right: 0; top: 100px; margin-right: 45px; box-shadow: 0 1px 15px 1px rgba(39,39,39,0.6);">
      <a target="_blank" href="https://www.booked.net/weather/malang-39952">
        <img src="https://w.bookcdn.com/weather/picture/3_39952_1_1_08294d_323_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=2&domid=w209&anc_id=84554" alt="booked.net"/>
      </a>
    </div>


  </div>

  <div class="content">
    <div class="row">

      <div class="col-md-3">
        <div class="card card-tasks" style="border-left: 5px solid red">
          <div class="container">

            <div class="card-header">
              <h4 class="card-title">Product</h4>
            </div>

            <div class="card-body font-widget">
              {{ $t_produk }} Types
            </div>

            <div class="icon-widget">
              <i class="now-ui-icons shopping_box"></i>
            </div>

            <div class="card-footer"></div>

          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card card-tasks" style="border-left: 5px solid #1e1e1a">
          <div class="container">

            <div class="card-header">
              <h4 class="card-title">Stock</h4>
            </div>

            <div class="card-body font-widget">
              {{ $t_stok }} Items
            </div>

            <div class="icon-widget">
              <i class="now-ui-icons ui-2_settings-90"></i>
            </div>

            <div class="card-footer"></div>

          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card card-tasks" style="border-left: 5px solid yellow">
          <div class="container">

            <div class="card-header">
              <h4 class="card-title">Order</h4>
            </div>

            <div class="card-body font-widget">
              {{ $t_trns }} Success
            </div>

            <div class="icon-widget">
              <i class="now-ui-icons shopping_cart-simple"></i>
            </div>

            <div class="card-footer"></div>

          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card card-tasks" style="border-left: 5px solid #1CE3B1">
          <div class="container">

            <div class="card-header">
              <h4 class="card-title">Income</h4>
            </div>

            <div class="card-body font-widget">
              Rp. {{ $t_hrg }} 
            </div>

            <div class="icon-widget">
              <i class="now-ui-icons business_money-coins"></i>
            </div>

            <div class="card-footer"></div>

          </div>
        </div>
      </div>

    </div>
  </div>
@endsection