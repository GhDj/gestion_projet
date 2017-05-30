{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
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
			{!! Form::label('id_projet', 'Id_projet:') !!}
			{!! Form::text('id_projet') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}