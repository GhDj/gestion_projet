@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> liste des servieces : </div>


@foreach($service as $s)
                        <div class="panel-body">
                            <table style="border: 1px solid">
                                <tr>
                                    <th  style="border:1px solid">Nom Service </th>
                                    <th style="border:1px solid"> Chef de service </th>
                                    <th style="border:1px solid"> Modifier </th>
                                    <th style="border:1px solid" > Supprimer </th>
                                </tr>
                                <tr>
                                    <td style="border:1px solid">{{ $s->nom_service }}</td>
                                    <td style="border:1px solid">  {{ $s->chef_service }}

                                    </td>
                                    <td style="border:1px solid">   <a href="{{ route('service.edit',$s->id) }}">Modifier</a></td>
                                    <td style="border:1px solid">  {!! Form::open(array('route' =>['service.destroy',$s->id ] , 'method' => 'DELETE','autocomplete'=>'off')) !!}

                                        <button id="submit" type="submit" class="btn red" name="submit" required value="Suppirmer utulisateur">Supprimer</button>{!! Form::close() !!}

                                    </td>
                                </tr>

                            </table>



    <br>
    @endforeach

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