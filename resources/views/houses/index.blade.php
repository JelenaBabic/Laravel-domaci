@extends('layouts.app')

@section('content')

<h1>Publishing Houses</h1>
@if(count($houses)>0)
    @foreach($houses as $house)
    <div class= "well">
        <h3><a href ="/laravel-domaci/public/houses/{{$house->id}}">{{$house->name}}</a></h3>
        <small>Added on: {{$house->created_at}} by {{$house->user->name}}</small>
    </div>

    @endforeach
    {{$houses->links()}}

@else
<p>No publishing houses found.</p>
@endif

@endsection