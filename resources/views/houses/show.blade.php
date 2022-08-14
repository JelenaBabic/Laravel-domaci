@extends('layouts.app')

@section('content')
<a href = "/laravel-domaci/public/houses" class="btn btn-default">Go back</a>
<h1>{{$house->name}}</h1>

<div>
    
<p>Adress: {{$house->adress}}</p>
<p>Contact: {{$house->contact}}</p>
</div>
<small>Written on {{$house->created_at}} by {{$house->user->name}}</small>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->id == $house->user_id)

            <a href="/laravel-domaci/public/houses/{{$house->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['App\Http\Controllers\PHousesController@destroy', $house->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
    @endif        
@endif
<hr>
{{-- <a href="/laravel-domaci/public/books/create" class="btn btn-primary">Add new book</a> --}}

                    <h3>{{$house->name}}'s books</h3>
                    @if(count($house->books)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>

                            @if(!Auth::guest())
                                 @if(Auth::user()->id == $house->user_id)
                                     <th>Edit</th>
                                     <th>Delete</th>
                                @endif
                             @endif
                        </tr>
                        @foreach($house->books as $book)
                        <tr>
                            <th>{{$book->title}}</th>
                            <th>{{$book->description}}</th>

                            @if(!Auth::guest())
                                 @if(Auth::user()->id == $house->user_id)
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
                    <p>{{$house->name}} haven't published any book yet.</p>

                    @endif
@endsection