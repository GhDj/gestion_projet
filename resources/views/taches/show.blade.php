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
                            <h3>{{ $tache->nomTache }}</h3>
                        </div>





                        <div class="row">
                            <div class="col-sm-6">
                                @if($tache->id==$tacheequipe->id_tache)
                                    <p>
                                    <h4 class="h4-responsive d-inline text-success"> <i class="fa fa-user"></i> Employé affecté :</h4>
                                    <h5 class="d-inline ">  {{ \App\Equipe::where("id","=",$tacheequipe->id_user)->first()->name }} </h5>

                                    </p>
                                @endif
                                <p>
                                <h4 class="h4-responsive d-inline text-success"> <i class="fa fa-cog"></i> Module :</h4>
                                <h5 class="d-inline "> {{ \App\Modules::where('id','=',$tache->id_module)->first()->designation }} </h5>

                                </p>
                                <p>
                                <h4 class="h4-responsive d-inline text-success"> <i class="fa fa-money"></i> Cout :</h4>
                                <h5 class="d-inline ">{{ $tache->cout }} </h5>

                                </p>
                            </div>
                            <div class="col-sm-6">
                                <p>
                                <h4 class="h4-responsive text-success"> <i class="fa fa-file-text-o"></i> Description :</h4>
                                <h5 class=""> {{ $tache->description_tache }} </h5>

                                </p>
                            </div>
                        </div>



                        <div class="row">
                            <a href="#" data-toggle="modal" data-target="#modalSubscription" class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i>Ajouter Matériel</a>

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom Matériel </th>
                                    <!--<th> Chef de service </th>-->
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Materiel::where('id_tache','=',$tache->id)->get() as $m)

                                    <tr>
                                        <td>{{ $m->id }}</td>
                                        <td>{{ $m->nom_materiel }}</td>
                                     <!--   <td>
                                            <?php
                                            //$r = \App\User::where('id','=',$s->chef_service)->first();
                                            //echo $r['name'];
                                            ?>
                                        </td>-->
                                        <td><!--   <a href="{{ route('materiel.edit',$m->id) }}" class="teal-text"><i class="fa fa-pencil"></i></a>-->
                                            {!! Form::open(array('route' =>['materiel.destroy',$m->id ] , 'method' => 'DELETE','autocomplete'=>'off','id'=>'supp')) !!}

                                            <a type="submit" name="submit" onclick="document.getElementById('supp').submit();" class="red-text"><i class="fa fa-times"></i></a>
                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    @foreach($commentaire as $c)

                                <label> {{ \App\User::findOrFail($c->id_user)->name  }} : </label>


                                    <label> {{ $c->commentaire  }}</label>
                            <label>" {{ $c->created_at }} "</label>
<hr>

                                @endforeach


                        {!! Form::open(array('route' => 'commentaire.store', 'method' => 'POST')) !!}

                            <input type="text" name="commentaire" >
                        <input type="hidden" name="id_tache" value="{{ $id }}">
                        <input type="hidden" name="id_user" value="{{ \Illuminate\Support\Facades\Auth::user()->id}}">


                        {!! Form::submit() !!}


                        {!! Form::close() !!}
                    </div>
                </div>


            </div>
        </div>

    </div>

    </section>


    <div class="modal fade" id="modalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Header-->
                <div class="modal-header success-color darken-3 white-text">
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="title">Ajouter Matériel</h4>
                </div>
                <!--Body-->
                <div class="modal-body mb-0">

                    {!! Form::open(array('route' => 'materiel.store', 'method' => 'POST')) !!}
                    <div class="md-form form-sm">
                        <input type="text" id="nom_materiel" name="nom_materiel" class="form-control">
                        <label for="nom_materiel">Nom de matériel</label>
                    </div>

                    <input type="hidden" value="{{ $tache->id }}" name="id_tache">

                    <div class="text-center mt-1-half">
                        <button class="btn btn-success mb-1">Créer <i class="fa fa-check ml-1"></i></button>
                    </div>
                    {{ Form::token() }}

                    {!! Form::close() !!}
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Subscription From-->



@endsection


@section('script')


    $('#myModal').modal();

@endsection