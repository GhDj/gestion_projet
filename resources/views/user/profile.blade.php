@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        {!! Form::open(array('route' => ['user.update',$user->id ], 'method' => 'PATCH', 'enctype'=>'multipart/form-data')) !!}

                        <p>
<label>Nom :</label>
<input id="nom" type="text" class="form-control" name="name" required placeholder="{{ $user->name }}" value="{{ $user->name }}">
</p>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <label> Photo profile</label>
                                {!! Form::file('photo')!!}
                                {!! Form::token() !!}


                            </div>
                        </div>
<p>
    <label>mail :</label>


<input id="email" type="text" class="form-control" name="email" required placeholder="{{ $user->email }}" value="{{ $user->email }}">
</p>
<p>
                        <p>
                            <label>matricule :</label>


                            <input id="matricule" type="text" class="form-control" name="matricule" required placeholder="{{ $user->matricule }}" value="{{ $user->matricule }}">
                        </p>
                        <p>
    <label>Role : </label> <br>
<label> Chef de projet :</label>
<input id="role" type="radio" class="form-control" name="role" required  @if($user->role==1) {{ "checked" }}@endif value=1>
<label>Personnel :</label>

<input id="role" type="radio" class="form-control" name="role" required @if($user->role==2) {{ "checked" }}@endif value=2>
</p>
<p>
<label>tel :</label>

<input id="adresse" type="text" class="form-control" name="tel" required placeholder="{{ $user->tel }}" value="{{ $user->tel }}">
</p>
<p>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-4 control-label">Password</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
        @endif
    </div>

</div>
</p>
<div class="form-group">
    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
</div>

<input id="submit" type="submit" class="form-control" name="submit" required>
<a href="{{ route('user.index') }}" class="button">Retour</a>

{!! Form::close() !!}
                </div>
            </div>

        </div>
        </div>
    </div>
@endsection