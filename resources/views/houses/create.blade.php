@extends('layouts.app')

@section('content')

<h1>Create publishing house</h1>
{!! Form::open(['action' => 'App\Http\Controllers\PHousesController@store', 'method' => 'POST']) !!}
<div class= "form-group">
    {{Form::label('name', 'Name')}}
    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}

    {{Form::label('adress', 'Adress')}}
    {{Form::text('adress', '', ['class' => 'form-control', 'placeholder' => 'Adress'])}}

    {{Form::label('contact', 'Contact')}}
    {{Form::text('contact', '', ['class' => 'form-control', 'placeholder' => 'Contact'])}}

</div>
{{Form::submit('Submit',['class' => 'btn btn-primary'])}}

{!! Form::close() !!}
@endsection