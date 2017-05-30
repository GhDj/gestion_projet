@foreach($u as $rech)
  <a href="user/{{ $rech->id }}">  {{ $rech->name }} </a>

@endforeach