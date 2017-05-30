@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        {!! Form::open(array('route' =>['consommable.update',$consommable->id ] , 'method' => 'PATCH','autocomplete'=>'off')) !!}
                        <p>
                            <label>Nom consommable:</label>
                            <input id="nom_consommable" type="text" class="form-control" name="nom" required value="{{ $consommable->nom }}">
                        </p>

                        <p>
                            <label>quantite estime:</label>
                            <input id="quantite_estime" type="text" class="form-control" name="quantite_estime" required value="{{ $consommable->quantite_estime }}">
                        </p>

                        <p> <input type="hidden" value="{{ $consommable->id_tache }}" name="id_tache"></p>

                        <input id="submit" type="submit" class="form-control" name="submit" required>
                        <a href="{{ route('consommable.show',['id'=>$consommable->id_projet]) }}" class="button">Retour</a>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection