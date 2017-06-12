@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7">


                <div class="card">

                    <div class="card-block">
                        <!--Header-->
                        <div class="form-header bg-primary col-sm-6">
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

                            <div class="col-sm-12 form-inline md-form">
                                <input type="hidden" name="id_equipe" class="form-control form-check" id="id_equipe">
                                <div class="col-sm-4">Equipe : </div>
                                <div id="selected-equipe" class="col-sm-5"></div>
                            </div>

                        <div class="col-sm-12 form-inline md-form">
                            <input type="hidden" name="id_service" class="form-control form-check" id="id_service">
                            <div class="col-sm-4">Service : </div>
                            <div id="selected-service" class="col-sm-5"></div>
                        </div>

                           <!-- <label> Equipe :</label>
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

                            </select><br>-->
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


            <div class="col-sm-5 col-md-5">


                    <div class="card" id="equipe-list">

                        <div class="card-block">
                            <!--Header-->
                            <div class="form-header col-sm-6 bg-danger">
                                <h3>Equipes</h3>
                            </div>

                         </div>
                        <div class="list-group">
                            @foreach($equipe as $e)


                                <a class="list-group-item list-group-item-action" value="{{ $e->id }}">
                                   <div class="col-sm-6"> {{ $e->name }}</div>
                                    <div class="col-sm-6 pull-right"><span class="badge badge-danger badge-pill pull-right">{{ \App\Equipe_user::where('id_equipe','=',$e->id)->count() }}</span></div>

                                </a>
                            @endforeach
                        </div>
                        </div>

                <div class="card" id="services-list">

                    <div class="card-block">
                        <!--Header-->
                        <div class="form-header bg-success col-sm-6">
                            <h3>Services</h3>
                        </div>
                    </div>
                    <div class="list-group">
                        @foreach($service as $e)


                            <a class="list-group-item list-group-item-action" value="{{ $e->id }}">
                                {{ $e->nom_service }}

                            </a>
                        @endforeach
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

        $('#equipe-list .list-group .list-group-item ').click(function (e) {
            $('#id_equipe').val($(this).attr('value'));
            $('#selected-equipe').text($(this).children().first().text());
        });

    $('#services-list .list-group .list-group-item ').click(function (e) {
    console.log($(this).text());
    $('#id_service').val($(this).attr('value'));
    $('#selected-service').text($(this).text());
    });

@endsection