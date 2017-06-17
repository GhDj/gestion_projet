@extends('layout')

@section('page-title','Projet - Modifier')

@section('title','Projet - Modifier')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7">


                <div class="card">

                    <div class="card-block">
                        <!--Header-->
                        <div class="form-header bg-primary col-sm-6">
                            <h3><i class="fa fa-edit"></i> Modification projet</h3>
                        </div>

                        {!! Form::open(array('route' =>['projet.update',$projet->id ] , 'method' => 'PATCH','autocomplete'=>'off')) !!}
                        <div class="md-form">
                            <label>Nom Projet:</label>
                            <input id="nomProjet" type="text" class="form-control" name="nomProjet" required value="{{ $projet->nomProjet }}">
                        </div>
                        <div class="md-form">
                            <label>Description :</label>


                            <input id="description" type="text" class="form-control" name="description" required placeholder="{{ $projet->description }}" value="{{ $projet->description }}">
                        </div>
                        <label> Etat de projet</label><br>

                        <div class="form-inline md-form">
                            <fieldset class="form-group">
                                <input name="etat" type="radio" id="encours" value="1" @if($projet->etat==1) checked @endif>
                                <label for="encours">En cours</label>
                            </fieldset>


                            <fieldset class="form-group">
                                <input name="etat" type="radio" id="cloture" value="0" @if($projet->etat==0) checked @endif>
                                <label for="cloture">Cloturé</label>
                            </fieldset>
                        </div>

                        <div class="md-form">
                            <label>Budget :</label>


                            <input id="budget" type="text" class="form-control" name="budget" required placeholder="{{ $projet->budget }}" value="{{ $projet->budget }}">
                        </div>

                        <div class="md-form">
                            <label>Date Debut :</label>

                            <input id="date_debut" type="text" class="form-control" name="tel" required placeholder="{{ $projet->date_debut }}" value="{{ $projet->date_debut }}">
                        </div>
                        <div class="md-form">
                            <label>Date Fin :</label>

                            <input id="date_fin" type="text" class="form-control" name="date_fin" required placeholder="{{ $projet->date_fin }}" value="{{ $projet->date_fin }}">
                        </div>

                        <div class="md-form">
                            <label>Lieu :</label>

                            <input id="service" type="text" class="form-control" name="lieu" required placeholder="{{ $projet->lieu }}" value="{{ $projet->lieu }}">
                        </div>


                        <div class="md-form">
                            <h3 class="d-inline">Service :</h3>

                           <!-- <input id="id_service" type="text" class="form-control" name="lieu" required placeholder="{{ $projet->id_service }}" value="{{ $projet->id_service }}">-->
                            <div class="d-inline">{{ \App\Service::where('id','=',$projet->id_service)->first()->nom_service }}</div>
                        </div>

                        <button id="submit" type="submit" class="btn btn-success pull-right" name="submit">
                            Enregistrer
                        </button>
                        <a href="{{ route('projet.index') }}" class="btn btn-danger pull-right">Retour</a>


                        {!! Form::close() !!}
                    </div>

                </div>


            </div>
    </div>
@endsection