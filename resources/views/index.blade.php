@extends('layout')

@section('content')


    <div id="myTimeline" class="container">
    </div>

@endsection

@section('footer-script')

    <script src="{{ asset('js/jquery-albe-timeline-2.0.1.min.js') }}"></script>

@endsection

@section('script')
    //Json Object
    var data = [
    @foreach(\App\Reunion::all() as $r)

        {
        time: '{{ \Carbon\Carbon::createFromFormat('d m Y',$r->dateReunion)->format('Y-m-d') }}',
        body: [{
        tag: 'h3',
        content: '{{ \Carbon\Carbon::createFromFormat('d m Y',$r->dateReunion)->format('Y-m-d')  }}',
        attr: {
        cssclass: 'group-title'
        }
        },
        {
        tag: 'span',
        content: 'Réunion à {{ $r->Emplacement }}',
        attr: {
        cssclass: 'group-sub-title'
        }
        },
        {
        tag: 'p',
        content: '{{ $r->designation }}Lorem ipsum dolor sit amet, nisl lorem, wisi egestas orci tempus class massa, suscipit eu elit urna in urna, gravida wisi aenean eros massa, cursus quisque leo quisque dui.'
        }]
        },

    @endforeach

    @foreach(\App\Projet::all() as $p)

        {
        time: '{{ \Carbon\Carbon::createFromFormat('d m Y',$p->date_debut)->format('Y-m-d') }}',
        body: [{
        tag: 'h3',
        content: '{{ \Carbon\Carbon::createFromFormat('d m Y',$p->date_debut)->format('Y-m-d')  }}',
        attr: {
        cssclass: 'group-title'
        }
        },
        {
        tag: 'span',
        content: 'Projet à {{ $p->lieu}}',
        attr: {
        cssclass: 'group-sub-title'
        }
        },
        {
        tag: 'p',
        content: '{{ $p->description }}Lorem ipsum dolor sit amet, nisl lorem, wisi egestas orci tempus class massa, suscipit eu elit urna in urna, gravida wisi aenean eros massa, cursus quisque leo quisque dui.'
        }]
        },

    @endforeach

    ];

    $(document).ready(function () {

    $("#myTimeline").albeTimeline(data);

    });
@endsection