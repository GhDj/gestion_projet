@extends('layout')

@section('page-title','Diagramme de gant')

@section('header-script')

    <script src="{{ asset('js/RGraph.common.core.js') }}"></script>
    <script src="{{ asset('js/RGraph.common.dynamic.js') }}"></script>
    <script src="{{ asset('js/RGraph.gantt.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.12.0/semantic.min.css" />


@endsection

@section('content')



    <section id="pdff" class="section">

        <h1 class="section-heading">Diagramme de gant</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="btn btn-primary center" id="create_pdf">Télécharger le rapport
                    </div>
                    <canvas id="cvs" width="1000" height="450">[No canvas support]</canvas>






                </div>
            </div>
        </div>

    </section>

    <section class="section">
        <h1 class="section-heading">Progression des tâches (Mensuel)</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">



                    <canvas id="myChart"></canvas>




                </div>
            </div>
        </div>

    </section>
@endsection

@section('footer-script')

    <script src="{{ asset('js/jspdf.min.js') }}"></script>
    <script src="{{ asset('js/from_html.js') }}"></script>
    <script src="{{ asset('js/split_text_to_size.js') }}"></script>
    <script src="{{ asset('js/standard_fonts_metrics.js') }}"></script>
    <script type="text/javascript" src="//cdn.rawgit.com/niklasvh/html2canvas/0.5.0-alpha2/dist/html2canvas.min.js">
    </script>

@endsection

@section('script')

    var data = [
    [0, 4, null, 'Tâche 1','red'],
    [7, 5, null, 'Tâche x','blue'],
    [14, 3, null, 'Tâche x','pink'],
    [[14, 5, null, 'Tâche x','#aaf'], [21, 5, null, 'Tâche x','#aaf']],
    [14, 5, null, 'Tâche x', 'cyan'],
    [[14, 5, null, 'Tâche x','#fc7'], [21, 5, null, 'Tâche x','#fc7']]
    ];

    var gantt = new RGraph.Gantt({
    id: 'cvs',
    data: data,
    options: {
    borders: false,
    labels: [
    'L','M','M','J','V','S','D',
    'L','M','M','J','V','S','D',
    'L','M','M','J','V','S','D',
    'L','M','M','J','V','S','D'
    ],
    xmax: 28,
    gutterRight: 1,
    vbars: [
    [5, 2, 'rgba(240,240,240,0.75)'],
    [12, 2, 'rgba(240,240,240,0.75)'],
    [19, 2, 'rgba(240,240,240,0.75)'],
    [26, 2, 'rgba(240,240,240,0.75)']
    ],
    adjustable: false
    }
    }).grow().on('adjust', function (obj)
    {
    var event    = RGraph.Registry.get('chart.adjusting.gantt');
    var index    = RGraph.Registry.get('chart.adjusting.gantt').index;
    var subindex = RGraph.Registry.get('chart.adjusting.gantt').subindex;

    if (typeof subindex === 'number') {
    document.getElementById('eventStart').value    = obj.data[index][subindex][0] + 1;
    document.getElementById('eventduration').value = obj.data[index][subindex][1];
    document.getElementById('name').value          = obj.data[index][subindex][3];
    } else {
    document.getElementById('eventStart').value    = obj.data[index][0] + 1;
    document.getElementById('eventduration').value = obj.data[index][1];
    document.getElementById('name').value          = obj.data[index][3];
    }
    });


    $(function () {
    var data = {
    labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet"],
    datasets: [
    {
    label: "My First dataset",
    fillColor: "rgba(220,220,220,0.2)",
    strokeColor: "rgba(220,220,220,1)",
    pointColor: "rgba(220,220,220,1)",
    pointStrokeColor: "#fff",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "rgba(220,220,220,1)",
    data: [65, 59, 80, 81, 56, 55, 40]
    },
    {
    label: "My Second dataset",
    fillColor: "rgba(151,187,205,0.2)",
    strokeColor: "rgba(151,187,205,1)",
    pointColor: "rgba(151,187,205,1)",
    pointStrokeColor: "#fff",
    pointHighlightFill: "#fff",
    pointHighlightStroke: "rgba(151,187,205,1)",
    data: [28, 48, 40, 19, 86, 27, 90]
    }
    ]
    };

    var option = {
    responsive: true,
    };

    // Get the context of the canvas element we want to select
    var ctx = document.getElementById("myChart").getContext('2d');
    var myLineChart = new Chart(ctx).Line(data, option); //'Line' defines type of the chart.
    });

    (function() {
    var
    form = $('#pdff'),
    cache_width = form.width(),
    a4 = [595.28, 841.89]; // for a4 size paper width and height

    $('#create_pdf').on('click', function() {
    $('#page-wrapper').scrollTop(0);
    createPDF();
    });
    //create pdf
    function createPDF() {
    getCanvas().then(function(canvas) {
    var
    img = canvas.toDataURL("image/png"),
    doc = new jsPDF({
    unit: 'px',
    format: 'a4'
    });
    doc.addImage(img, 'JPEG', 20, 20);
    doc.save('rapport.pdf');
    form.width(cache_width);
    });
    }

    // create canvas object
    function getCanvas() {
    form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
    return html2canvas(form, {
    imageTimeout: 2000,
    removeContainer: true
    });
    }

    }());

@endsection