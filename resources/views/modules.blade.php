{!! Form::open(array('route' => 'modules.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('designation', 'Designation:') !!}
			{!! Form::text('designation') !!}
		</li>
		<li>
			{!! Form::label('nbr_points', 'Nbr_points:') !!}
			{!! Form::text('nbr_points') !!}
		</li>
		<li>
			{!! Form::label('avancement', 'Avancement:') !!}
			{!! Form::text('avancement') !!}
		</li>
		<li>
			{!! Form::label('statut_module', 'Statut_module:') !!}
			{!! Form::text('statut_module') !!}
		</li>
		<li>
			{!! Form::label('id_projet', 'Id_projet:') !!}
			{!! Form::text('id_projet') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}