@extends('layouts.app')

@section('content')

<h1>Edit publishing house</h1>
{!! Form::open(['action' => ['App\Http\Controllers\PHousesController@update', $house->id], 'method' => 'PUT']) !!}
<div class= "form-group">
    {{Form::label('name', 'Name')}}
    {{Form::text('name', $house->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}

    {{Form::label('adress', 'Adress')}}
    {{Form::text('adress', $house->adress, ['class' => 'form-control', 'placeholder' => 'Adress'])}}

    {{Form::label('contact', 'Contact')}}
    {{Form::text('contact', $house->contact, ['class' => 'form-control', 'placeholder' => 'Contact'])}}

</div>
{{Form::hidden('_method', 'PUT')}}
{{Form::submit('Submit',['class' => 'btn btn-primary'])}}

{!! Form::close() !!}
@endsection