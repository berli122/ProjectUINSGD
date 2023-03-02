@include('layouts.master')

@section('chart')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fa-solid fa-user" style="color: white"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total User</h4>
                </div>
                <div class="card-body">
                    {{ $juser }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fa-solid fa-diagram-project" style="color: white"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Jabatan</h4>
                </div>
                <div class="card-body">
                    {{ $jabatans }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fa-solid fa-bars-progress" style="color: white"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Lembur</h4>
                </div>
                <div class="card-body">
                    {{ $lemburs }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="float-start text-primary">Ceku</h4>
    </div>
    <div class="card-body">
        <canvas id="myChart" height="100px"></canvas>
    </div>
</div>
@endsection
