@extends('layouts.app', [
  'namePage' => 'Profile',
  'activePage' => 'profile',
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
		<div class="card">

			<form action="{{ route('users.update',['id'=>$profile->id]) }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                
                <div class="card card-primary" style="box-shadow: unset;">

                    <div class="card-header">
                        <h3 class="card-title">Your Data Profile</h3>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Nama" value="{{ $profile->name }}" autocomplete="name">
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter E-mail" value="{{ $profile->email }}" autocomplete="email">
                                    @error('email')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Sorry we cant show ur password :)" autocomplete="new-password">
                                    @error('password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="name">Verifikasi</label>
                                    <br>
                                    <label class="show">- Email Terverifikasi Pada : {{ $profile->email_verified_at }}</label>
                                </div>

                                <div class="form-group">
                                    <label for="name">Perubahan</label>
                                    <br>
                                    <label class="show">- Perubahan Akun Terakhir Pada : {{ $profile->updated_at }}</label>
                                </div>

                                <div class="form-group">
                                    <label for="name">Informasi Login</label>
                                    <br>
                                    <label class="show">- Login Terakhir Pada : {{ $profile->last_login_at }}</label>
                                    <br>
                                    <label class="show">- IP Login Terakhir : {{ $profile->last_login_ip }}</label>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-gradient-dark">
                        <div class="float-left">
                            
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