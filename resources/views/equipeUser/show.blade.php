@extends('layout')

@section('page-title','Services')

@section('content')

    <section class="section">
        <h1 class="section-heading">Membres de <?php echo \App\Equipe::where('id','=',$id)->first()->name; ?></h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">

                        <h2 class="section-title">Liste des membres</h2>

                    <ul class="list-group">
                    @foreach($user as $u)
                        @foreach($equipeuser as $e)

                            @if ($e->id_user==$u->id and $e->id_equipe==$id)
                                <li class="list-group-item">  {{ $u->name }}</li>
                            @endif

                        @endforeach
                    @endforeach

</ul>

                    {!! Form::open(array('route' => 'equipeUser.store', 'method' => 'POST')) !!}

</div>
                <div class="col-sm-6">
                    <h2 class="section-title">Liste des Employés</h2>
                    <ul class="list-group">
                        @foreach($user as $u1)
                            <li class="list-group-item" value="{{ $u1->id }}">{{ $u1->name}}</li>

                        @endforeach
                    </ul>
                    <input type="hidden" name="id_equipe" value="{{ $id }}">

                    {!! Form::submit() !!}
                    @if (count($errors) > 0) <div class="alert alert-danger"> <ul>
                            @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                        </ul> </div> @endif
                    {!! Form::close() !!}

                    <a href="#" class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  Ajouter membre</a>



                </div>
            </div>
        </div>

    </section>

@endsection