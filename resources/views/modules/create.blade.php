<style>
    input[type="range"] { position: relative; margin-left: 1em; } input[type="range"]:after, input[type="range"]:before { position: absolute; top: 1em; color: #aaa; } input[type="range"]:before { left:0em; content: attr(min); } input[type="range"]:after { right: 0em; content: attr(max); }



</style>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ajouter un module</div>

                    <div class="panel-body">
{!! Form::open(array('route' => 'modules.store', 'method' => 'POST')) !!}
<ul>
    <li>
        {!! Form::label('designation', 'Designation:') !!}
        {!! Form::text('designation') !!}
    </li>
    <li>
        {!! Form::label('nbr_points', 'Nbr_points:') !!}
        {!! Form::text('nbr_points') !!}
    </li>
    <li>
        {!! Form::label('avancement', 'Avancement:') !!}
<input type="range" name="avancement" min="0" max="100" required oninput="outputUpdate(value)">
        <output for="fader" id="volume">50</output>

    </li>
    <br>
    <li>
        <input type="hidden" value="1" name="statut_module">
    </li>
    <input type="hidden" value="{{ $projet->id }}" name="id_projet">

    <li>
        {!! Form::submit() !!}
    </li>
</ul>
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