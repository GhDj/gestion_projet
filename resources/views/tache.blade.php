{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
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
			{!! Form::label('id_module', 'Id_module:') !!}
			{!! Form::text('id_module') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}