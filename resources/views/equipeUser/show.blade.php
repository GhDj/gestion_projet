@extends('layout')

@section('page-title','Services')

@section('content')

    <section class="section">
        <h1 class="section-heading">Membres de <?php echo \App\Equipe::where('id','=',$id)->first()->name; ?></h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">

                        <h2 class="section-title">Liste des membres</h2>

                    <ul class="list-group" id="member-list">
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
                        @if($equipeuser->count() != 0)
                            <?php $c = []; ?>
                                @foreach($equipeuser as $e1)
                                    <?php

                                        array_push($c,$e1->id_user);

                                    ?>
                                @endforeach
                        @foreach($user as $u1)
                           {{--  @foreach($equipeuser as $e1) --}}

                                @if(!(in_array($u1->id,$c)))

                                    <li class="list-group-item" value="{{ $u1->id }}">
                                        <div class="col-sm-6">
                                            {{ $u1->name}}
                                        </div>
                                        {!! Form::open(array('route' => 'equipeUser.store', 'method' => 'POST','id'=>'add','class'=>'col-sm-6 text-right')) !!}

                                        <input type="hidden" id="id_user-{{ $u1->id }}" name="id_user" value="{{ $u1->id }}">
                                        <input type="hidden" id="id_equipe-{{ $u1->id }}" name="id_equipe" value="{{ $id }}">

                                        <a type="submit" name="submit" class="green-text" id="btn-add-{{ $u1->id }}"><i class="fa fa-plus"></i></a>

                                        {{ csrf_field() }}

                                        {!! Form::close() !!}
                                    </li>
                                @endif

                            @endforeach

                        {{-- @endforeach --}}
                            @else
                            @foreach($user as $u1)

                                        <li class="list-group-item" value="{{ $u1->id }}">
                                            <div class="col-sm-6">
                                                {{ $u1->name}}
                                            </div>
                                            {!! Form::open(array('route' => 'equipeUser.store', 'method' => 'POST','id'=>'add','class'=>'col-sm-6 text-right')) !!}

                                            <input type="hidden" id="id_user-{{ $u1->id }}" name="id_user" value="{{ $u1->id }}">
                                            <input type="hidden" id="id_equipe-{{ $u1->id }}" name="id_equipe" value="{{ $id }}">

                                            <a type="submit" name="submit" class="green-text" id="btn-add-{{ $u1->id }}"><i class="fa fa-plus"></i></a>

                                            {{ csrf_field() }}

                                            {!! Form::close() !!}
                                        </li>
                                @endforeach

                        @endif
                    </ul>


                   <!-- <a href="#" class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  Ajouter membre</a>-->



                </div>
            </div>
        </div>

    </section>

@endsection

@section('script')
    @foreach($user as $u1)
        $(document).ready(function(){

        var url = "/equipeUser";


        //create new task / update existing task
        $("#btn-add-{{ $u1->id }}").click(function (e) {
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });

        e.preventDefault();

        var formData = {
        id_equipe: $('#id_equipe-{{ $u1->id }}').val(),
        id_user: $('#id_user-{{ $u1->id }}').val()
        };

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = "add";

        var type = "POST"; //for creating new resource
        //    var task_id = $('#task_id').val();
        var my_url = url;


        console.log(formData);

        $.ajax({

        type: type,
        url: my_url,
        data: formData,
        dataType: 'json',
        success: function (data) {
        console.log(data);

        /*   var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.task + '</td><td>' + data.description + '</td><td>' + data.created_at + '</td>';
            task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';*/

        var member = '<li class="list-group-item"> <div class="col-sm-6">{{ \App\User::where("id","=",'+data.id_user+')->first() }}</div>';
            member+= '{!! Form::open(array('route' =>['equipeUser.destroy','+ data.idType +'] , 'method' => 'DELETE','autocomplete'=>'off','id'=>'supp','class'=>'text-right col-sm-6')) !!}';

            member+=  '<a type="submit" name="submit" onclick="document.getElementById("supp").submit();" class="red-text"><i class="fa fa-times"></i></a>';
            member+=  '{!! Form::close() !!}';
            member+=  ' </li>';



        if (state == "add"){ //if user added a new record
        //     $('#member-list').append(member);
        }
        location.reload();
        },
        error: function (data) {
        console.log('Error:', data);
        }

        });
        });
        });
    @endforeach



@endsection