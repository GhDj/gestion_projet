@extends('layout')

@section('title','Réunions')

@section('page-title','Réunions')

@section('header-script')

    <link rel="stylesheet" href="{{ asset('css/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.print.css') }}">

@endsection

@section('content')


    <section class="section">
        <h1 class="section-heading">Liste des Réunions</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Empalcement</th>
                            <th> Date </th>
                            <th> Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($reunion as $s)

                            <tr>
                                <td><a href="{{ route('reunion.show',['id'=>$s->id]) }}">{{ $s->id }}</a></td>
                                <td>{{ $s->Emplacement }}</td>
                                <td>
                                    <?php
                                        \Carbon\Carbon::setLocale('fr');
                                        $date = explode(" ",$s->dateReunion);
                                       // print_r($date);
                                        $d = $date[0];
                                        $m = rtrim($date[1],",");

                                        $y = $date[2];
                                        $dd = $d." ".$m." ".$y;
                                    ?>
                                    {{ \Carbon\Carbon::createFromFormat('d m Y',$s->dateReunion)->toDateString() }}
                                        {{ $s->timeReunion }}
                                </td>
                                <td>   <!--<a href="{{ route('reunion.edit',$s->id) }}" class="teal-text"><i class="fa fa-pencil"></i></a>-->
                                    {!! Form::open(array('route' =>['reunion.destroy',$s->id ] , 'method' => 'DELETE','autocomplete'=>'off','id'=>'supp')) !!}

                                    <a type="submit" name="submit" onclick="document.getElementById('supp').submit();" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Annuler</a>
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>

         <a href="{{ route('reunion.create') }}" class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i>  Planifier réunion</a>


                </div>

                <div class="col-sm-6">
                    <div id="calendar"></div>
                </div>

            </div>
        </div>

    </section>



@endsection

@section('footer-script')

    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/fullcalendar.min.js') }}"></script>

@endsection

@section('script')

    $('#calendar').fullCalendar({
           local : 'fr',
    title : 'Liste des réunions',
    events: [
    @foreach($reunion as $r)

        {
        title  : '{{ $r->designation }}',
        start  : '{{ \Carbon\Carbon::createFromFormat('d m Y',$r->dateReunion)->toDateString() }}',

        },

    @endforeach
    ],

    dayNames : ['Dimanche', 'Lundi', 'Mardi', 'Mercredi',
    'Jeudi', 'Vendredi', 'Samedi'],
    dayNamesShort : ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam']
    })

@endsection