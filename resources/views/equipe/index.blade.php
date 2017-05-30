
@foreach( $equipe as $e)
    {{ $e->name }}  <a href="{{ route('equipe.show',['id'=>$e->id])  }}"> Afficher </a> <br>
    @endforeach