{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('matricule', 'Matricule:') !!}
			{!! Form::text('matricule') !!}
		</li>
		<li>
			{!! Form::label('nom', 'Nom:') !!}
			{!! Form::text('nom') !!}
		</li>
		<li>
			{!! Form::label('prenom', 'Prenom:') !!}
			{!! Form::text('prenom') !!}
		</li>
		<li>
			{!! Form::label('password', 'Password:') !!}
			{!! Form::text('password') !!}
		</li>
		<li>
			{!! Form::label('role', 'Role:') !!}
			{!! Form::text('role') !!}
		</li>
		<li>
			{!! Form::label('statut', 'Statut:') !!}
			{!! Form::text('statut') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}