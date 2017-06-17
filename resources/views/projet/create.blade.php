@extends('layout')

@section('header-script')

    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

@endsection

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



                        {!! Form::open(array('route' => 'projet.store', 'method' => 'POST', 'enctype'=>'multipart/form-data','class'=>'box')) !!}


                                <div class="md-form">
                                    {!! Form::text('nomProjet',null,['id'=>'nomProjet','class'=>'form-control form-check validate','required']) !!}
                                    {!! Form::label('nomProjet', 'NomProjet:') !!}

                                </div>

                                <div class="md-form">
                                    {!! Form::label('description', 'Description:') !!}
                                    {!! Form::text('description',null,['class'=>'form-control form-check validate','required']) !!}
                                </div>

                            <input type="hidden" value="1" name="etat">

                                <div class="md-form">
                                    {!! Form::label('budget', 'Budget:') !!}
                                    {!! Form::text('budget',null,['class'=>'form-control form-check validate','required']) !!}
                                </div>

                                <div class="form-inline col-sm-12">
                                    <div class="md-form form-group col-sm-5">
                                        {!! Form::label('date_debut', 'Date Debut:') !!}
                                        {!! Form::text('date_debut',null,['class'=>'form-control datepicker','required']) !!}
                                    </div>

                                    <div class="md-form form-group col-sm-5">
                                        {!! Form::label('date_fin', 'Date Fin:') !!}
                                        {!! Form::text('date_fin',null,['class'=>'form-control datepicker']) !!}
                                    </div>
                                </div>

                                <div class="md-form">
                                    {!! Form::label('lieu', 'Lieu:') !!}
                                    {!! Form::text('lieu',null,['class'=>'form-control form-check validate','required']) !!}
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

                        <div class="box__input droppable">
                            Choisir vos fichiers ou déplacer les fichiers ici.
                            <input class="box__file" type="file" name="fichier[]" id="file" multiple required />
                            <div id="label"></div>

                        </div>





                                {!! Form::token() !!}
                        <button class="btn btn-success pull-right" type="submit">Créer</button>

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


    function triggerCallback(e) {
    var files;
    if(e.dataTransfer) {
    files = e.dataTransfer.files;
    } else if(e.target) {
    files = e.target.files;
    }
    callback.call(null, files);
    }

    function makeDroppable(element, callback) {

    var input = document.getElementById('file');

    input.addEventListener('change', triggerCallback);
    element.appendChild(input);

    element.addEventListener('dragover', function(e) {
        e.preventDefault();
        e.stopPropagation();
        element.classList.add('dragover');
    });

    element.addEventListener('dragleave', function(e) {
    e.preventDefault();
    e.stopPropagation();
    element.classList.remove('dragover');
    });

    element.addEventListener('drop', function(e) {
    e.preventDefault();
    e.stopPropagation();
    element.classList.remove('dragover');
    triggerCallback(e);
    });

    element.addEventListener('click', function() {
    input.click();
    });

    function triggerCallback(e) {
    var files;
    if(e.dataTransfer) {
        files = e.dataTransfer.files;
        $('#label').text(files.length+" fichier(s) sélectionnée(s)");
    } else if(e.target) {
        files = e.target.files;
        $('#label').text(files.length+" fichier(s) sélectionnée(s)");
    }
    callback.call(null, files);
    }
    }

    var element = document.querySelector('.droppable');
    function callback(files) {
    // Here, we simply log the Array of files to the console.
    console.log(files);
    }
    makeDroppable(element, callback);



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