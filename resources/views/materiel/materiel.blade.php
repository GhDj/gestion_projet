@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        {!! Form::open(array('route' =>['materiel.update',$materiel->id ] , 'method' => 'PATCH','autocomplete'=>'off')) !!}
                        <p>
                            <label>nom Materiel:</label>
                            <input id="nom_materiel" type="text" class="form-control" name="nom_materiel" required value="{{ $materiel->nom_materiel }}">
                        </p>
<p> <input type="hidden" value="{{ $materiel->id_tache }}" name="id_tache"></p>
                        <input id="submit" type="submit" class="form-control" name="submit" required>
                        <a href="{{ route('materiel.show',['id'=>$materiel->id_projet]) }}" class="button">Retour</a>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection