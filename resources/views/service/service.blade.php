@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
{!! Form::open(array('route' =>['service.update',$service->id ] , 'method' => 'PATCH','autocomplete'=>'off')) !!}
<p>
    <label>Nom Service:</label>
    <input id="nom_service" type="text" class="form-control" name="nom_service" required value="{{ $service->nom_service }}">
</p>
<p>
    <label>Chef Service</label>
        <select name="chef_service">
            @foreach ($user as $u)

                <option value="{{ $u->id }}" @if( $u->id==$service->chef_service ) selected @endif > {{ $u->name }}  </option>


            @endforeach
        </select>



</p>
                        <input id="submit" type="submit" class="form-control" name="submit" required>
                        <a href="{{ route('service.index') }}" class="button">Retour</a>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection