@extends('layout')

@section('title','Services')

@section('page-title','Services')

@section('content')

    <section class="section">
        <h1 class="section-heading">Liste des Services</h1>
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
                    @foreach($service as $s)

                                <tr>
                                    <td>{{ $s->id }}</td>
                                    <td>{{ $s->nom_service }}</td>
                                    <td>
                                    <?php
                                            $r = \App\User::where('id','=',$s->chef_service)->first();
                                            echo $r['name'];
                                            ?>
                                    </td>
                                    <td>   <a href="{{ route('service.edit',$s->id) }}" class="teal-text"><i class="fa fa-pencil"></i></a>
                                        {!! Form::open(array('route' =>['service.destroy',$s->id ] , 'method' => 'DELETE','autocomplete'=>'off','id'=>'supp')) !!}

                                        <a type="submit" name="submit" onclick="document.getElementById('supp').submit();" class="red-text"><i class="fa fa-times"></i></a>
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                            </table>

                  <!--  <a href="{{ route('service.create') }}" class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  Ajouter Service</a> -->
                    <a href="#" data-toggle="modal" data-target="#modalSubscription" class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  Ajouter Service</a>


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
                    <h4 class="title">Ajouter Service</h4>
                </div>
                <!--Body-->
                <div class="modal-body mb-0">

                    {!! Form::open(array('route' => 'service.store', 'method' => 'POST')) !!}


                    <div class="md-form">
                        <input type="text" id="nom_service" class="form-control" name="nom_service">
                        <label for="nom_service">Nom du service</label>
                    </div>



                    <select name="chef_service" class="mdb-select">
                        <option disabled selected>Chef Service</option>
                        @foreach ($user as $u)

                            <option value="{{ $u->id }}"> {{ $u->name }}  </option>


                        @endforeach

                    </select>
                    {!! Form::token() !!}
                    <div class="text-center mt-1-half">
                        <button class="btn btn-success mb-1">Ajouter <i class="fa fa-check ml-1"></i></button>
                    </div>

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