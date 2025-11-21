@extends('Templates.Dashboard')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Bienvenido</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @include('Dashboard.Alerts.Success')
    @include('Dashboard.Alerts.Info')
    @include('Dashboard.Alerts.Question')
    @include('Dashboard.Alerts.Warning')
    @include('Dashboard.Alerts.Danger')

    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-6">
                    <div class="card card-primary">
                        {{-- <div class="card-header">Productos por Categoría</div> --}}
                        <div class="card-body" style="height:300px;">
                            <canvas id="productosCategoria"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">Ventas por Mes</div>
                        <div class="card-body" style="height:300px;">
                            <canvas id="ventasMes"></canvas>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection

@section('script')

new Chart(document.getElementById('productosCategoria'), {
    type: 'bar',
    data: {
        labels: @json($category->pluck('name')),
        datasets: [{
            label: 'Productos por Categoría',
            data: @json($category->pluck('products_count')),
            backgroundColor: 'rgba(54,162,235,0.7)',
            borderColor: 'rgba(54,162,235,1)',
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,       // 🔥 evita deformación
        responsive: true,                 // 🔥 se adapta al card
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: '#e1e1e1'
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'top'
            },
            tooltip: {
                enabled: true
            }
        }
    }
});

@endsection
