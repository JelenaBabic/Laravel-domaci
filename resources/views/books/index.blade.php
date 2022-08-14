@extends('layouts.app')

@section('content')

<h1>Books</h1> <a href="/laravel-domaci/public/books/create" class="btn btn-primary">Add new book</a> <br>
<br>
@if(count($books)>0)
    @foreach($books as $book)
    <div class= "well">
        <h3><a href ="/laravel-domaci/public/books/{{$book->id}}">{{$book->title}}</a></h3>
        <p>Written by: {{$book->author->firstName}} {{$book->author->lastName}} </p>
        <small>Added on: {{$book->created_at}} </small>
    </div>

    @endforeach
    {{$books->links()}}

@else
<p>No books found.</p>
@endif

@endsection