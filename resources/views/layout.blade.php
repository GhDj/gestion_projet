<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>
        Connect Project - @yield('title')
    </title>

    @yield('header-script')

</head>
<body class="grey lighten-5" >



<div class="container-fluid">
<div class="row">
<div id="side-nav" class="col col-sm-2">
<div class="container">
    <ul id="slide-out" >
        <!--  <ul id="slide-out" class="side-nav fixed sn-bg-1 custom-scrollbar ps-container ps-theme-default" data-ps-id="b15ceb99-3614-8113-35dd-347d90a2d0f4" style="transform: translateX(0%);"> -->
        <!-- Logo -->
        <li>
            <div class="logo-wrapper waves-effect">
                <a href="#"><img src="{{ asset('img/logo1.png') }}" class="img-fluid flex-center"></a>
            </div>
        </li>
        <!--/. Logo -->

       <li> <hr></li>

        <!-- Side navigation links -->
        <li>

            <ul class="collapsible collapsible-accordion sidenav">
                <li class=" text-center  "><a href="{{ route('home') }}" class="collapsible-header waves-effect arrow-r"><i class="fa fa-list menu-icon"></i> <br> Tableau de bord</a>

                </li>
                <li><hr></li>
                <li class=" text-center"><a class="collapsible-header waves-effect arrow-r"><a href="{{ route('projet.index') }}"><i class="fa fa-file-text-o  menu-icon"></i> <br> Projets</a>
                </li>
                <li><hr></li>
                <li class=" text-center"><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-files-o  menu-icon"></i> <br> Rapports</a>

                </li>
               <li> <hr></li>
                <li class=" text-center"><a href="{{ route('diagramme') }}" class="collapsible-header waves-effect arrow-r"><i class="fa fa-pie-chart  menu-icon"></i> <br> Diagrammes </a>

                </li>
                <li> <hr></li>
                <li class=" text-center"><a class="collapsible-header waves-effect arrow-r"><a href="{{ route('equipe.index') }}"><i class="fa fa-user  menu-icon"></i> <br> Employés </a>

                </li>
                <li> <hr></li>
                <li class=" text-center"><a class="collapsible-header waves-effect arrow-r"><a href="{{ route('service.index') }}"><i class="fa fa-cog menu-icon"></i> <br> Services </a>

                </li>
                <li> <hr></li>
                <li class=" text-center"><a class="collapsible-header waves-effect arrow-r"><a href="{{ route('planing') }}"><i class="fa fa-cog menu-icon"></i> <br> Planing </a>

                </li>
                <li>
                    <hr></li>
            </ul>
        </li>
        <!--/. Side navigation links -->
        <div class="sidenav-bg mask-strong"></div>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></ul>
</div>
</div>
<div class="col col-sm-10 nav-wrapper">



    <nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar double-nav grey lighten-3 ">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

                <div class="breadcrumb-dn mr-auto">
                    <p>@yield('page-title')</p>
                </div>

                <ul class="nav navbar-nav ml-auto flex-row">
                    <li class="nav-item active">
                        <a href="/discussion/{{ \App\Chat::where([
                        ['emetteur','=',Auth::user()->id],
                        ['vu','=',0]
                        ])->first()->recepteur }}" class="nav-link"><i class="fa fa-envelope" aria-hidden="true"></i> Messages <span class="badge red">{{ \App\Chat::where([
                        ['emetteur','=',Auth::user()->id],
                        ['vu','=',0]
                        ])->count() }}</span> </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell" aria-hidden="true"></i> Notifications <span class="badge red">
                                {{ \App\Notification::where([
                                    ['id_user','=',Auth::user()->id],
                                    ['lu','=',0]
                                ])->count() }}
                            </span>
                        </a>
                        <div  class="dropdown-menu dropdown" aria-labelledby="dropdownMenu2">

                            @foreach(\App\Notification::where([['id_user','=',Auth::user()->id],['lu','=',0]])->paginate(5) as $n)

                                @if($n->type == "equipe")
                                    <a class="dropdown-item" href="{{ route('equipe.show',['id'=>1]) }}">
                                        <i class="fa fa-user" aria-hidden="true"></i>  Ajouté dans l'équipe <span class="bold">
                                        {{ \App\Equipe::where('id','=',1)->first()->name }}</span>
                                    </a>
                                @endif

                            @endforeach



                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>  {{ Auth::user()->name }}</a>
                        <div  class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">

                            <a class="dropdown-item" href="{{ route('user.edit',['id'=>Auth::id()]) }}">
                                <i class="fa fa-user-o" aria-hidden="true"></i>  Mon Profile
                            </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>  Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                        </div>
                    </li>

                </ul>

    </nav>

</div>
</div>
</div>
<!--Navbar-->

<div id="page-wrapper">
    @yield('content')
</div>



<!--/Start your project here-->

<script src="{{ asset('js/mdb.min.js') }}"></script>

@yield('footer-script')

<script>

    $('nav').css('padding-left',$('#side-nav').width()+40);
    $('#page-wrapper').css('padding-left',$('#side-nav').width());
    $(".button-collapse").sideNav();
    $(document).ready(function() {
        $('.mdb-select').material_select();
    });
    $('.datepicker').pickadate({
        monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        monthsShort : ['Jan', 'Fév','Mar','Avr', 'Mai','Juin','Juil','Août','Sep','Oct','Nov','Déc' ],
        weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
        weekdaysFull : ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
        today: "Aujourd'hui",
        format: 'd mmmm yyyy',
        formatSubmit: 'd m yyyy',
        // Buttons
        clear: 'Effacer',
        close: 'Fermer',
        onSet : function (context) {
            console.log('Just set stuff:', context);
            $(this).pickadate({
              min: new Date(2017,6,28)
            });
        }
    });

    $('#date_debut').change(function () {
        console.log([parseInt($('input[name=date_debut_submit]').val().split(' ')[2]),parseInt($('input[name=date_debut_submit]').val().split(' ')[1]),parseInt($('input[name=date_debut_submit]').val().split(' ')[0])]);
        $('.datepicker').pickadate({

            min:new Date(parseInt($('input[name=date_debut_submit]').val().split(' ')[2]),parseInt($('input[name=date_debut_submit]').val().split(' ')[1]),parseInt($('input[name=date_debut_submit]').val().split(' ')[0]))
        });
    });

    @yield('script')
</script>

</body>
</html>