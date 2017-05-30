<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>
        Connect Project - @yield('title')
    </title>
</head>
<body class="grey lighten-3">

<div class="container-fluid">
<div class="row">
<div id="side-nav" class="col col-sm-2">
<div class="container">
    <ul id="slide-out" class="side-nav fixed sn-bg-1 custom-scrollbar ps-container ps-theme-default" data-ps-id="b15ceb99-3614-8113-35dd-347d90a2d0f4" style="transform: translateX(0%);">
        <!-- Logo -->
        <li>
            <div class="logo-wrapper waves-effect">
                <a href="#"><img src="{{ asset('img/logo.png') }}" class="img-fluid flex-center"></a>
            </div>
        </li>
        <!--/. Logo -->
        <!--Social-->
        <li>
            <ul class="social">
                <li><a class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
                <li><a class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a></li>
                <li><a class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a></li>
                <li><a class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a></li>
            </ul>
        </li>
        <!--/Social-->
        <!--Search Form-->
        <li>
            <form class="search-form" role="search">
                <div class="form-group waves-effect">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
        </li>
        <!--/.Search Form-->
        <!-- Side navigation links -->
        <li>
            <ul class="collapsible collapsible-accordion">
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i> Submit blog<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#" class="waves-effect">Submit listing</a>
                            </li>
                            <li><a href="#" class="waves-effect">Registration form</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i> Instruction<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#" class="waves-effect">For bloggers</a>
                            </li>
                            <li><a href="#" class="waves-effect">For authors</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-eye"></i> About<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#" class="waves-effect">Introduction</a>
                            </li>
                            <li><a href="#" class="waves-effect">Monthly meetings</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-envelope-o"></i> Contact me<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#" class="waves-effect">FAQ</a>
                            </li>
                            <li><a href="#" class="waves-effect">Write a message</a>
                            </li>
                        </ul>
                    </div>
                </li>
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
                    <p>Material Design for Bootstrap</p>
                </div>

                <ul class="nav navbar-nav ml-auto flex-row">
                    <li class="nav-item active">
                        <a class="nav-link">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Pricing</a>
                    </li>

                </ul>

    </nav>

</div>
</div>
</div>
<!--Navbar-->

<div class="container">

</div>
<!--/Start your project here-->

<script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('js/tether.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>

<script>

    $('nav').css('padding-left',$('#side-nav').width()+40);
</script>

</body>
</html>