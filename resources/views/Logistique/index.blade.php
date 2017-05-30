
@foreach( $logistique as $l)
    {{ $l->description_logistique }}  <a href="{{ route('logistique.show',['id'=>$l->id])  }}"> Afficher </a> <br>
@endforeach