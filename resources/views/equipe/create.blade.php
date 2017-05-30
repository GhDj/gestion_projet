{!! Form::open(array('route' => 'equipe.store', 'method' => 'POST')) !!}
<ul>
    <li>
        {!! Form::label('name', 'Equie nom:') !!}
        {!! Form::text('name') !!}
    </li>
<input type="hidden"value="{{ \Illuminate\Support\Facades\Auth::user()->id }}" name="id_user">

    <li>
    {{ Form::token() }}
        {!! Form::submit() !!}
    </li>

</ul>
{!! Form::close() !!}