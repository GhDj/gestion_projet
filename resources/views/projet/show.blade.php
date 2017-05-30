@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> liste des servieces : </div>
                    <div class="panel-body">
 
    {{ $projet->nomProjet }} <br>
    {{ $projet->Description }} <br>
    {{ $projet->budget }} <br>
    {{ $projet->date_debut }} <br>
    {{ $projet->date_fin }} <br>
    {{ $projet->lieu }} <br>
    {{ $projet->id_user}} <br>
    {{ $projet->id_service}} <br>
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
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection