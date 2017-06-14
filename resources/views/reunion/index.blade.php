@extends('layout')

@section('title','Réunions')

@section('page-title','Réunions')

@section('content')


    <section class="section">
        <h1 class="section-heading">Liste des Réunions</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Code d'affire</th>
                            <th>Empalcement</th>
                            <th> Date </th>
                            <th> Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($reunion as $s)

                            <tr>
                                <td>{{ $s->id }}</td>
                                <td>{{ $s->code_afaire }}</td>
                                <td>{{ $s->Emplacement }}</td>
                                <td>
                                    <?php
                                        \Carbon\Carbon::setLocale('fr')
                                    ?>
                                    {{ $s->dateReunion }}

                                </td>
                                <td>   <a href="{{ route('reunion.edit',$s->id) }}" class="teal-text"><i class="fa fa-pencil"></i></a>
                                    {!! Form::open(array('route' =>['reunion.destroy',$s->id ] , 'method' => 'DELETE','autocomplete'=>'off','id'=>'supp')) !!}

                                    <a type="submit" name="submit" onclick="document.getElementById('supp').submit();" class="red-text"><i class="fa fa-times"></i></a>
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>

         <a href="{{ route('reunion.create') }}" class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  Planifier réunion</a>


                </div>
            </div>
        </div>

    </section>



@endsection