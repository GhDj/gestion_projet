@extends('layout')

@section('title','Réunions')

@section('page-title','Réunions')

@section('content')

    <section class="section">
        <h1 class="section-heading">{{ $r->designation }}</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">

                    <p> Date Reunion :{{ $r->dateReunion }}</p>
                    <p> Emplacement : {{ $r->Emplacement }}</p>
                    <p> Time : {{ $r->timeReunion }}</p>

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

                            <?php
                            print_r($c);
                            ?>

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

                </div>
                <div class="col-sm-6">



                    @if(\Illuminate\Support\Facades\Auth::user()->role==1)

                        <ul class="list-group">
                            @foreach($user as $u)
                                <li class="list-group-item" value="{{ $u->id }}">
                                    <div class="col-sm-6">
                                        {{ $u->name}}
                                    </div>
                                   <div class="col-sm-6 pull-right text-right">
                                       {!! Form::open(array('route' => 'reunionUser.store', 'method' => 'POST','id'=>'add','class'=>'col-sm-6 text-right')) !!}

                                       <input type="hidden" id="id_user" name="id_user" value="{{ $u->id }}">
                                       <input type="hidden" id="id_reunion" name="id_reunion" value="{{ $id }}">

                                       <a type="submit" name="submit" onclick="document.getElementById('add').submit();" class="green-text" id="btn-add-{{ $u->id }}"><i class="fa fa-plus"></i></a>

                                       {{ csrf_field() }}

                                       {!! Form::close() !!}
                                   </div>
                                </li>
                            @endforeach

                        </ul>




                        <a href="/reunion/{{ $r->id }}/edit"> Modifier</a>
                    @endif

                </div>
            </div>
        </div>

    </section>

@endsection




