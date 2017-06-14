@extends('layout')

@section('title','Réunion - Planifier')

@section('page-title','Réunion - Planifier')

@section('content')

    <section class="section">
        <h1 class="section-heading">Planifier Réunion</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    {!! Form::open(array('route' => 'reunion.store', 'method' => 'POST')) !!}

                        <div class="md-form">
                            {!! Form::label('designation', 'Designation :') !!}
                            {!! Form::text('designation') !!}
                        </div>
                        <div class="md-form">
                            {!! Form::label('nbr_present', 'Nombre des présents:') !!}
                            {!! Form::text('nbr_present') !!}
                        </div>
                        <div class="md-form">
                            {!! Form::label('code_afaire', 'Code Afaire:') !!}
                            {!! Form::text('code_afaire') !!}
                        </div>
                        <div class="md-form">
                            {!! Form::label('type', 'Type :') !!}
                            {!! Form::text('type') !!}
                        </div>
                        <div class="md-form">
                            {!! Form::label('Emplacement', 'Emplacement :') !!}
                            {!! Form::text('Emplacement') !!}
                        </div>

                    <div class="md-form">
                            {!! Form::label('dateReunion', 'Date :') !!}
                        {!! Form::text('dateReunion',null,['class'=>'form-control datepicker']) !!}

                        </div>


                        <div class="md-form">
                            {!! Form::label('timeReunion', 'Heure :') !!}
                            <input type="text" id="timeReunion" class="form-control timepicker" name="timeReunion">
                        </div>


                        <div class="md-form">
                            <select name="id_projet"  class="mdb-select">
                                <option disabled selected>Choisir le projet</option>
                                @foreach( $projet as $p)
                                    <option value="{{ $p->id }}"> {{ $p->nomProjet }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md-form">
                            <button class="btn btn-success pull-right" type="submit">Planifier</button>
                        </div>

                    {!! Form::close() !!}
                    
                    
                </div>
            </div>
        </div>

    </section>

@endsection

@section('script')
    $(document).ready(function() {
    $('.mdb-select').material_select();
    });

    $('#timeReunion').pickatime({
     twelvehour: false
    });
@endsection

