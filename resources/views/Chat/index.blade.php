{!! Form::open(array('url' => 'rechercheUser', 'method' => 'POST')) !!}

<input type="text" name="recherche">
{{ Form::submit() }}
{{ Form::close() }}


@foreach($liste as $l)

     <a href="/discussion/{{$l}}">   {{ \App\User::findOrFail($l)->name }}</a>


        @endforeach