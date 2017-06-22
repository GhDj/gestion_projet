@extends('layout')


@section('page-title')

    Projet - Ajouter

@endsection

@section('title')

    Projet - Ajouter

@endsection

@section('header-script')

    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

@endsection

@section('content')
    <section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">


                <div class="card">

                    <div class="card-block">
                        <!--Header-->
                        <div class="form-header bg-primary col-sm-6">
                            <h3>{{ $module->designation }}</h3>
                        </div>
                        <?php
                        $totale = \App\Tache::where('id_module','=',$module->id)->count();
                        $done = \App\Tache::where([
                                ['id_module','=',$module->id],
                                ['statut_tache','=',1]
                        ])->count();
                            if ($totale == 0)
                                {
                                    $avancement = 0;
                                }
                                else
                                    {

                                        $avancement = ($done/$totale)*100;
                                    }
                        ?>
                        <h3>Nombre des tâches : {{ $totale }}</h3>
<h3>Avancement :</h3>


                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $avancement }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

<br>
 <!--   <a href="/projet/modules/tache/create/{{ $module->id }}"> Ajouter tache</a>-->
                        <h3>Liste des taches</h3>

                        <div class="list-group equipe-list">
                            @foreach($tache as $t)

                        <div class="list-group-item  justify-content-between @if ( $t->statut_tache == 0) list-group-item-success  @endif">
                            <a href="{{ route('tache.show',['id'=>$t->id]) }}"  class="">{{ $t->nomTache }}</a>
                            <a href="#"> {{ \App\User::where('id','=',\App\TacheUser::where('id_tache','=',$t->id)->first()->id_user)->first()->name }} </a>
                        </div>




                            @endforeach
                        </div>

                         @foreach($tache as $t)



                                <a href="/projet/modules/tache/materiel/create/{{$t->id}}"> Ajouter materiel</a>



                        @endforeach

                    </div>

                </div>


            </div>
        </div>

    </div>
    </section>
@endsection