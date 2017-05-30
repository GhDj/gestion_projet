@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        {!! Form::open(array('route' =>['projet.update',$projet->id ] , 'method' => 'PATCH','autocomplete'=>'off')) !!}
                        <p>
                            <label>Nom Projet:</label>
                            <input id="nomProjet" type="text" class="form-control" name="nomProjet" required value="{{ $projet->nomProjet }}">
                        </p>
                        <p>
                            <label>Description :</label>


                            <input id="description" type="text" class="form-control" name="description" required placeholder="{{ $projet->description }}" value="{{ $projet->description }}">
                        </p>
                        <label> Etat de projet</label><br>

                       <label>En cours</label> <input name="etat" type="radio" value="1" @if($projet->etat==1) checked @endif>

                        <label>Cloturé</label>
                        <input name="etat" type="radio" value="1" @if($projet->etat==0) checked @endif>

                        <p>
                            <label>budget :</label>


                            <input id="budget" type="text" class="form-control" name="budget" required placeholder="{{ $projet->budget }}" value="{{ $projet->budget }}">
                        </p>

                        <p>
                            <label>date_debut :</label>

                            <input id="date_debut" type="text" class="form-control" name="tel" required placeholder="{{ $projet->date_debut }}" value="{{ $projet->date_debut }}">
                        </p>
                        <p>
                            <label>date_fin :</label>

                            <input id="date_fin" type="text" class="form-control" name="date_fin" required placeholder="{{ $projet->date_fin }}" value="{{ $projet->date_fin }}">
                        </p>

                        <p>
                            <label>lieu :</label>

                            <input id="service" type="text" class="form-control" name="lieu" required placeholder="{{ $projet->lieu }}" value="{{ $projet->lieu }}">
                        </p>
                        <p>
                            <label>lieu :</label>

                            <input id="service" type="text" class="form-control" name="lieu" required placeholder="{{ $projet->lieu }}" value="{{ $projet->lieu }}">
                        </p>

                        <p>
                            <label>id_service :</label>

                            <input id="id_service" type="text" class="form-control" name="lieu" required placeholder="{{ $projet->id_service }}" value="{{ $projet->id_service }}">
                        </p>
                        <input id="submit" type="submit" class="form-control" name="submit" required>
                        <a href="{{ route('projet.index') }}" class="button">Retour</a>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection