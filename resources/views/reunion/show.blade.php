@extends('layout')

@section('title','Réunions')

@section('page-title')

    Réunions - {{ $r->designation }}

@endsection


@section('content')

    <section class="section">
        <h1 class="section-heading">{{ $r->designation }}</h1>
        <div class="container">

            <div class="row">
                <div class="col-sm-6">

                        <h2 class="h2-responsive d-inline text-success"> <i class="fa fa-calendar" aria-hidden="true"></i> Date :</h2>
                        <h2 class="d-inline">{{ $r->dateReunion }}</h2>

                    <hr>

                    <h2 class="h2-responsive d-inline text-success"> <i class="fa fa-location-arrow" aria-hidden="true"></i> Emplacement :</h2>
                    <h2 class="d-inline">{{ $r->Emplacement }}</h2>
                    <hr>
                    <h2 class="h2-responsive d-inline text-success"> <i class="fa fa-clock-o" aria-hidden="true"></i> Time :</h2>
                    <h2 class="d-inline">{{ $r->timeReunion }}</h2>
                    <hr>


                </div>
                <div class="col-sm-6 scroll-box">



                    @if(\Illuminate\Support\Facades\Auth::user()->role==1)

                        <h2 class="h2-responsive">Liste des employés</h2>
                        <hr>
                        <div class="scrollbar" id="scroll">
                            <div class="force-overflow">
                                <ul class="list-group">
                                    @foreach($user as $u)
                                        <li class="list-group-item" value="{{ $u->id }}">
                                            <div class="col-sm-6">
                                                {{ $u->name}}
                                            </div>
                                            {!! Form::open(array('route' => 'reunionUser.store', 'method' => 'POST','id'=>'add','class'=>'col-sm-6 text-right')) !!}

                                            <input type="hidden" id="id_user-{{ $u->id }}" name="id_user" value="{{ $u->id }}">
                                            <input type="hidden" id="id_reunion-{{ $u->id }}" name="id_reunion" value="{{ $id }}">

                                            <a type="submit" name="submit" class="green-text" id="btn-add-{{ $u->id }}"><i class="fa fa-plus"></i></a>

                                            {{ csrf_field() }}

                                            {!! Form::close() !!}
                                        </li>
                                    @endforeach

                                </ul>

                            </div>
                        </div>




                       <!-- <a href="/reunion/{{ $r->id }}/edit"> Modifier</a>-->
                    @endif

                </div>

                <div class="col-sm-12">
                    <h2>
                        Liste des participants
                    </h2>

                    <ul class="list-group" id="member-reunion-list">

                        <?php $c = []; ?>
                        @foreach($ru as $r)
                            <?php

                            array_push($c,$r->id_user);



                            ?>
                        @endforeach



                        @foreach($user as $u)
                            @if((in_array($u->id,$c)))
                                <li class="list-group-item">
                                    <div class="col-sm-6">{{ $u->name }}</div>
                                    {!! Form::open(array('route' =>['reunionUser.destroy',$r->id] , 'method' => 'DELETE','autocomplete'=>'off','id'=>'supp','class'=>'text-right col-sm-6')) !!}

                                    <a type="submit" name="submit" onclick="document.getElementById('supp').submit();" class="red-text"><i class="fa fa-times"></i></a>
                                    {!! Form::close() !!}
                                </li>

                            @endif
                        @endforeach

                    </ul>
                    @if(\Illuminate\Support\Facades\Auth::user()->role==1)
                            <a href="{{ route('reunion.index') }}" class="btn btn-success pull-right">Liste des réunions</a>
                    @endif

                </div>

            </div>
        </div>

    </section>

@endsection



@section('script')
    @foreach($user as $u1)
        $(document).ready(function(){

        var url = "/reunionUser";


        //create new task / update existing task
        $("#btn-add-{{ $u1->id }}").click(function (e) {
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });

        e.preventDefault();

        var formData = {
        id_reunion: $('#id_reunion-{{ $u1->id }}').val(),
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

                if (state == "add"){ //if user added a new record
                //     $('#member-list').append(member);
                }

                },
                error: function (data) {
                console.log('Error:', data);
                }

                });
        location.reload(true);
        });
        });
    @endforeach


@endsection


