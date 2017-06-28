@extends('layout')


@section('page-title')

    Chat

@endsection

@section('title')

    Chat

@endsection

@section('header-script')

    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

@endsection

@section('content')
    <section class="section">
        <h1 class="section-heading">Bienvenue {{ Auth::user()->name }}</h1>
        <div class="container">
            {!! Form::open(array('url' => 'rechercheUser', 'method' => 'POST')) !!}

            <input type="text" name="recherche">
            {{ Form::submit() }}
            {{ Form::close() }}
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">





                @foreach($liste as $l)

                 <!--   <a href="/discussion/{{$l}}">   {{ \App\User::findOrFail($l)->name }}</a>-->

                @endforeach


                <div class="row">

                </div>

                {!! Form::open(array('route' => 'chat.store', 'method' => 'POST','class'=>'col-sm-12 col-md-12')) !!}
                <div class="row">
                    <div class="col-sm-6 mb-1">
                       <!-- <select name="recepteur" class="mdb-select">-->
                        <div class="list-group equipe-list">
                            @foreach(\App\User::all() as $u)
                                <a class="list-group-item" href="/discussion/{{ $u->id }}" value="{{ $u->id }}"> {{ $u->name }}</a>
                            @endforeach
                     <!--   </select>-->
                        </div>
                    </div>


                    <div class="col-sm-6 mb-1">
                        @foreach($chat as $c)
                            @if($c->emetteur==\Illuminate\Support\Facades\Auth::user()->id)
                                <div class="row d-block text-left rounded green lighten-5 text-gray-dark chat-text">

                                    <p>{{ $c->contenu }}
                                    </p>
                                </div>

                            @else
                                <div class="row d-block text-right rounded grey lighten-3 text-gray-dark chat-text">
                                <p>
                                    {{ \App\User::findOrfail($c->emetteur)->name }}:{{ $c->contenu }}
                                </p>
                                 </div>
                            @endif

                        @endforeach
                        <div class="md-form input-group">

                                <i class="fa fa-pencil prefix"></i>
                                <textarea type="text" id="contenu" class="md-textarea" name="contenu" placeholder="Votre message"></textarea>

                            <span class="input-group-btn">

                        <button class="btn-floating btn-small blue" type="submit"><i class="fa fa-send"></i></button>
                                </span>
                        </div>
                                    <input type="hidden" name="recepteur" value="{{ $id }}">


                        <input type="hidden" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}" name="emetteur">

                    </div>
                </div>
                {!! Form::close() !!}

            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
