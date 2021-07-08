@extends('layouts.main')
@section('content')
    <div class="col-md-4 offset-md-4 mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Form Register</h3>
            </div>
            <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="card-body">
                @if(session('errors'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Something it's wrong:
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for=""><strong>Nama Lengkap</strong></label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for=""><strong>Email</strong></label>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for=""><strong>Password</strong></label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for=""><strong>Konfirmasi Password</strong></label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
                <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Login</a> sekarang!</p>
            </div>
            </form>
        </div>
    </div>
@endsection