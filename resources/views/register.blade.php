@extends('template.app')
@section('container')
<div class="row align-items-center justify-content-center">
    <div class="col-md-7">
      <div class="mb-4">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <h3>@yield('title', $title)</h3>
        <p class="mb-4">Selamat datang di halaman </p>
      </div>
      <form action="{{ route('register.action') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="nama" value="{{ old('nama') }}" />
        </div>
        <div class="mb-3">
            <label>Alamat <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="alamat" value="{{ old('alamat') }}" />
        </div>
        <div class="mb-3">
            <label>Nomor Telepon: <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}" />
        </div>
        <div class="mb-3">
            <label>Nomor SIM: <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="nomor_SIM" value="{{ old('nomor_SIM') }}" />
        </div>
        <div class="mb-3">
            <label>Username <span class="text-danger">*</span></label>
            <input class="form-control" type="username" name="username" value="{{ old('username') }}" />
        </div>
        <div class="mb-3">
            <label>Password <span class="text-danger">*</span></label>
            <input class="form-control" type="password" name="password" />
        </div>
        <div class="mb-3">
            <label>Password Confirmation<span class="text-danger">*</span></label>
            <input class="form-control" type="password" name="password_confirm" />
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Register</button>

        </div>
    </form>
    </div>
  </div>
@endsection
