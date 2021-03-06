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


                                    <a href="#" data-toggle="modal" data-target="#centralModalSuccess" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i>  Créer Tâche</a>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <ul class="nav nav-tabs md-pills pills-ins" role="tablist">
                                                <li class="nav-item col-sm-4">
                                                    <a class="nav-link active" data-toggle="tab" href="#panel21" role="tab">L'équipe</a>
                                                </li>
                                                <li class="nav-item col-sm-4">
                                                    <a class="nav-link" data-toggle="tab" href="#panel22" role="tab">Modules </a>
                                                </li>
                                                <li class="nav-item col-sm-4">
                                                    <a class="nav-link" data-toggle="tab" href="#panel23" role="tab">Tâches </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
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
                                                            <a href="{{ route('modules.show',['id'=>$m->id]) }}" class="list-group-item  justify-content-between @if ( $m->statut_module == 1) list-group-item-success  @endif">
                                                                {{ $m->designation }}
                                                                <span class="badge badge-primary badge-pill">
                                                                    {{ \App\Tache::where('id_module','=',$m->id)->count() }}
                                                                </span>

                                                            </a>



                                                        @endforeach
                                                                </div>
                                                    </p>
                                                </div>
                                                <!--/.Panel 2-->
                                                <!--Panel 3-->
                                                <div class="tab-pane fade" id="panel23" role="tabpanel">

                                                    <p>
                                                    <div class="list-group equipe-list">
                                                        @foreach($module as $mm)

                                                            @foreach(\App\Tache::where('id_module','=',$mm->id)->get() as $t)

                                                                <a href="{{ route('tache.show',['id'=>$t->id]) }}"  class="list-group-item  justify-content-between @if ( $t->statut_tache == 0) list-group-item-success  @endif">{{ $t->nomTache }}</a>

                                                            @endforeach

                                                        @endforeach
                                                    </div>
                                                    </p>
                                                </div>
                                                <!--/.Panel 3-->
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-4">
                                   <div class="container">
                                       <?php $totale_tache = 0;
                                       $tache_finis = 0;
                                       ?>
                                       @foreach(\App\Modules::where('id_projet','=',$projet->id)->get() as $md)

                                           <?php $totale_tache += \App\Tache::where('id_module','=',$md->id)->count();
                                           $tache_finis += \App\Tache::where([
                                                   ['id_module','=',$md->id],
                                                   ['statut_tache','=','1']
                                           ])->count();
                                           ?>

                                       @endforeach

                                       <h3 class="h3-responsive pull-left bold">Tâches </h3>
                                       <span class="pull-right grey-text">{{ $tache_finis }}/{{ $totale_tache }}</span>
                                       <div class="progress ">
                                           @if($totale_tache == 0)
                                               <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                           @else
                                               <div class="progress-bar bg-success" role="progressbar" style="width: {{ $tache_finis*100/$totale_tache }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                           @endif


                                       </div>

                                   </div>
                                    <br>
                                       <div class="container">
                                           <?php $totale_modules = 0;
                                           $modules_finis = 0;
                                           ?>
                                           @foreach(\App\Modules::where('id_projet','=',$projet->id)->get() as $md)

                                               <?php
                                               $i = 0;
                                               ?>
                                               @foreach(\App\Tache::where('id_module','=',$md->id)->get() as $ta)
                                                   <?php
                                                   $i++;
                                                   ?>
                                                   @if(($ta->statut_tache == 1) AND ($i==\App\Tache::where('id_module','=',$md->id)->count()))

                                                       <?php
                                                       $modules_finis++;
                                                       ?>
                                                   @endif

                                               @endforeach

                                               <?php

                                               $totale_modules++;
                                               ?>

                                           @endforeach


                                           <h3 class="h3-responsive pull-left bold">Modules </h3>
                                           <span class="pull-right grey-text">{{ $modules_finis }}/{{ $totale_modules }}</span>
                                           <div class="progress">
                                               @if($totale_modules == 0)
                                                   <div class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                               @else
                                                   <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $modules_finis*100/$totale_modules }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                               @endif


                                           </div>

                                       </div>
                                    <br>
                                    <div class="container">
                                        <?php  $dt=\Carbon\Carbon::createFromFormat('d m Y',$projet->date_debut);
                                        $df=\Carbon\Carbon::createFromFormat('d m Y',$projet->date_fin);
                                        $difference = $dt->diffInDays($df);
                                        $reste = $df->diffInDays(\Carbon\Carbon::now());
                                       // echo $difference."****".$reste;
                                        ?>
                                            <h3 class="h3-responsive pull-left bold">Jours </h3>
                                            <span class="pull-right grey-text">{{ $difference-$reste }}/{{ $difference }}</span>
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ ($difference-$reste)*100/$difference }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                    </div>
                                    <br>
                                    <div class="container">
                                        <h3 class="h3-responsive">Documents</h3>
                                        <div class="list-group equipe-list">
                                        @foreach($document as $d)
                                            @if(strtoupper($d->type_doc)=="JPEG"||strtoupper($d->type_doc)=="PNG"||strtoupper($d->type_doc)=="GIF"||strtoupper($d->type_doc)=="JPG")
                                                    <a href="#" class="list-group-item  justify-content-between "> <img src="/storage/fichiersProjet/{{ $d->url_doc }}"> </a>
                                            @else
                                                <a target="_blank" href="/storage/fichiersProjet/{{ $d->url_doc }}" class="list-group-item  justify-content-between" > {{ $d->nom_doc }}</a>
                                            @endif
                                        @endforeach
                                            </div>

                                    </div>

                                </div>

                            </div>


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




    <!-- Modal tâche -->
    <div class="modal fade right" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-success modal-full-height modal-right" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Ajouter tâche</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fa fa-check fa-4x mb-1 animated rotateIn"></i>
                        <p>
                        {!! Form::open(array('route' => 'tache.store', 'method' => 'POST')) !!}

                        <div class="md-form">
                            <select name="id_module" class="mdb-select">
                                <option disabled selected>Choisir module</option>
                                @foreach($module as $m)
                                    <option value="{{ $m->id }}">{{ $m->designation }}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="md-form">
                            {!! Form::label('nomTache', 'Intitulé ') !!}
                            {!! Form::text('nomTache') !!}
                        </div>
                        <div class="md-form">
                            {!! Form::label('description_tache', 'Description') !!}
                            <textarea name="description_tache" id="description_tache" class="md-textarea"></textarea>
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



                        <div class="md-form">
                            {!! Form::label('cout', 'Cout:') !!}
                            {!! Form::number('cout',null,['required']) !!}
                        </div>

                        <div class="md-form">
                            <select name="id_user" id="id_user" class="mdb-select">
                                <option disabled selected>Choisir employé</option>
                                @foreach(\App\Equipe_user::where('id_equipe','=',$projet->id_equipe)->get() as $e)
                                    <option value="{{ $e->id_user }}">{{ \App\User::where('id','=',$e->id_user)->first()->name }}</option>

                                @endforeach
                            </select>
                        </div>



                        {!! Form::token() !!}




                        </p>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                   <!-- <a type="button" class="btn btn-primary-modal"><i class="fa fa-check ml-1"></i> Ajouter </a>-->
                    <button type="submit" class="btn btn-primary-modal pull-right"><i class="fa fa-check"></i> Ajouter</button>
                    <a type="button" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">Annuler</a>
                </div>

                {!! Form::close() !!}
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Modal tâche-->




@endsection