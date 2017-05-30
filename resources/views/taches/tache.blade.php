@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        {!! Form::open(array('route' =>['tache.update',$tache->id ] , 'method' => 'PATCH','autocomplete'=>'off')) !!}
                        <p>
                            <label>Nom Tache:</label>
                            <input id="nomTache" type="text" class="form-control" name="nomTache" required value="{{ $tache->nomTache }}">
                        </p>
                        <p>
                            <label>Description tache:</label>
                            <input id="description_tache" type="text" class="form-control" name="description_tache" required value="{{ $tache->description_tache }}">
                        </p>
                        <p>
                            <label>duree:</label>
                            <input id="duree" type="text" class="form-control" name="duree" required value="{{ $tache->duree }}">
                        </p> <p>
                            <label>statut tache:</label>
                            <label>En cours</label> <input name="statut_tache" type="radio" value="1" @if($tache->statut_tache==1) checked @endif>

                            <label>Cloturé</label>
                            <input name="statut_tache" type="radio" value="0" @if($tache->statut_tache==0) checked @endif>

                        </p>
                        <p>
                            <label>Date debut tache:</label>
                            <input id="date_debut_tache" type="text" class="form-control" name="date_debut_tache" required value="{{ $tache->date_debut_tache }}">
                        </p>
                        <p>
                            <label>Date fin tache:</label>
                            <input id="date_fin_tache" type="text" class="form-control" name="date_fin_tache" required value="{{ $tache->date_fin_tache }}">
                        </p>
                        <p>
                            <label>Priorite:</label>
                            <input id="priorite" type="text" class="form-control" name="priorite" required value="{{ $tache->priorite }}">
                        </p>
                        <p>
                            <label> Choisir une equipe</label>
                            <select name="id_equipe">
                                @foreach($equipe as $e)
                                    <option @if($e->id==\App\Equipe::where("id","=",$tacheequipe->id_equipe)->first()->id) selected @endif
                                            value="{{ $e->id }}">{{ $e->name }}</option>

                                @endforeach
                            </select>
                        </p>

                        <input id="submit" type="submit" class="form-control" name="submit" required>
                        <a href="{{ route('projet.show',['id'=>$tache->id_projet]) }}" class="button">Retour</a>


                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection