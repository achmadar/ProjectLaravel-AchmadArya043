@extends('layouts.app', [
  'namePage' => 'Edit User',
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

  </style>
@endpush

@section('content')
  <div class="panel-header panel-header-lg">
    
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
		<div class="container card">

			<form action="{{ route('users.update',['id'=>$users->id]) }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                
                <div class="card card-primary" style="box-shadow: unset;">

                    <div class="card-header">
                        <h3 class="card-title">Edit Data</h3>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group col-md-6 mr-4 ">
                                    <label for="name">Nama User</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Nama" value="{{ $users->name }}" autocomplete="name">
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 mr-4 ">
                                    <label>E-Mail</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter E-mail" value="{{ $users->email }}" autocomplete="email">
                                    @error('email')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 mr-4 ">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required="" placeholder="Sorry we cant show ur password :)" autocomplete="new-password">
                                    @error('password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-gradient-dark">
                        <div class="float-left">
                            <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
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