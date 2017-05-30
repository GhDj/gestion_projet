@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        {!! Form::open(array('route' =>['logistique.update',$logistique->id ] , 'method' => 'PATCH','autocomplete'=>'off')) !!}
                        <p>
                            <label>Description Logistique:</label>
                            <input id="description_logistique" type="text" class="form-control" name="description_logistique" required value="{{ $logistique->description_logistique }}">
                        </p>
                        <p> <input type="hidden" value="{{ $logistique->id_tache }}" name="id_tache"></p>
                        <input id="submit" type="submit" class="form-control" name="submit" required>
                        <a href="{{ route('logistique.show',['id'=>$logistique->id_projet]) }}" class="button">Retour</a>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection