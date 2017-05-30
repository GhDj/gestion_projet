
@foreach( $consommable as $c)
    {{ $c->nom }}  <a href="{{ route('consommable.show',['id'=>$l->id])  }}"> Afficher </a> <br>
@endforeach