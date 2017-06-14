@extends('layout')

@section('title','Réunions')

@section('page-title','Réunions')

@section('content')


    <section class="section">
        <h1 class="section-heading">Liste des Réunions</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom Service </th>
                            <th> Chef de service </th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

         <a href="{{ route('reunion.create') }}" class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  Planifier réunion</a>
                    <a href="#" data-toggle="modal" data-target="#modalSubscription" class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  Planifier réunion</a>


                </div>
            </div>
        </div>

    </section>

    @foreach( $reunion as $r)
        {{ $r->designation }}  <a href="{{ route('reunion.show',['id'=>$r->id])  }}"> Afficher </a> <br>
    @endforeach

@endsection