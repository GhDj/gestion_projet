@extends('layout')

@section('page-title')

    Projet - {{ $projet->nomProjet }}

@endsection

@section('title')

    Projet - {{ $projet->nomProjet }}

@endsection
@section('content')

    <section class="section">
        <h1 class="section-heading">Fiche Projet</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">


                    <div class="card">

                        <div class="card-block">
                            <div class="form-header @if($projet->etat == 1) bg-success @else bg-danger @endif col-sm-6">
                                <h3>{{ $projet->nomProjet }} @if($projet->etat == 0) (Cloturé) @endif</h3>
                            </div>


                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>
                                            <h4 class="h4-responsive d-inline text-success"> <i class="fa fa-user"></i> Chef de projet :</h4>
                                            <h5 class="d-inline "> {{ \App\User::where('id','=',$projet->id_user)->first()->name }} </h5>

                                            </p>
                                            <p>
                                            <h4 class="h4-responsive d-inline text-success"> <i class="fa fa-cog"></i> Service :</h4>
                                            <h5 class="d-inline "> {{ \App\Service::where('id','=',$projet->id_service)->first()->nom_service }} </h5>

                                            </p>
                                            <p>
                                            <h4 class="h4-responsive d-inline text-success"> <i class="fa fa-money"></i> Budget :</h4>
                                            <h5 class="d-inline ">{{ $projet->budget }} </h5>

                                            </p>
                                        </div>

                                        <div class="col-sm-6">

                                            <p>
                                            <h4 class="h4-responsive d-inline text-success"> <i class="fa fa-calendar-check-o"></i> Date :</h4>
                                            <h5 class="d-inline "> De {{ $projet->date_debut }} à  {{ $projet->date_fin }}</h5>
                                            </p>

                                            <p>
                                            <h4 class="h4-responsive d-inline text-success"> <i class="fa fa-location-arrow"></i> Lieu :</h4>
                                            <h5 class="d-inline "> {{ $projet->lieu }} </h5>
                                            </p>

                                            <p>
                                            <h4 class="h4-responsive d-inline text-success"> <i class="fa fa-calendar-check-o"></i> Etat :</h4>
                                            <h5 class="d-inline ">@if($projet->etat == 1) En cours @else Cloturé @endif </h5>
                                            </p>

                                        </div>


                                    </div>
                                    <hr>
                                    <h4 class="h4-responsive d-inline text-success"> Description</h4>
                                    <h5 class="">{{ $projet->description }} </h5>
                                    <hr>

                                    <a href="#" data-toggle="modal" data-target="#modalSubscription" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i>  Créer Module</a>
                                    <a href="{{ route('projet.edit',['id' => $projet->id]) }}" class="btn btn-default"><i class="fa fa-edit" aria-hidden="true"></i>  Modifier ce projet</a>

                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <ul class="nav nav-tabs md-pills pills-primary flex-column" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#panel21" role="tab">L'équipe</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#panel22" role="tab">Modules </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#panel23" role="tab">Tâches </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-8 col-sm-8">
                                            <!-- Tab panels -->
                                            <div class="tab-content vertical">
                                                <!--Panel 1-->
                                                <div class="tab-pane fade in show active" id="panel21" role="tabpanel">

                                                    <p>

                                                    <ul class="list-group equipe-list">

                                                        @foreach(\App\Equipe_user::where('id_equipe','=',$projet->id_equipe)->get() as $e)
                                                            <li class="list-group-item">

                                                                {{ \App\User::where('id','=',$e->id_user)->first()->name }}
                                                            </li>

                                                        @endforeach

                                                    </ul>


                                                    </p>
                                                </div>
                                                <!--/.Panel equipe-->
                                                <!--Panel Modules-->
                                                <div class="tab-pane fade" id="panel22" role="tabpanel">

                                                    <p>
                                                    <div class="list-group equipe-list">

                                                        @foreach($module as $m)
                                                            <a href="{{ route('modules.show',['id'=>$m->id]) }}" class="list-group-item  justify-content-between @if ( $m->statut_module ==0) list-group-item-success  @endif">
                                                                {{ $m->designation }}
                                                                <span class="badge badge-primary badge-pill">{{ $m->nbr_points }}</span>

                                                            </a>



                                                        @endforeach
                                                                </div>
                                                    </p>
                                                </div>
                                                <!--/.Panel 2-->
                                                <!--Panel 3-->
                                                <div class="tab-pane fade" id="panel23" role="tabpanel">
                                                    <br>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus reiciendis molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro voluptate odit minima.</p>
                                                </div>
                                                <!--/.Panel 3-->
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <p>les documents </p>
                            @foreach($document as $d)
                                @if(strtoupper($d->type_doc)=="JPEG"||strtoupper($d->type_doc)=="PNG"||strtoupper($d->type_doc)=="GIF"||strtoupper($d->type_doc)=="JPG")
                                    <img src="/storage/fichiersProjet/{{ $d->url_doc }}">
                                @else
                                    <a target="_blank" href="/storage/fichiersProjet/{{ $d->url_doc }}"> {{ $d->nom_doc }}</a>
                                @endif
                            @endforeach
                            <br>
                            <!--<a href="/projet/modules/create/{{ $projet->id }}"> Ajouter un module</a>-->



                        </div>

                    </div>





                </div>
            </div>
        </div>

    </section>


    <!--Modal: Add module-->
    <div class="modal fade" id="modalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Header-->
                <div class="modal-header success-color darken-3 white-text">
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="title">Créer Module</h4>
                </div>
                <!--Body-->
                <div class="modal-body mb-0">

                    {!! Form::open(array('route' => 'modules.store', 'method' => 'POST')) !!}

                    <div class="md-form">
                        {!! Form::label('designation', 'Designation:') !!}
                        {!! Form::text('designation') !!}
                    </div>

                    <input type="hidden" value="0" name="nbr_points">

                        <input value="0" type="hidden" name="avancement">

                        <input type="hidden" value="1" name="statut_module">

                    <input type="hidden" value="{{ $projet->id }}" name="id_projet">

                    <div class="md-form">
                        <div class="text-center mt-1-half">
                            <button class="btn btn-success mb-1">Créer <i class="fa fa-check ml-1"></i></button>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Add module-->


@endsection