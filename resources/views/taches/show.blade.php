@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <h1> Nom Tache : {{ $tache->nomTache }}</h1>

                        @if($tache->id==$tacheequipe->id_tache)
                            <?php

                                    ?>
                             <h2> Equipe affecté : {{ \App\Equipe::where("id","=",$tacheequipe->id_equipe)->first()->name }}</h2>
                        @endif

                       @foreach($commentaire as $c)

                                <label> {{ \App\User::findOrFail($c->id_user)->name  }} : </label>


                                    <label> {{ $c->commentaire  }}</label>
                            <label>" {{ $c->created_at }} "</label>
<hr>

                                @endforeach


                        {!! Form::open(array('route' => 'commentaire.store', 'method' => 'POST')) !!}

                            <input type="text" name="commentaire" >
                        <input type="hidden" name="id_tache" value="{{ $id }}">
                        <input type="hidden" name="id_user" value="{{ \Illuminate\Support\Facades\Auth::user()->id}}">


                        {!! Form::submit() !!}


                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection