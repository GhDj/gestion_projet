@extends('layout')

@section('page-title','Services - Ajouter')

@section('content')

    <section class="section">
        <h1 class="section-heading">Ajouter Service</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel-heading">  </div>



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
                    <button type="submit" class="btn btn-success">Ajouter</button>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </section>

@endsection
