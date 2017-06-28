@extends('layout')


@section('page-title')

    Tableau de bord

@endsection

@section('title')

    Tableau de bord

@endsection

@section('header-script')

    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

@endsection

@section('content')
    <section class="section">
        <h1 class="section-heading">Bienvenue {{ Auth::user()->name }}</h1>
        <div class="container">
            <div class="col-md-12 col-sm-12">

                {!! Form::open(array('route' => 'chat.store', 'method' => 'POST','class'=>'col-sm-12 col-md-12')) !!}
                <div class="row">
                <div class="col-sm-6 mb-1">
                    <select name="recepteur" class="mdb-select">
                        @foreach($user as $u)
                            <option value="{{ $u->id }}"> {{ $u->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col-sm-6 mb-1">
                   <div class="md-form">
                       <div class="md-form">
                           <i class="fa fa-pencil prefix"></i>
                           <textarea type="text" id="contenu" class="md-textarea" name="contenu"></textarea>
                           <label for="contenu">Message</label>
                       </div>
                   </div>

                    <input type="hidden" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}" name="emetteur">


                    <button class="btn btn-primary pull-right" type="submit">Envoyer</button>
                </div>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </section>
@endsection