@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">


                <div class="card">

                    <div class="card-block">
                        <!--Header-->
                        <div class="form-header mdb-color col-sm-6">
                            <h3>Creation d'un projet :</h3>
                        </div>



                        {!! Form::open(array('route' => 'projet.store', 'method' => 'POST', 'enctype'=>'multipart/form-data')) !!}


                                <div class="md-form">
                                    {!! Form::text('nomProjet',null,['id'=>'nomProjet']) !!}
                                    {!! Form::label('nomProjet', 'NomProjet:') !!}

                                </div>

                                <div class="md-form">
                                    {!! Form::label('description', 'Description:') !!}
                                    {!! Form::text('description') !!}
                                </div>

                            <input type="hidden" value="1" name="etat">

                                <div class="md-form">
                                    {!! Form::label('budget', 'Budget:') !!}
                                    {!! Form::text('budget') !!}
                                </div>

                                <div class="form-inline col-sm-12">
                                    <div class="md-form form-group col-sm-5">
                                        {!! Form::label('date_debut', 'Date Debut:') !!}
                                        {!! Form::text('date_debut',null,['class'=>'form-control datepicker']) !!}
                                    </div>

                                    <div class="md-form form-group col-sm-5">
                                        {!! Form::label('date_fin', 'Date Fin:') !!}
                                        {!! Form::text('date_fin',null,['class'=>'form-control datepicker']) !!}
                                    </div>
                                </div>

                                <div class="md-form">
                                    {!! Form::label('lieu', 'Lieu:') !!}
                                    {!! Form::text('lieu') !!}
                                </div>


                            <input type="hidden" name="id_user" value="{{\Illuminate\Support\Facades\Auth::user()->id }}">
                            <label> Equipe :</label>
                            <select name="id_equipe">
                                @foreach($equipe as $e)
                                    <option value="{{ $e->id }}">{{ $e->name }} </option>
                                @endforeach

                            </select>

                            <label> Service: </label>
                            <select name="id_service">
                                @foreach($service as $s)
                                    <option value="{{ $s->id }}">{{ $s->nom_service }} </option>
                                @endforeach

                            </select><br>
                            <label> Ajouter fichier: </label>
                            {!! Form::file('fichier[]',['multiple'=>true]) !!}

                            <li>
                                {!! Form::token() !!}
                                {!! Form::submit() !!}
                            </li>

                        </ul>
                        {!! Form::close() !!}

                    </div>

                </div>


    </div>
    </div>
    </div>
@endsection

@section('script')

    $('.datepicker').pickadate({
    monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
    weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
    today: 'aujourd\'hui',
    clear: 'effacer',
    formatSubmit: 'yyyy/mm/dd'
    });

@endsection