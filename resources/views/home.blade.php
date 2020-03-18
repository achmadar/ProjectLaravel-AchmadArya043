@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
])

@push('css')
<style type="text/css">
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

    <div style="float: right; position: absolute; right: 0; top: 100px; margin-right: 45px;">
      <!-- <a target="_blank" href="https://www.booked.net/weather/malang-39952">
        <img src="https://w.bookcdn.com/weather/picture/32_39952_1_1_34495e_250_2c3e50_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=2&domid=w209&anc_id=39223" alt="booked.net"/>
      </a> -->
      <!-- weather widget start --><a target="_blank" href="https://www.booked.net/weather/malang-39952"><img src="https://w.bookcdn.com/weather/picture/3_39952_1_1_08294d_323_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=2&domid=w209&anc_id=84554"  alt="booked.net"/></a><!-- weather widget end -->
    </div>


  </div>

  <div class="content">
    <div class="row">
      
    </div>
    <div class="row">
      
    </div>
  </div>
@endsection