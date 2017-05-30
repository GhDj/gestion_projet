@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

{{ $module->designation }}

<br>
    <a href="/projet/modules/tache/create/{{ $module->id }}"> Ajouter tache</a>
                        <h3>Liste des taches</h3>

                         @foreach($tache as $t)
                            <li> <label> Nom Tache : </label>
                                <a href="/tache/{{ $t->id }}">{{ $t->nomTache }}</a> <br>


                                <a href="/tache/{{ $t->id }}/edit"> Modifier Tache</a>
                                <a href="/projet/modules/tache/materiel/create/{{$t->id}}"> Ajouter materiel</a>



                                @endforeach </li>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection