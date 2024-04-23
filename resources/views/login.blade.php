@extends('template.app')
@section('container')
<div class="row align-items-center justify-content-center">
    <div class="col-md-7">
      <div class="mb-4">
        <h3>Login</h3>
        <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
      </div>
      <form action="{{ route('login.action') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Username <span class="text-danger">*</span></label>
            <input class="form-control" type="username" name="username" value="{{ old('username') }}" />
        </div>
        <div class="mb-3">
            <label>Password <span class="text-danger">*</span></label>
            <input class="form-control" type="password" name="password" />
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Login</button>
            {{-- <a class="btn btn-danger" href="{{ route('home') }}">Back</a> --}}
        </div>
    </form>
    </div>
  </div>
@endsection
