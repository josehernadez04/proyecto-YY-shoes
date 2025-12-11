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

            {{-- 🔹 FILA DE CARDS (por ahora solo COMPRAS) --}}
            <div class="row mb-4">

                {{-- Total Compras --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalCompras }}</h3>
                            <p>Total de Compras</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-truck-loading"></i>
                        </div>
                        <a href="{{ route('Shoppings.Index') }}" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                {{-- Total Ventas --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalVentas }}</h3>
                            <p>Total de Ventas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="{{ route('Sales.Index') }}" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                {{-- Total Productos --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $totalProductos }}</h3>
                            <p>Total de Productos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <a href="{{ route('Products.Index') }}" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                {{-- Total Proveedores --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $totalProveedores }}</h3>
                            <p>Total de Proveedores</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <a href="{{ route('Providers.Index') }}" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>


            {{-- 🔹 FIN FILA CARDS --}}

            {{-- 🔹 FILA DE GRÁFICAS QUE YA TENÍAS --}}
            <div class="row">

                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body" style="height:300px;">
                            <canvas id="productosCategoria"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-body" style="height:300px;">
                            <canvas id="productosMes"></canvas>
                        </div>
                    </div>
                </div>

            </div>
            {{-- 🔹 FIN FILA GRÁFICAS --}}

        </div>
    </section>
@endsection


@section('script')

    @php
        $maxValue = $category->pluck('products_count')->max();
        $maxY = $maxValue + 2;
    @endphp

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
        maintainAspectRatio: false,
        responsive: true,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    stepSize: 1,     // ⭐ Ahora sí funciona en Chart.js 2
                    precision: 0,    // ⭐ Sin decimales
                    max: {{ $maxY }}           // ⭐ Puedes ajustar o calcular dinámico
                },
                gridLines: {
                    color: '#e1e1e1'
                }
            }],
            xAxes: [{
                gridLines: { display: false }
            }]
        },
        legend: {
            display: true,
            position: 'top'
        }
    }
});


    @php
    $maxValueMes = $productosMes->pluck('total')->max();
    $maxYMes = $maxValueMes + 2; // margen superior
@endphp

new Chart(document.getElementById('productosMes'), {
    type: 'bar',  // ⭐ AHORA ES UNA GRÁFICA DE BARRAS
    data: {
        labels: @json($productosMes->pluck('mes')),
        datasets: [{
            label: 'Productos creados por mes',
            data: @json($productosMes->pluck('total')),
            backgroundColor: 'rgba(255, 206, 86, 0.7)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1
        }]
    },
    options: {
        maintainAspectRatio: false,
        responsive: true,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    stepSize: 1,           // ⭐ Enteros
                    precision: 0,          // ⭐ Sin decimales
                    max: {{ $maxYMes }}    // ⭐ Máximo dinámico
                },
                gridLines: { color: "#e1e1e1" }
            }],
            xAxes: [{
                gridLines: { display: false }
            }]
        },
        legend: { position: 'top' },
        tooltips: { enabled: true }
    }
});


@endsection
