
@foreach( $reunion as $r)
    {{ $r->designation }}  <a href="{{ route('reunion.show',['id'=>$r->id])  }}"> Afficher </a> <br>
@endforeach