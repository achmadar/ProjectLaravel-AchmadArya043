@extends('layouts.app', [
  'namePage' => 'Verify',
  'activePage' => 'verify',
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

        .container{
            height: 100%;
        }

    </style>

@endpush
    
@section('content')
<div class="container-fluid black-cover">
    <div class="container">
        <div class="row justify-content-center true-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
