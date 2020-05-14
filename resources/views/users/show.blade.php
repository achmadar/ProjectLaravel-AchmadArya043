@extends('layouts.app', [
  'namePage' => 'Detail Users',
  'activePage' => 'users',
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

    .form-control{
        font-size: 13px;
        cursor: default;
    }

    .form-control[readonly]{
        background-color: unset;
        color: #000;
        cursor: unset;
    }

    .show {
        font-size: 13px !important;
        color: #000 !important;
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
                
                <div class="card card-primary" style="box-shadow: unset;">

                    <div class="card-header">
                        <h3 class="card-title">Detail Data</h3>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Nama" value="{{ $users->name }}" autocomplete="name" readonly="">
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter E-mail" value="{{ $users->email }}" autocomplete="email" readonly="">
                                    @error('email')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Sorry we cant show ur password :)" autocomplete="new-password" readonly="">
                                    @error('password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="name">Verifikasi</label>
                                    <br>
                                    @if ( is_null( $users->email_verified_at ) )
                                        <label class="show">- Email Terverifikasi Pada : Belum Terverifikasi</label>
                                    @else 
                                        <label class="show">- Email Terverifikasi Pada : {{ $users->email_verified_at }}</label>
                                    @endif
                                </div> 

                                <div class="form-group">
                                    <label for="name">Perubahan</label>
                                    <br>
                                    <label class="show">- Perubahan Akun Terakhir Pada : {{ $users->updated_at }}</label>
                                </div>

                                <div class="form-group">
                                    <label for="name">Informasi Login</label>
                                    <br>
                                    @if ( is_null( $users->last_login_at ) )
                                        <label class="show">- Login Terakhir Pada : Belum Pernah Login</label>
                                    @else 
                                        <label class="show">- Login Terakhir Pada : {{ $users->last_login_at }}</label>
                                    @endif
                                    <br>
                                    @if ( is_null( $users->last_login_ip ) )
                                        <label class="show">- IP Login Terakhir : - </label>
                                    @else 
                                        <label class="show">- IP Login Terakhir : {{ $users->last_login_ip }}</label>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-gradient-dark">
                        <div class="float-left">
                            <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
                        </div>
                    </div>

                </div>
            </form>

		</div>
      </div>
    </div>
  </div>

@endsection