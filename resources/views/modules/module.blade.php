@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        {!! Form::open(array('route' =>['modules.update',$module->id ] , 'method' => 'PATCH','autocomplete'=>'off')) !!}
                        <p>
                            <label>Designation:</label>
                            <input id="designation" type="text" class="form-control" name="designation" required value="{{ $module->designation }}">
                        </p>
                        <p>
                            <label>nbr points:</label>
                            <input id="nbr_points" type="text" class="form-control" name="nbr_points" required value="{{ $module->nbr_points }}">
                        </p>
                        <p>
                            <label>avancement:</label>
                            <input id="avancement" type="text" class="form-control" name="avancement" required value="{{ $module->avancement }}">
                        </p> <p>
                            <label>statut module:</label>
                            <label>En cours</label> <input name="statut_module" type="radio" value="1" @if($module->statut_module==1) checked @endif>

                            <label>Cloturé</label>
                            <input name="statut_module" type="radio" value="0" @if($module->statut_module==0) checked @endif>

                        </p>


                        <input id="submit" type="submit" class="form-control" name="submit" required>
                        <a href="{{ route('projet.show',['id'=>$module->id_projet]) }}" class="button">Retour</a>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection