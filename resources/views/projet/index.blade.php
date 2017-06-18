@extends('layout')

@section('page-title')

    Projets

@endsection

@section('title')

    Projets


@endsection
@section('content')

    <section class="section">
        <h1 class="section-heading">Liste des projets</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                {!! Form::open(array('url' => 'rechercheProjet', 'method' => 'POST')) !!}

                            <input type="text" name="recherche">
                    {{ Form::submit() }}
                    {{ Form::close() }}

                    <div class="row">

                        @foreach($projet as $p)

                            <div class="col-sm-6">
                                <div class="projet-item @if($p->etat == 0) projet-encours @else projet-cloture @endif">
                                    <a href="{{ route('projet.show',['id'=>$p->id]) }}"><h3 class="h3-responsive">{{ $p->nomProjet }}</h3></a>
                                    <div class="d-flex justify-content-between">
                                        <h5 class="h5-responsive d-inline">Equipe : {{ \App\Equipe::where('id','=',$p->id_equipe)->first()->name }}</h5>
                                        <h5 class="h5-responsive d-inline">Modules : {{ \App\Modules::where('id_projet','=',$p->id)->count() }}</h5>
                                        <h5 class="h5-responsive d-inline">Etat : @if($p->etat == 1) En cours @else Cloturé @endif</h5>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                    <!--
                            <table style="border: 1px solid">
                                <tr>
                                    <th  style="border:1px solid">Nom projet </th>
                                    <th  style="border:1px solid">Description </th>
                                    <th  style="border:1px solid">budget </th>
                                    <th  style="border:1px solid">date debut </th>
                                    <th  style="border:1px solid">date fin </th>
                                    <th  style="border:1px solid">Lieu </th>
                                    <th  style="border:1px solid">Type </th>


                                    <th style="border:1px solid"> Etat </th>
                                    <th style="border:1px solid"> Modifier </th>
                                    <th style="border:1px solid" > Supprimer </th>
                                </tr>
                                @foreach ($projet as $p)
                                <tr>
                                    <td style="border:1px solid"> <a target="_blank" href="/projet/{{ $p->id }}">{{ $p->nomProjet }}</a></td>
                                    <td style="border:1px solid">{{ $p->description }}</td>
                                    <td style="border:1px solid">{{ $p->budget }}</td>

                                    <td style="border:1px solid">{{ $p->date_debut }}</td>
                                    <td style="border:1px solid">{{ $p->date_fin }}</td>
                                    <td style="border:1px solid">{{ $p->lieu }}</td>
                                    <td style="border:1px solid">{{ $p->type }}</td>

                                    <td style="border:1px solid">  @if ( $p->etat==0) cloturé
                                        @else en cours
                                        @endif

                                    </td>
                                    <td style="border:1px solid">  <a href="{{ route('projet.edit',$p->id) }}">Modifier</a></td>
                                    <td style="border:1px solid">   {!! Form::open(array('route' =>['projet.destroy',$p->id ] , 'method' => 'DELETE','autocomplete'=>'off')) !!}
                                        <button id="submit" type="submit" class="btn red" name="submit" required value="Suppirmer utulisateur">Supprimer</button>
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                                @endforeach
                            </table>
-->
                    {{ $projet->render() }}

                </div>
            </div>
        </div>

    </section>

    @endsection