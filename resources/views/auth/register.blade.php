@extends('layout')

@section('page-title','Employés - Ajouter')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }} ">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">


                            <div class="md-form">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                <label for="name" class="">Nom et prénom</label>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                            <div class="md-form">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                            <div class="md-form">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <label for="password" class="col-md-4 control-label">Mot de passe</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">


                            <div class="md-form">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <label for="password-confirm" class="col-md-4 control-label">Confirmation mot de passe</label>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('matricule') ? ' has-error' : '' }}">

                        <div class="form-group">


                            <div class="md-form">

                                    {!! Form::text('matricule',false,['class' => 'form-control']) !!}
                                <label for="matricule" class="col-md-4 control-label">Matricule</label>
                                @if ($errors->has('matricule'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('matricule') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">

                                <div class="radio-container">
                                    <input name="role" type="radio" id="Chef" value="1">
                                    <label class="rd-label" for="Chef">Chef</label>
                                </div>

                                <div class="radio-container">
                                    <input name="role" type="radio" id="radio11" value="2">
                                    <label class="rd-label" for="radio11">Employé</label>
                                </div>


                                    {!! Form::radio('role', '1',true) !!}
                                    {!! Form::label('personnel', 'personnel:') !!}

                                    {!! Form::radio('role', '2',true)!!}


                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        Ajouter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
