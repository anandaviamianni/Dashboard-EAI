@extends('Layout.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
    <h1 class="h3 mb-0 text-gray-800">Statistik kesehatan mahasiswa selama masa pandemi</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Mahasiswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mahasiswa->count() }} orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Mahasiswa Sehat</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sehat->count() }} orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Mahasiswa Sakit
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $sakit->count() }} orang</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4 h-100">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Zona Tinggal Mahasiswa</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="pie_zona"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4 h-100">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Kesehatan (Bar Chart)</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="column_kesehatan"></div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4 h-100">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Kesehatan dan Zona Tingggal</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="combo_zonasehat"></div>
            </div>
        </div>
    </div>
</div>

<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data1 = new google.visualization.DataTable();
            data1.addColumn('string', 'Zona Tinggal');
            data1.addColumn('number', 'Total');
            data1.addRows([
                <?php
                foreach($filter_zona as $z) {
                    echo "['".$z->zona_tinggal."', ".$z->total."],";
                }
                ?>
            ]);
        var options1 = {
            legend: {position: 'right', alignment: 'center'},
            chartArea: {width: 1000, height: 900}
        };
        var chart1 = new google.visualization.PieChart(document.getElementById('pie_zona'));
        chart1.draw(data1, options1);
        var data2 = new google.visualization.arrayToDataTable([
            ['Zona Tinggal', 'Sehat', 'Sakit'],
            <?php
            foreach($gabungan1 as $g1) {
                echo "['".$g1->zona_tinggal."', ".$g1->Sehat.", ".$g1->Sakit."],";
            } ?>
        ]);
        var options2 = {
            width: 550,
            height: 200,
            bar: {groupWidth: "95%"},
            legend: { position: "bottom", alignment: 'center' },
            seriesType : 'bars',
            color: ['red', 'green'],
        };
        var chart2 = new google.visualization.ColumnChart(document.getElementById('column_kesehatan'));
        chart2.draw(data2,options2);
        
        var data3 = google.visualization.arrayToDataTable([
            ['Kondisi', 'Hitam', 'Merah', 'Orange', 'Hijau'],
            <?php
                foreach($gabungan2 as $g2) {
                    echo "['".$g2->Kondisi."', ".$g2->Hitam.", ".$g2->Merah.", ".$g2->Orange.", ".$g2->Hijau."],";
                }
            ?>
        ]);

        var options3 = {
            vAxis: {title: 'Zona Tinggal', color:'black'},
            hAxis: {title: 'Kondisi Kesehatan'},
            seriesType: 'bars',
            colors: ['#12274a', '#f28d8d', '#f2cd8d', '#abf28d']
        };
        var chart3 = new google.visualization.ComboChart(document.getElementById('combo_zonasehat'));
        chart3.draw(data3, options3);
    }

</script>
@endsection
