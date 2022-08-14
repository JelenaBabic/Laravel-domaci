@extends('layouts.app')

@section('content')

<h1>Edit author</h1>
{!! Form::open(['action' => ['App\Http\Controllers\AuthorController@update', $author->id], 'method' => 'PUT']) !!}
<div class= "form-group">
    {{Form::label('firstName', 'First Name')}}
    {{Form::text('firstName', $author->firstName, ['class' => 'form-control', 'placeholder' => 'First Name'])}}

    {{Form::label('lastName', 'Last Name')}}
    {{Form::text('lastName', $author->lastName, ['class' => 'form-control', 'placeholder' => 'Last Name'])}}

</div>
{{Form::hidden('_method', 'PUT')}}
{{Form::submit('Submit',['class' => 'btn btn-primary'])}}

{!! Form::close() !!}
@endsection