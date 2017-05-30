{!! Form::open(array('route' => 'consommable.store', 'method' => 'POST')) !!}
<ul>
    <li>
        {!! Form::label('nom', 'Nom:') !!}
        {!! Form::text('nom') !!}
    </li>
    <li>
        {!! Form::label('quantite_estime', 'Quantite_estime:') !!}
        {!! Form::text('quantite_estime') !!}
    </li>
    <li>
        {!! Form::submit() !!}
    </li>
</ul>
{!! Form::close() !!}