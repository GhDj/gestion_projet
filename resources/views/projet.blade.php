{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('nomProjet', 'NomProjet:') !!}
			{!! Form::text('nomProjet') !!}
		</li>
		<li>
			{!! Form::label('description', 'Description:') !!}
			{!! Form::text('description') !!}
		</li>
		<li>
			{!! Form::label('budget', 'Budget:') !!}
			{!! Form::text('budget') !!}
		</li>
		<li>
			{!! Form::label('date_debut', 'Date_debut:') !!}
			{!! Form::text('date_debut') !!}
		</li>
		<li>
			{!! Form::label('date_fin', 'Date_fin:') !!}
			{!! Form::text('date_fin') !!}
		</li>
		<li>
			{!! Form::label('service', 'Service:') !!}
			{!! Form::text('service') !!}
		</li>
		<li>
			{!! Form::label('lieu', 'Lieu:') !!}
			{!! Form::text('lieu') !!}
		</li>
		<li>
			{!! Form::label('id_user', 'Id_user:') !!}
			{!! Form::text('id_user') !!}
		</li>
		<li>
			{!! Form::label('id_service', 'Id_service:') !!}
			{!! Form::text('id_service') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}