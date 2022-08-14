@extends('layouts.app')

@section('content')
<a href = "/laravel-domaci/public/authors" class="btn btn-default">Go back</a>
<h1>{{$author->firstName}} {{$author->lastName}}</h1>


<small>Added on: {{$author->created_at}}</small>
<hr>
@if(!Auth::guest())
   {{-- / @if(Auth::user()->id == $author->user_id) --}}

            <a href="/laravel-domaci/public/authors/{{$author->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['App\Http\Controllers\AuthorController@destroy', $author->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
    {{-- @endif         --}}
@endif

<h3>{{$author->firstName}} {{$author->lastName}}'s books</h3>
                    @if(count($author->books)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>

                            @if(!Auth::guest())
                                 @if(Auth::user()->id == $author->user_id)
                                     <th>Edit</th>
                                     <th>Delete</th>
                                @endif
                             @endif
                        </tr>
                        @foreach($author->books as $book)
                        <tr>
                            <th>{{$book->title}}</th>
                            <th>{{$book->description}}</th>

                            @if(!Auth::guest())
                                 @if(Auth::user()->id == $author->user_id)
                                    <th><a href="/laravel-domaci/public/books/{{$book->id}}/edit" class="btn btn-success">Edit</th>
                                    <th>{!!Form::open(['action' => ['App\Http\Controllers\BooksController@destroy', $book->id], 'method' => 'POST', 'class' => 'text-left'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                @endif
                            @endif
                        </th>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <p>{{$author->firstName}} {{$author->lastName}} haven't published any book yet.</p>

                    @endif

@endsection