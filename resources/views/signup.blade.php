@extends('layouts/app')

@section('title')
    Sign up
@endsection

@section('content')
    <div class="signUpContainer">
        <div class="container">
            <div class="header">
                <h1>Signup</h1>

                @if ($flash = session('error'))
                    <div class="alert alert-danger">{{ $flash }}</div>
                @endif

            </div>
        </div>

        <div class="container">
            <div class="loginForm">
                <form action="" method="post">
                    {{ csrf_field() }}
                    <label for="firstname">First name</label>
                    <input class="form-control" type="text" name="firstname" id="firstname">

                    <label for="lastname">Last name</label>
                    <input class="form-control" type="text" name="lastname" id="lastname">

                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email">

                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">

                    <label for="confirmPassword">Confirm password</label>
                    <input class="form-control" type="password" name="confirmPassword" id="password">

                    <input class="btn btn-primary" type="submit" value="Signup">
                </form>
            </div>
        </div>
    </div>
@endsection
