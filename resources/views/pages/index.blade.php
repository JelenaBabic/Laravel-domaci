@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Welcome To Bookeep!</h1>
        <p>This is an online book corner for passionate readers.</p>
        @if (Auth::guest())
            <p><a class="btn btn-primary btn-lg" href="/laravel-domaci/public/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/laravel-domaci/public/register" role="button">Register</a></p>
        @endif
    </div>
@endsection
