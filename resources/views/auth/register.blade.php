@extends('layout')

@section('page-title','Employés - Ajouter')


@section('content')

    <section class="section">
        <h1 class="section-heading">Ajouter Employé</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }} ">
                        {{ csrf_field() }}

                        <div class="md-form{{ $errors->has('name') ? ' has-error' : '' }}">


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

                        <div class="md-form{{ $errors->has('email') ? ' has-error' : '' }}">


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

                        <div class="md-form{{ $errors->has('password') ? ' has-error' : '' }}">


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

                        <div class="md-form">


                            <div class="md-form">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <label for="password-confirm" class="col-md-4 control-label">Confirmation mot de passe</label>
                            </div>
                        </div>

                        <div class="md-form{{ $errors->has('matricule') ? ' has-error' : '' }}">

                            <div class="md-form">


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
                        <div class="md-form">

                                <div class="radio-container">
                                    <input name="role" type="radio" id="Chef" value="1">
                                    <label for="Chef">Chef</label>
                                </div>

                                <div class="radio-container">
                                    <input name="role" type="radio" id="radio11" value="2">
                                    <label for="radio11">Employé</label>
                                </div>



                            <button type="submit" class="btn btn-success pull-right">
                                Ajouter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

@endsection
