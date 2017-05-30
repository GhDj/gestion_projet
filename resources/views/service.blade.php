{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('nom_service', 'Nom_service:') !!}
			{!! Form::text('nom_service') !!}
		</li>
		<li>
			{!! Form::label('chef_service', 'Chef_service:') !!}
			{!! Form::text('chef_service') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}