{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('nom_doc', 'Nom_doc:') !!}
			{!! Form::text('nom_doc') !!}
		</li>
		<li>
			{!! Form::label('type_doc', 'Type_doc:') !!}
			{!! Form::text('type_doc') !!}
		</li>
		<li>
			{!! Form::label('url_doc', 'Url_doc:') !!}
			{!! Form::text('url_doc') !!}
		</li>
		<li>
			{!! Form::label('date_edition', 'Date_edition:') !!}
			{!! Form::text('date_edition') !!}
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