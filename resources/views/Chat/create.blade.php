{!! Form::open(array('route' => 'chat.store', 'method' => 'POST')) !!}
<ul>

    <select name="recepteur">
@foreach($user as $u)
        <option value="{{ $u->id }}"> {{ $u->name }}</option>
@endforeach
    </select>
    <li>
        {!! Form::label('contenu', 'Contenu:') !!}
        {!! Form::text('contenu') !!}
    </li>
<input type="hidden" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}" name="emetteur">
    <li>
        {!! Form::submit() !!}
    </li>
</ul>
{!! Form::close() !!}