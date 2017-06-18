@extends('layout')


@section('page-title')

    Projet - Ajouter

@endsection

@section('title')

    Projet - Ajouter

    @endsection

@section('header-script')

    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">


                <div class="card">

                    <div class="card-block">
                        <!--Header-->
                        <div class="form-header bg-primary col-sm-6">
                            <h3>Creation d'une tâche :</h3>
                        </div>


                    {!! Form::open(array('route' => 'tache.store', 'method' => 'POST')) !!}
                     
                         <div class="md-form">
                            {!! Form::label('nomTache', 'Intitulé ') !!}
                            {!! Form::text('nomTache') !!}
                        </div>
                         <div class="md-form">
                            {!! Form::label('description_tache', 'Description') !!}
                            {!! Form::text('description_tache') !!}
                        </div>
                         <div class="md-form">
                            {!! Form::label('duree', 'Duree') !!}
                            {!! Form::text('duree') !!}
                        </div>
                         <div class="md-form">
                            {!! Form::label('statut_tache', 'Statut') !!}
                            {!! Form::text('statut_tache') !!}
                        </div>

                        <div class="form-inline">
                            <div class="md-form col-sm-6">
                                {!! Form::label('date_debut_tache', 'Date debut') !!}
                                {!! Form::text('date_debut_tache',null,['class'=>'datepicker']) !!}
                            </div>
                            <div class="md-form col-sm-6">
                                {!! Form::label('date_fin_tache', 'Date fin') !!}
                                {!! Form::text('date_fin_tache',null,['class'=>'datepicker']) !!}
                            </div>
                        </div>

                         <div class="md-form">
                            {!! Form::label('priorite', 'Priorite ') !!}

                        </div>
                        <div class="range-field">

                            <input type="range" name="priorite" min="0" max="10" value="0">
                        </div>


                        <input type="hidden" value="1" name="statut_tache">

                        <input type="hidden" value="{{ $module->id }}" name="id_module">


                         <div class="md-form">
                            {!! Form::label('cout', 'Cout:') !!}
                            {!! Form::number('cout',null,['required']) !!}
                        </div>

                        <label> Affecté à :</label>
                        <select name="id_equipe" class="mdb-select">
                            @foreach($equipe as $e)
                                <option value="{{ $e->id }}">{{ $e->name}}</option>

                            @endforeach
                        </select>



                        {!! Form::token() !!}
                     
                    <input id="submit" type="submit" class="form-control" name="submit" required>

                    {!! Form::close() !!}


                    </div>

                </div>


            </div>
    </div>

    </div>
@endsection