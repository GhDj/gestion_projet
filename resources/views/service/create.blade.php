@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Ajouter un service </div>
                    <div class="panel-body">


                    {!! Form::open(array('route' => 'service.store', 'method' => 'POST')) !!}
<ul>
    <li>
        {!! Form::label('nom_service', 'Nom_service:') !!}
        {!! Form::text('nom_service') !!}
    </li>
    <li>
        <label>Chef service : </label>
       <select name="chef_service">
           @foreach ($user as $u)

                     <option value="{{ $u->id }}"> {{ $u->name }}  </option>


           @endforeach

       </select>
    </li>
    <li>
        {!! Form::token() !!}
        {!! Form::submit() !!}
    </li>
</ul>
{!! Form::close() !!}
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection