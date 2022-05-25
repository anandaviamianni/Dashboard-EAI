@extends('Layout.main')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
    <h1 class="h3 mb-0 text-gray-800">Statistik keaktifan mahasiswa per tingkat</h1>
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
                            Jumlah Mahasiswa Yang Mengikuti Lomba</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $gabungan1->count() }} orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
                            Jumlah Lomba Yang Diikuti Mahasiswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $gabungan3->count() }} lomba</div>
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
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Lomba Yang Diikuti Mahasiswa</h6>
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
                    <div  class="d-block m-auto"id="pie_lomba"></div>
            </div>  
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Top 15 TAK Mahasiswa</h6>
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
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Fakultas</th>
                        <th scope="col">Nama</th>
                        <th scope="col">TAK</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($gabungan1->take(15) as $g1)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $g1->NIM }}</td>
                        <td>{{ $g1->fakultas }}</td>
                        <td>{{ $g1->Nama }}</td>
                        <td>{{ $g1->tak }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>  
        </div>
    </div>
</div>
<script type="text/javascript">
    google.charts.load('current', {
                    'packages': ['corechart']
                });
    google.charts.setOnLoadCallback(drawChart);
                
    function drawChart() {
        var data1 = new google.visualization.DataTable();
        data1.addColumn('string', 'Nama Lomba');
        data1.addColumn('number', 'Total');
        data1.addRows([
            <?php
                foreach($gabungan3 as $g3) {
                    echo "['".$g3->nama_lomba."', ".$g3->total."],";
                }
            ?>
        ]);
        var options1 = {
            width: 1100,
            height: 370,
            legend: {position: 'right', alignment: 'center'},
            chartArea: {left: 200},
        };
        
        var chart1 = new google.visualization.BarChart(document.getElementById('pie_lomba'));
        chart1.draw(data1, options1);
    };
</script>
@endsection
