@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    {!! Form::open(array('url' => 'rechercheUser', 'method' => 'POST')) !!}

                    <input type="text" name="recherche">
                    {{ Form::submit() }}
                    {{ Form::close() }}

                    <div class="panel-heading">Liste des Users</div>
                    @foreach ($user as $u)
                    <div class="panel-body">

                       <a href="/user/{{ $u->id }}"> {{ $u->name }}</a>
                                                <hr>
                 </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection