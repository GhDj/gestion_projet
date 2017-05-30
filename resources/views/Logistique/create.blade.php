{!! Form::open(array('route' => 'logistique.store', 'method' => 'POST')) !!}
<ul>
    <li>
        {!! Form::label('description_logistique', 'description_logistique:') !!}
        {!! Form::text('description_logistique') !!}
    </li>
    <li>
        <input type="hidden" value="{{ $tache->id }}" name="id_tache">
    </li>
    <li>
        {!! Form::submit() !!}
    </li>
</ul>
{!! Form::close() !!}