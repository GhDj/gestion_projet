
@foreach( $materiel as $m)
    {{ $m->nom_materiel }}  <a href="{{ route('materiel.show',['id'=>$m->id])  }}"> Afficher </a> <br>
@endforeach