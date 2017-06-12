@extends('layout')

@section('page-title','Equipes')

@section('content')

    <section class="section">
        <h1 class="section-heading">Liste des équipes</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">


                    <div class="list-group">
                        @foreach( $equipe as $e)
                            <a href="{{ route('equipe.show',['id'=>$e->id])  }}" class="list-group-item justify-content-between">
                                {{ $e->name }}
                                <span class="badge badge-success badge-pill">{{ \App\Equipe_user::where('id_equipe','=',$e->id)->count() }}</span>
                            </a>
                        @endforeach
                    </div>

                    <a href="#" data-toggle="modal" data-target="#modalSubscription" class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  Créer équipe</a>


                </div>
            </div>
        </div>

    </section>



    <!--Modal: Subscription From-->
    <div class="modal fade" id="modalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Header-->
                <div class="modal-header success-color darken-3 white-text">
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="title">Créer équipe</h4>
                </div>
                <!--Body-->
                <div class="modal-body mb-0">

                    {!! Form::open(array('route' => 'equipe.store', 'method' => 'POST')) !!}
                            <div class="md-form form-sm">
                                <input type="text" id="name" name="name" class="form-control">
                                <label for="name">Nom de l'équipe</label>
                            </div>

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