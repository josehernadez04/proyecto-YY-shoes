@extends('Templates.Dashboard')

@section('content')

    {{-- Header de la página (usando el partial global) --}}
    @include('Dashboard.Partials.page-header', [
        'title' => 'Ventas',
        'subtitle' => 'Registro y gestión de ventas realizadas.',
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'route' => 'dashboard'],
            ['label' => 'Sales'],
            ['label' => 'Index'],
        ],
    ])

    {{-- Alertas --}}
    @include('Dashboard.Alerts.Success')
    @include('Dashboard.Alerts.Info')
    @include('Dashboard.Alerts.Question')
    @include('Dashboard.Alerts.Warning')
    @include('Dashboard.Alerts.Danger')

    {{-- Contenido principal --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        {{-- Header de la card igual estilo que Usuarios --}}
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title mb-0">Listado de ventas</h3>

                            <a href="{{ route('Sales.Create') }}"
                            class="btn btn-primary btn-sm rounded-pill shadow-sm ml-auto" title="Nueva venta">
                                <i class="fas fa-plus "></i>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="salesTable"
                                       class="table table-striped table-hover align-middle w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Cliente</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sales as $sale)
                                            <tr>
                                                <td>{{ $sale->id }}</td>
                                                <td>{{ $sale->client->name }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('Sales.Edit', $sale->id) }}"
                                                       class="btn btn-outline-primary btn-sm rounded-pill"
                                                       title="Editar venta">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div><!-- /.card -->

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    let table = $('#salesTable').DataTable({
        paging: true,
        searching: true,
        info: true,
        autoWidth: false,
        responsive: true,
        scrollX: false, // ayuda a evitar scroll horizontal forzado
        language: {
            oPaginate: {
                sFirst: 'Primero',
                sLast: 'Último',
                sNext: 'Siguiente',
                sPrevious: 'Anterior',
            },
            info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
            infoEmpty: 'No hay registros para mostrar',
            infoFiltered: '(filtrados de _MAX_ registros en total)',
            emptyTable: 'No hay datos disponibles.',
            lengthMenu: 'Mostrar _MENU_ registros',
            search: 'Buscar:',
            zeroRecords: 'No se encontraron registros.',
            decimal: ',',
            thousands: '.'
        }
    });
@endsection
