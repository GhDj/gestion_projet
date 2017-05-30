@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Creation d'un projet </div>
                    <div class="panel-body">


{!! Form::open(array('route' => 'projet.store', 'method' => 'POST', 'enctype'=>'multipart/form-data')) !!}
<ul>
    <li>
        {!! Form::label('nomProjet', 'NomProjet:') !!}
        {!! Form::text('nomProjet') !!}
    </li>
    <li>
        {!! Form::label('description', 'Description:') !!}
        {!! Form::text('description') !!}
    </li>
    <input type="hidden" value="1" name="etat">
    <li>
        {!! Form::label('budget', 'Budget:') !!}
        {!! Form::text('budget') !!}
    </li>
    <li>
        {!! Form::label('date_debut', 'Date_debut:') !!}
        {!! Form::text('date_debut') !!}
    </li>
    <li>
        {!! Form::label('date_fin', 'Date_fin:') !!}
        {!! Form::text('date_fin') !!}
    </li>

    <li>
        {!! Form::label('lieu', 'Lieu:') !!}
        {!! Form::text('lieu') !!}
    </li>

      <input type="hidden" name="id_user" value="{{\Illuminate\Support\Facades\Auth::user()->id }}">
<label> Equipe :</label>
    <select name="id_equipe">
        @foreach($equipe as $e)
            <option value="{{ $e->id }}">{{ $e->name }} </option>
        @endforeach

    </select>

    <label> Service: </label>
  <select name="id_service">
     @foreach($service as $s)
        <option value="{{ $s->id }}">{{ $s->nom_service }} </option>
      @endforeach

  </select><br>
    <label> Ajouter fichier: </label>
   {!! Form::file('fichier[]',['multiple'=>true]) !!}

    <li>
        {!! Form::token() !!}
        {!! Form::submit() !!}
    </li>

</ul>
{!! Form::close() !!}

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