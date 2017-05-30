{!! Form::open(array('route' => 'materiel.store', 'method' => 'POST')) !!}
<ul>
    <li>
        {!! Form::label('nom_materiel', 'nom_materiel:') !!}
        {!! Form::text('nom_materiel') !!}
    </li>
    <li>
        <input type="hidden" value="{{ $tache->id }}" name="id_tache">
    </li>
    <li>
        {!! Form::submit() !!}
    </li>
</ul>
{!! Form::close() !!}