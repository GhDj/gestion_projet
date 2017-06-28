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
            <div class="row">
                <div class="col-md-12 col-sm-12">

                    <div class="row">
                        <!--First column-->
                        <div class="col-md-4 mb-1">
                            <!--Card-->
                            <div class="card card-cascade cascading-admin-card">

                                <!--Card Data-->
                                <div class="admin-up">
                                    <i class="fa fa-file-text-o blue lighten"></i>
                                    <div class="data">
                                        <p>{{ \App\Projet::where('etat','=',1)->count() }}/{{ \App\Projet::all()->count() }}</p>
                                        <h3>Projets</h3>
                                    </div>
                                </div>
                                <!--/.Card Data-->

                                <!--Card content-->
                                <div class="card-block">
                                    <div class="progress">
                                        <div class="progress-bar blue lighten" role="progressbar" style="width: {{ \App\Projet::where('etat','=',1)->count()/\App\Projet::all()->count()*100 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--Text-->
                                    <p class="card-text">Progression des projets finis ({{ \App\Projet::where('etat','=',1)->count()/\App\Projet::all()->count()*100 }}%)</p>
                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->
                        </div>
                        <!--/First column-->

                        <!--Second column-->
                        <div class="col-md-4 mb-1">
                            <!--Card-->
                            <div class="card card-cascade cascading-admin-card">

                                <!--Card Data-->
                                <div class="admin-up">
                                    <i class="fa fa-tasks green lighten"></i>
                                    <div class="data">
                                        <p>{{ \App\Tache::where('statut_tache','=',1)->count() }}/{{ \App\Tache::all()->count() }}</p>
                                        <h3>Tâches</h3>
                                    </div>
                                </div>
                                <!--/.Card Data-->

                                <!--Card content-->
                                <div class="card-block">
                                    <div class="progress">
                                        <div class="progress-bar  green lighten" role="progressbar" style="width: {{ \App\Tache::where('statut_tache','=',0)->count()/\App\Tache::all()->count()*100 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--Text-->
                                    <p class="card-text">Progression des tâches ({{ \App\Tache::where('statut_tache','=',1)->count()/\App\Tache::all()->count()*100 }}%)</p>
                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->
                        </div>
                        <!--/Second column-->

                        <!--Third column-->
                        <div class="col-md-4 mb-1">
                            <!--Card-->
                            <div class="card card-cascade cascading-admin-card">

                                <!--Card Data-->
                                <div class="admin-up">
                                    <i class="fa fa-users red"></i>
                                    <div class="data">
                                        <p>{{ \App\User::all()->count() }}</p>
                                        <h3>Employés</h3>
                                    </div>
                                </div>
                                <!--/.Card Data-->

                                <!--Card content-->
                                <div class="card-block">
                                    <div class="progress">
                                        <div class="progress-bar red" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--Text-->
                                    <p class="card-text">Nombre total des employés</p>
                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->
                        </div>
                        <!--/Third column-->

                    </div>


                    <div class="row">
                        <h2 class="h2-responsive section-heading">Progression les tâches et les projets</h2>
                        <div class="col-sm-6"> <canvas id="myChart"></canvas></div>
                        <div class="col-sm-6"> <canvas id="myChart-line"></canvas></div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection


@section('script')

    $(function () {
    var option = {
    responsive: true,
    };
    var data = {
    labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet"],
    datasets: [
    {
    label: "Projets",
    fillColor: "#2196F3",
    strokeColor: "rgba(220,220,220,1)",
    pointColor: "rgba(220,220,220,1)",
    pointStrokeColor: "#fff",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "rgba(220,220,220,1)",
    data: [{{ \App\Projet::where('created_at','<',\Carbon\Carbon::createFromDate(2017,1,31))->count() }}, {{ \App\Projet::where('created_at','<',\Carbon\Carbon::createFromDate(2017,2,31))->count() }}, {{ \App\Projet::where('created_at','<',\Carbon\Carbon::createFromDate(2017,3,31))->count() }}, {{ \App\Projet::where('created_at','<',\Carbon\Carbon::createFromDate(2017,4,31))->count() }}, {{ \App\Projet::where('created_at','<',\Carbon\Carbon::createFromDate(2017,5,31))->count() }}, {{ \App\Projet::where('created_at','<',\Carbon\Carbon::createFromDate(2017,6,31))->count() }}, {{ \App\Projet::where('created_at','<',\Carbon\Carbon::createFromDate(2017,7,31))->count() }}]
    },
    {
    label: "Tâches",
    fillColor: "#4CAF50",
    strokeColor: "rgba(151,187,205,1)",
    pointColor: "rgba(151,187,205,1)",
    pointStrokeColor: "#fff",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "rgba(151,187,205,1)",
    data: [{{ \App\Tache::where('created_at','<',\Carbon\Carbon::createFromDate(2017,1,31))->count() }}, {{ \App\Tache::where('created_at','<',\Carbon\Carbon::createFromDate(2017,2,31))->count() }}, {{ \App\Tache::where('created_at','<',\Carbon\Carbon::createFromDate(2017,3,31))->count() }}, {{ \App\Tache::where('created_at','<',\Carbon\Carbon::createFromDate(2017,4,31))->count() }}, {{ \App\Tache::where('created_at','<',\Carbon\Carbon::createFromDate(2017,5,31))->count() }}, {{ \App\Tache::where('created_at','<',\Carbon\Carbon::createFromDate(2017,6,31))->count() }}, {{ \App\Tache::where('created_at','<',\Carbon\Carbon::createFromDate(2017,7,31))->count() }}]
    }
    ]
    };

    var dataline = {
    labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet"],
    datasets: [
    {
    label: "Projets",
    fillColor: "rgba(220,220,220,0.2)",
    strokeColor: "rgba(220,220,220,1)",
    pointColor: "rgba(220,220,220,1)",
    pointStrokeColor: "#fff",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "rgba(220,220,220,1)",
    data: [{{ \App\Projet::where('created_at','<',\Carbon\Carbon::createFromDate(2017,1,31))->count() }}, {{ \App\Projet::where('created_at','<',\Carbon\Carbon::createFromDate(2017,2,31))->count() }}, {{ \App\Projet::where('created_at','<',\Carbon\Carbon::createFromDate(2017,3,31))->count() }}, {{ \App\Projet::where('created_at','<',\Carbon\Carbon::createFromDate(2017,4,31))->count() }}, {{ \App\Projet::where('created_at','<',\Carbon\Carbon::createFromDate(2017,5,31))->count() }}, {{ \App\Projet::where('created_at','<',\Carbon\Carbon::createFromDate(2017,6,31))->count() }}, {{ \App\Projet::where('created_at','<',\Carbon\Carbon::createFromDate(2017,7,31))->count() }}]
    },
    {
    label: "Tâches",
    fillColor: "rgba(151,187,205,0.2)",
    strokeColor: "rgba(151,187,205,1)",
    pointColor: "rgba(151,187,205,1)",
    pointStrokeColor: "#fff",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "rgba(151,187,205,1)",
    data: [{{ \App\Tache::where('created_at','<',\Carbon\Carbon::createFromDate(2017,1,31))->count() }}, {{ \App\Tache::where('created_at','<',\Carbon\Carbon::createFromDate(2017,2,31))->count() }}, {{ \App\Tache::where('created_at','<',\Carbon\Carbon::createFromDate(2017,3,31))->count() }}, {{ \App\Tache::where('created_at','<',\Carbon\Carbon::createFromDate(2017,4,31))->count() }}, {{ \App\Tache::where('created_at','<',\Carbon\Carbon::createFromDate(2017,5,31))->count() }}, {{ \App\Tache::where('created_at','<',\Carbon\Carbon::createFromDate(2017,6,31))->count() }}, {{ \App\Tache::where('created_at','<',\Carbon\Carbon::createFromDate(2017,7,31))->count() }}]
    }
    ]
    };

    // Get the context of the canvas element we want to select
    var ctx = document.getElementById("myChart").getContext('2d');
    var myBarChart = new Chart(ctx).Bar(data, option);
    var ctx = document.getElementById("myChart-line").getContext('2d');
    var myBarChart = new Chart(ctx).Line(dataline, option);
    });

@endsection