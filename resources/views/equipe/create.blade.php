@extends('layout')

@section('page-title','Equipes - Créer')

@section('content')

    <section class="section">
        <h1 class="section-heading">Créer équipe</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel-heading">  </div>



                    {!! Form::open(array('route' => 'equipe.store', 'method' => 'POST')) !!}



                    <div class="md-form">
                        <input type="text" name="name" id="name">
                        <label for="name">Nom de l'équipe</label>
                    </div>

                        <input type="hidden"value="{{ \Illuminate\Support\Facades\Auth::user()->id }}" name="id_user">


                            {{ Form::token() }}

                            <button class="btn btn-success pull-right" type="submit">Créer</button>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </section>

@endsection

@section('script')
    $(document).ready(function() {
    $('.mdb-select').material_select();
    });
@endsection
