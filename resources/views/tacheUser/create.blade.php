{!! Form::open(array('route' => 'tacheUser.store', 'method' => 'POST')) !!}
<ul>
    <li>
        {!! Form::label('name', ' nom:') !!}
        {!! Form::text('name') !!}
    </li>
    <input type="hidden"value="{{ \Illuminate\Support\Facades\Auth::user()->id }}" name="id_user">

    <li>
        {{ Form::token() }}
        {!! Form::submit() !!}
    </li>

</ul>
{!! Form::close() !!}
