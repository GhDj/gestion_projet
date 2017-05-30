@foreach($notification as $n)
   @if( $n->type=='reunion')
    <a href="/reunion/{{ $n->idType }}"> Afficher REunion</a>
   {{ $n->type }} --- {{ $n->lu }}
    @endif
    @endforeach