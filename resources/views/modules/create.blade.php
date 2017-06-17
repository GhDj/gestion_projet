
@extends('layout')

@section('content')
    <style>


    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ajouter un module</div>

                    <div class="panel-body">
{!! Form::open(array('route' => 'modules.store', 'method' => 'POST')) !!}

    <div class="md-form">
        {!! Form::label('designation', 'Designation:') !!}
        {!! Form::text('designation') !!}
    </div>
    <div class="md-form">
        {!! Form::label('nbr_points', 'Nbr_points:') !!}
        {!! Form::text('nbr_points') !!}
    </div>
    <div class="md-form">
        {!! Form::label('avancement', 'Avancement:') !!}
    <input value="0" type="range" name="avancement" min="0" max="100" required>


    </div>

    <div class="md-form">
        <input type="hidden" value="1" name="statut_module">
    </div>
    <input type="hidden" value="{{ $projet->id }}" name="id_projet">

    <div class="md-form">
        {!! Form::submit() !!}
    </div>

{!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
<script>
    function outputUpdate(vol) { document.querySelector('#volume').value = vol; }
</script>
@endsection