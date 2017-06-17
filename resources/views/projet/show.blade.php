@extends('layout')

@section('page-title')

    Projet - {{ $projet->nomProjet }}

@endsection

@section('title')

    Projet - {{ $projet->nomProjet }}

@endsection
@section('content')

    <section class="section">
        <h1 class="section-heading">{{ $projet->nomProjet }}</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">

                    <h2 class="h2-responsive d-inline text-success"> Description</h2>
                    <h5 class="">{{ $projet->description }} </h5>
                    <hr>
                    <h2 class="h2-responsive d-inline text-success"> <i class="fa fa-money"></i> Budget :</h2>
                    <h4 class="d-inline ">{{ $projet->budget }} </h4>
                    <hr>
                    <h2 class="h2-responsive d-inline text-success"> <i class="fa fa-calendar-check-o"></i> Date :</h2>
                    <h4 class="d-inline "> De {{ $projet->date_debut }} à  {{ $projet->date_fin }}</h4>
                    <hr>
                    <h2 class="h2-responsive d-inline text-success"> <i class="fa fa-location-arrow"></i> Lieu :</h2>
                    <h4 class="d-inline "> {{ $projet->lieu }} </h4>
                    <hr>
                    <h2 class="h2-responsive d-inline text-success"> <i class="fa fa-user"></i> Chef de projet :</h2>
                    <h4 class="d-inline "> {{ \App\User::where('id','=',$projet->id_user)->first()->name }} </h4>
                    <hr>
                    <h2 class="h2-responsive d-inline text-success"> <i class="fa fa-cog"></i> Service :</h2>
                    <h4 class="d-inline "> {{ \App\Service::where('id','=',$projet->id_service)->first()->nom_service }} </h4>
                    <hr>

    {{ $projet->etat}} <br>
                        <p>les documents </p>
                        @foreach($document as $d)
                            @if(strtoupper($d->type_doc)=="JPEG"||strtoupper($d->type_doc)=="PNG"||strtoupper($d->type_doc)=="GIF"||strtoupper($d->type_doc)=="JPG")
                                <img src="/storage/fichiersProjet/{{ $d->url_doc }}">
                            @else
                                <a target="_blank" href="/storage/fichiersProjet/{{ $d->url_doc }}"> {{ $d->nom_doc }}</a>
                            @endif
                                @endforeach
                        <br><a href="/projet/modules/create/{{ $projet->id }}"> Ajouter un module</a>
                        <table style="border: 1px solid">
                            <tr>
                                <th  style="border:1px solid">Designation </th>
                                <th  style="border:1px solid">Nbr Points </th>
                                <th  style="border:1px solid">Avancement </th>
                                <th  style="border:1px solid">Statut module </th>
                                <th  style="border:1px solid">Modifier </th>

                            </tr>
                            @foreach($module as $m)
                            <tr>
                                <td style="border:1px solid"> <a href="{{ route('modules.show',['id'=>$m->id]) }}"> {{ $m->designation }} </a></td>
                                <td style="border:1px solid">{{ $m->nbr_points }}</td>
                                <td style="border:1px solid">{{ $m->avancement }}%</td>
                                <td style="border:1px solid">@if ( $m->statut_module ==1) en cours
                                                                 @else Terminé
                                                                 @endif

                                </td>
                                <td style="border:1px solid"><a href="{{ route('modules.edit',['id'=>$m->id]) }}"> Modifier</a></td>


                            </tr>
                            @endforeach

                        </table>





                </div>
            </div>
        </div>

    </section>
@endsection