@extends('layouts.app')

@section('content')

<h1>Edit book</h1>
{!! Form::open(['action' => ['App\Http\Controllers\BooksController@update', $book->id], 'method' => 'PUT']) !!}
<div class= "form-group">

    <div class="form-group">
        <strong>Publishing House:</strong>
        <select name="house" class="form-control custom-select">
          <option value="">Select Publishing House</option>
          @foreach($houses as $house)
            <option value="{{ $house->id }}" @if($house->id == $book->house_id) selected @endif >{{ $house->name }}</option>
          @endforeach
        </select>
    </div>

    <div class="form-group">
      <strong>Author:</strong>
      <select name="author" class="form-control custom-select">
        <option value="">Select author</option>
        @foreach($authors as $author)
          <option value="{{ $author->id }}" @if($author->id == $book->author_id) selected @endif >{{ $author->firstName }} {{ $author->lastName }}</option>
        @endforeach
      </select>
  </div>

    {{Form::label('title', 'Title')}}
    {{Form::text('title', $book->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}

    {{Form::label('description', 'Description')}}
    {{Form::textarea('description', $book->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}


</div>
{{Form::hidden('_method', 'PUT')}}
{{Form::submit('Submit',['class' => 'btn btn-primary'])}}

{!! Form::close() !!}
@endsection