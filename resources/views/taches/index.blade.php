{!! Form::open(array('url' => 'rechercheTache', 'method' => 'POST')) !!}

<input type="text" name="recherche">
{{ Form::submit() }}
{{ Form::close() }}

@foreach( $taches as $t)
    {{ $t->nomTache }}  <a href="{{ route('tache.show',['id'=>$t->id])  }}"> Afficher </a> <br>
@endforeach

