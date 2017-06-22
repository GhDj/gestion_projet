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
@endsection