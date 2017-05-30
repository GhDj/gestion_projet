@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    {!! Form::open(array('url' => 'rechercheProjet', 'method' => 'POST')) !!}

                            <input type="text" name="recherche">
                    {{ Form::submit() }}
                    {{ Form::close() }}

                    <div class="panel-heading">Liste des Projets</div>

                        <div class="panel-body">
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
                        </div>
                    {{ $projet->render() }}

                </div>
            </div>
        </div>
    </div>

@endsection