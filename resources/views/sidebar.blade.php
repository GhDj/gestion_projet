
<ul>
    @if(Auth::check())
        @if ( Auth::user()->role==1 )

            <li>  <a href="{{ route('projet.create') }}"> <span class="glyphicon glyphicon-th-list"> Tableau de bord </span></a></li>

           <li> <a href="{{ route('projet.index') }}"> Projets</a></li>

<li>         <a href="{{ route('service.create') }}"> Rapports</a></li>

       <li>     <a href="{{ route('service.index') }}"> Diagrammes</a></li>
            <li>     <a href="{{ route('service.index') }}"> Reunions</a></li>
            <li>     <a href="{{ route('service.index') }}"> Services</a></li>

        @endif
    @endif

</ul>