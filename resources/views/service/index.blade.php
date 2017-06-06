@extends('layout')

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
                                    <td>   <a href="{{ route('service.edit',$s->id) }}" class="teal-text"><i class="fa fa-pencil"></i></a>  {!! Form::open(array('route' =>['service.destroy',$s->id ] , 'method' => 'DELETE','autocomplete'=>'off')) !!}

                                        <a type="submit" name="submit" required  class="red-text"><i class="fa fa-times"></i></a>
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                            </table>

                    <a href="{{ route('service.create') }}" class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  Ajouter Service</a>



                        </div>
                </div>
            </div>

    </section>

@endsection