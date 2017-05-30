
    @foreach($user as $u)
        @foreach($equipeuser as $e)

            @if ($e->id_user==$u->id and $e->id_equipe==$id)
            <li> Membre: {{ $u->name }}</li>
            @endif

@endforeach
@endforeach



{!! Form::open(array('route' => 'equipeUser.store', 'method' => 'POST')) !!}



<select name="id_user">
@foreach($user as $u1)
        <option value="{{ $u1->id }}">{{ $u1->name}}</option>

    @endforeach
</select>
<input type="hidden" name="id_equipe" value="{{ $id }}">

{!! Form::submit() !!}
    @if (count($errors) > 0) <div class="alert alert-danger"> <ul>
            @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
        </ul> </div> @endif
{!! Form::close() !!}