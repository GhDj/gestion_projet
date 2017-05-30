{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('description_logistique', 'Description_logistique:') !!}
			{!! Form::text('description_logistique') !!}
		</li>
		<li>
			{!! Form::label('id_tache', 'Id_tache:') !!}
			{!! Form::text('id_tache') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}