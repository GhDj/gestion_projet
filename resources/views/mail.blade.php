{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('objet', 'Objet:') !!}
			{!! Form::text('objet') !!}
		</li>
		<li>
			{!! Form::label('contenu', 'Contenu:') !!}
			{!! Form::text('contenu') !!}
		</li>
		<li>
			{!! Form::label('date_envoie', 'Date_envoie:') !!}
			{!! Form::text('date_envoie') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}