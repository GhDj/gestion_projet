@extends('layout')



@section('content')

    <section class="section">
        <h1 class="section-heading">{{ $service->nom_service }}</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {!! Form::open(array('route' =>['service.update',$service->id ] , 'method' => 'PATCH','autocomplete'=>'off')) !!}


                        <div class="md-form">
                        <input id="nom_service" type="text" class="form-control" name="nom_service" required value="{{ $service->nom_service }}">
                        <label for="nom_service">Nom Service:</label>
                    </div>
                    <p>
                        <label>Chef Service</label>
                        <select name="chef_service" class="mdb-select">
                            <option disabled>Chef de Service</option>
                            @foreach ($user as $u)

                                <option value="{{ $u->id }}" @if( $u->id==$service->chef_service ) selected @endif > {{ $u->name }}  </option>


                            @endforeach
                        </select>



                    </p>

                    <a type="submit" class="btn btn-success">Enregistrer</a>
                    <a href="{{ route('service.index') }}" class="btn btn-danger">Retour</a>
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