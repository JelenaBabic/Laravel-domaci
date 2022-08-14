@extends('layouts.app')

@section('content')
<a href = "/laravel-domaci/public/books" class="btn btn-default">Go back</a>
<h1>{{$book->title}}</h1>

<div>
    
<p>Written by: {{$book->author->firstName}} {{$book->author->lastName}} </p>
    
<p>Description: {{$book->description}}</p>

</div>
<small>Written on {{$book->created_at}}</small>
<hr>
@if(!Auth::guest())
   {{-- / @if(Auth::user()->id == $book->user_id) --}}

            <a href="/laravel-domaci/public/books/{{$book->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['App\Http\Controllers\BooksController@destroy', $book->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
    {{-- @endif         --}}
@endif
@endsection