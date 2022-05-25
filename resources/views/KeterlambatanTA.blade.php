@extends('Layout.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
    <h1 class="h3 mb-0 text-gray-800">Statistik Permasalahan Kelulusan Mahasiswa</h1>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mahasiswa->count()}} orang</div>
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
                            Mahasiswa Belum Lulus</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $list_mhs->count() }} orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
                <h6 class="m-0 font-weight-bold text-primary">Mahasiswa Belum Lulus Berdasarkan Angkatan (Pie Chart)</h6>
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
                <div id="pie_lulusAngkatan"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4 h-100">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Mahasiswa Belum Lulus Berdasarkan Semester</h6>
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
                <div class="">
                    <div id="bar_lulusSemester"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4 h-100">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Mahasiswa Belum Lulus Berdasarkan SKS</h6>
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
                <div id="column_lulusSks"></div>
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
        data1.addColumn('string', 'Angkatan');
        data1.addColumn('number', 'Total');
        data1.addRows([
            <?php
            foreach($per_ang as $a) {
                echo "['".$a->angkatan."', ".$a->total."],";
            }
            ?>
        ]);
        var options1 = {
            legend: {position: 'right', alignment: 'center'},
            width: 500,
            height: 300,
        };
        var chart1 = new google.visualization.PieChart(document.getElementById('pie_lulusAngkatan'));
        chart1.draw(data1, options1);
        var data2 = new google.visualization.arrayToDataTable([
            ['Semester', 'Total'],
            <?php
            foreach($per_smt as $s) {
                echo "['".$s->semester."', ".$s->total."],";
            }
            ?>
        ]);
        var options2 = {
            vAxis : {title: 'Semester'},
            hAxis : {title: 'Jumlah'},
            height: 300,    
        };
        var chart2 = new google.visualization.BarChart(document.getElementById('bar_lulusSemester'));
        chart2.draw(data2, options2);
        var data3 = new google.visualization.arrayToDataTable([
            ['SKS', 'Jumlah Mahasiswa'],
            <?php
            foreach($per_sks as $s) {
                echo "['".$s->sks."', ".$s->total."],";
            } ?>
        ]);
        var options3 = {
            width: 1100,
            height: 300,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
            vAxis: {title: 'Jumlah Mahasiswa'},
            hAxis: {title: 'Jumlah SKS'},   
        };
        var chart3 = new google.visualization.ColumnChart(document.getElementById('column_lulusSks'));
        chart3.draw(data3,options3);
    }
</script>
@endsection
