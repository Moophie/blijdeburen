@extends('layouts/app')

@section('title')
    Login
@endsection

@section('content')

    <div class="login-container">
        <div>
            <div class="header">
                <h1>Login</h1>
                
                @if ($flash = session('error'))
                    <div class="alert alert-danger">{{ $flash }}</div>
                @endif

            </div>
        </div>

        <div>
            <div class="login-form">
                <form action="" method="post">
                    {{ csrf_field() }}
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email">

                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">

                    <input class="btn btn-primary" type="submit" value="Login">
                    <a href="/signup">Sign up</a>
                </form>
            </div>
        </div>
    </div>

@endsection