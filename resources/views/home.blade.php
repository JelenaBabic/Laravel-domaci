@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/laravel-domaci/public/houses/create" class="btn btn-primary">Create new Publishing House</a>

                    <h3>My publishing houses</h3>
                    @if(count($houses)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Adress</th>
                            <th>Contact</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($houses as $house)
                        <tr>
                            <th>{{$house->name}}</th>
                            <th>{{$house->adress}}</th>
                            <th>{{$house->contact}}</th>
                            <th><a href="/laravel-domaci/public/houses/{{$house->id}}/edit" class="btn btn-success">Edit</th>
                            <th>{!!Form::open(['action' => ['App\Http\Controllers\PHousesController@destroy', $house->id], 'method' => 'POST', 'class' => 'text-left'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </th>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <p>You haven't created any publishing house yet.</p>

                    @endif

                </div>
               
            </div>
        </div>
        <form  action="{{ route('logout') }}" method="POST" >
            {{ csrf_field() }}
        </form>
       
    </div>
</div>
@endsection
