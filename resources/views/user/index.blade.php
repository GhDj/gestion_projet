@extends('layout')

@section('page-title','Employés')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="panel panel-default">
                    {!! Form::open(array('url' => 'rechercheUser', 'method' => 'POST', 'class'=>'form-control')) !!}

                    <input type="text" name="recherche">
                    {{ Form::submit("Recherche",['class'=>'btn btn-primary']) }}
                    {{ Form::close() }}

                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom et prénom</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach ($user as $u)
                        <tr>
                            <td scope="row">
                                    <a href="/user/{{ $u->id }}">{{ $u->id }}</a></td>
                           <td>
                                    <a href="/user/{{ $u->id }}">{{ $u->name }}</a></td>
                            <td>
                                    <a href="/user/{{ $u->id }}">{{ $u->email }}</a></td>
                            <td>
                                    <a href="/user/{{ $u->id }}">
                                @if($u->role == 1) Chef
                                @else
                                    Employé
                                @endif
                           <a href="/user/{{ $u->id }}"> </a></td>
                        </tr>



                    @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection