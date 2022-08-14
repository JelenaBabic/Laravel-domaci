@extends('layouts.app')

@section('content')


<h1>Authors</h1> <a href="/laravel-domaci/public/authors/create" class="btn btn-primary">Add new author</a> <br>
<br>

@if(count($authors)>0)
    @foreach($authors as $author)
    <div class= "well">
        <h3><a href ="/laravel-domaci/public/authors/{{$author->id}}">{{$author->firstName}} {{$author->lastName}}</a></h3>
        <small>Added on: {{$author->created_at}} </small>
    </div>

    @endforeach
    {{$authors->links()}}

@else
<p>No authors found.</p>
@endif

@endsection