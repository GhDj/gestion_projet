@extends('layout')


@section('page-title')

    Compte - {{ Auth::user()->name }}

@endsection

@section('title')

    Compte - {{ Auth::user()->name }}

@endsection

@section('header-script')

    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

@endsection

@section('content')
    <section class="section">

        <div class="container">

                     <div class="card">
                         <div class="card-block">
                             <div class="form-header bg-primary col-sm-6">
                                 <h3>Compte - {{ Auth::user()->name }}</h3>
                             </div>

                             {!! Form::open(array('route' => ['user.update',$user->id ], 'method' => 'PATCH', 'enctype'=>'multipart/form-data')) !!}

                             <div class="md-form">

                                 <input id="nom" type="text" class="form-control validate " name="name" required placeholder="{{ $user->name }}" value="{{ $user->name }}"><label for="nom">Nom :</label>
                             </div>
                             <div class="md-form input-group">
                                 <div class="file-field">
                                     <div class="btn btn-success btn-sm">
                                         <span>Choisir photo de profile</span>
                                         <input type="file" name="photo">
                                     </div>
                                     <div class="file-path-wrapper">
                                         <input class="file-path validate" type="text" placeholder="Photo de profile">
                                         {!! Form::token() !!}
                                     </div>
                                 </div>
                             </div>
                         <!-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <label> Photo profile</label>
                                {!! Form::file('photo')!!}
                             {!! Form::token() !!}


                                 </div>
                             </div>-->
                             <div class="md-form">



                                 <input id="email" type="text" class="form-control" name="email" required placeholder="{{ $user->email }}" value="{{ $user->email }}">
                                 <label for="email">Mail :</label>
                             </div>

                             <div class="md-form">



                                 <input id="matricule" type="text" class="form-control validate" name="matricule" required placeholder="{{ $user->matricule }}" value="{{ $user->matricule }}">
                                 <label for="matricule">Matricule :</label>
                             </div>



                             <div class="md-form">


                                 <input id="tel" type="text" class="form-control" name="tel" required placeholder="{{ $user->tel }}" value="{{ $user->tel }}">
                                 <label for="tel">Tel :</label>
                             </div>

                             <div class="row">
                                 <div class="md-form{{ $errors->has('password') ? ' has-error' : '' }} col-sm-6">
                                     <label for="password">Password</label>

                                     <input id="password" type="password" class="form-control" name="password" required>

                                     @if ($errors->has('password'))
                                         <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                     @endif


                                 </div>

                                 <div class="md-form col-sm-6">
                                     <label for="password-confirm">Confirm Password</label>

                                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                 </div>
                             </div>


                             <button type="submit" class="btn btn-success pull-right" ><i class="fa fa-save"></i>Enregistrer</button>


                             {!! Form::close() !!}

                         </div>
                     </div>
        </div>
    </section>
@endsection
