{!! Form::open(array('route' => 'reunion.store', 'method' => 'POST')) !!}
<ul>
    <li>
        {!! Form::label('designation', 'Designation:') !!}
        {!! Form::text('designation') !!}
    </li>
    <li>
        {!! Form::label('nbr_present', 'Nbr_present:') !!}
        {!! Form::text('nbr_present') !!}
    </li>
    <li>
        {!! Form::label('code_afaire', 'Code_afaire:') !!}
        {!! Form::text('code_afaire') !!}
    </li>
    <li>
        {!! Form::label('type', 'Type:') !!}
        {!! Form::text('type') !!}
    </li>
    <li>
        {!! Form::label('Emplacement', 'Emplacement:') !!}
        {!! Form::text('Emplacement') !!}
    </li> <li>
        {!! Form::label('dateReunion', 'dateReunion:') !!}
        {!! Form::text('dateReunion') !!}
    </li>
    <li>
        {!! Form::label('timeReunion', 'timeReunion:') !!}
        {!! Form::text('timeReunion') !!}
    </li>
    <li>
        <select name="id_projet">
            @foreach( $projet as $p)
                <option value="{{ $p->id }}"> {{ $p->nomProjet }} </option>
            @endforeach
        </select>
    </li>
    <li>
        {!! Form::submit() !!}
    </li>
</ul>
{!! Form::close() !!}