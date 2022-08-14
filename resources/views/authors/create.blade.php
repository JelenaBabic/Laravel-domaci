@extends('layouts.app')

@section('content')

<h1>Add author</h1>
{!! Form::open(['action' => 'App\Http\Controllers\AuthorController@store', 'method' => 'POST']) !!}
<div class= "form-group">
    {{Form::label('firstName', 'First name')}}
    {{Form::text('firstName', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}

    {{Form::label('lastName', 'Last Name')}}
    {{Form::text('lastName', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}

    

</div>
{{Form::submit('Submit',['class' => 'btn btn-primary'])}}

{!! Form::close() !!}
@endsection