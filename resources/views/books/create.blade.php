@extends('layouts.app')

@section('content')

<h1>Add book</h1>
{!! Form::open(['action' => 'App\Http\Controllers\BooksController@store', 'method' => 'POST']) !!}
<div class= "form-group">



    <div class="form-group">
        <strong>Publishing House:</strong>
        <select name="house" class="form-control custom-select">
          <option value="">Select Publishing House</option>
          @foreach($houses as $house)
            <option value="{{ $house->id }}" >{{ $house->name }}</option>
          @endforeach
        </select>
    </div>

    <div class="form-group">
      <strong>Author:</strong>
      <select name="author" class="form-control custom-select">
        <option value="">Select Author</option>
        @foreach($authors as $author)
          <option value="{{ $author->id }}" >{{ $author->firstName }} {{ $author->lastName }}</option>
        @endforeach
      </select>
  </div>


    {{Form::label('title', 'Title')}}
    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}

    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>
</div>
{{Form::submit('Submit',['class' => 'btn btn-primary'])}}

{!! Form::close() !!}
@endsection