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
                                <li class="list-group-item"> <div class="col-sm-6">{{ $u->name }}</div>
                                    {!! Form::open(array('route' =>['equipeUser.destroy',$e->id] , 'method' => 'DELETE','autocomplete'=>'off','id'=>'supp','class'=>'text-right col-sm-6')) !!}

                                    <a type="submit" name="submit" onclick="document.getElementById('supp').submit();" class="red-text"><i class="fa fa-times"></i></a>
                                    {!! Form::close() !!}
                                </li>
                            @endif

                        @endforeach
                    @endforeach

</ul>



</div>
                <div class="col-sm-6">
                    <h2 class="section-title">Liste des Employés</h2>
                    <ul class="list-group">
                        @foreach($user as $u1)
                            <li class="list-group-item" value="{{ $u1->id }}">
                                <div class="col-sm-6">
                                    {{ $u1->name}}
                                </div>
                                {!! Form::open(array('route' => 'equipeUser.store', 'method' => 'POST','id'=>'add','class'=>'col-sm-6 text-right')) !!}


                                <input type="hidden" name="id_equipe" value="{{ $id }}">

                                <a type="submit" name="submit" onclick="document.getElementById('add').submit();" class="green-text"><i class="fa fa-plus"></i></a>

                                {!! Form::close() !!}
                            </li>

                        @endforeach
                    </ul>


                   <!-- <a href="#" class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  Ajouter membre</a>-->



                </div>
            </div>
        </div>

    </section>

@endsection