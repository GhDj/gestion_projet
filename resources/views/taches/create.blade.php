{!! Form::open(array('route' => 'tache.store', 'method' => 'POST')) !!}
<ul>
    <li>
        {!! Form::label('nomTache', 'NomTache:') !!}
        {!! Form::text('nomTache') !!}
    </li>
    <li>
        {!! Form::label('description_tache', 'Description_tache:') !!}
        {!! Form::text('description_tache') !!}
    </li>
    <li>
        {!! Form::label('duree', 'Duree:') !!}
        {!! Form::text('duree') !!}
    </li>
    <li>
        {!! Form::label('statut_tache', 'Statut_tache:') !!}
        {!! Form::text('statut_tache') !!}
    </li>
    <li>
        {!! Form::label('date_debut_tache', 'Date_debut_tache:') !!}
        {!! Form::text('date_debut_tache') !!}
    </li>
    <li>
        {!! Form::label('date_fin_tache', 'Date_fin_tache:') !!}
        {!! Form::text('date_fin_tache') !!}
    </li>
    <li>
        {!! Form::label('priorite', 'priorite:') !!}
        {!! Form::text('priorite') !!}
    </li>


        <input type="hidden" value="1" name="statut_tache">

    <input type="hidden" value="{{ $module->id }}" name="id_module">


    <li>
        {!! Form::label('cout', 'cout:') !!}
        {!! Form::text('cout') !!}
    </li>

    <label> Choisir une equipe</label>
    <select name="id_equipe">
        @foreach($equipe as $e)
            <option value="{{ $e->id }}">{{ $e->name}}</option>

        @endforeach
    </select>



    {!! Form::token() !!}
</ul>
<input id="submit" type="submit" class="form-control" name="submit" required>

{!! Form::close() !!}