@extends('layouts.app', [
    'namePage' => 'Welcome',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'welcome',
    'hidden' => 'hidden="true"',
])

@push('css')
<style type="text/css">

    body{
        background-image: url( '/img/background.jpg' );
        background-size: cover;
        background-repeat: no-repeat;
    }

    .main-panel{
            width: 100%;
            background-color: unset;
        }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .bighead{
    	background-color: #fff;
    	text-align: center;
    	font-size: 50px;
    	width: 100%;
    	position: absolute;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 40px;
        color: #fff;
    }

    .subtitle{
        font-size: 20px;
        color: #fff;
    }

    .link a{
    	width: 100px;
    	margin: 20px 10px;
    }

    .btn.black{
    	background-color: #000;
    	color: #fff;
    	border: 1px solid white;
    	transition: 0.7s;
    }

    .btn.black:hover{
    	background-color: #fff;
    	color: #000;
    	border: 1px solid white;
    	transition: 0.5s;
    }

</style>
@endpush

@section('content')
<div class="black-cover">
	<div class="bighead navbar-light bg-white shadow-sm">
		iFurniture Market
	</div>
	<div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Dapatkan pengalaman seru belanja furnitur langsung di iFurniture.
            </div>
			<div class="subtitle m-b-md">
                Rasakan sendiri kualitas produk dan dapatkan pelayanan yang menyeluruh.
                <br>
                Belanja furnitur terasa lebih yakin dan menyenangkan !
            </div>
            <div class="link">
            	<a class="btn black" href="{{ route('login') }}">{{ __('Login') }}</a>
            	<a class="btn black" href="{{ route('register') }}">{{ __('Register') }}</a>
            </div>
        </div>
    </div>
</div>
        
@endsection
