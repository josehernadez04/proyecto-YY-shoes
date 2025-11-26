@extends('Templates.Dashboard')

@section('content')

    {{-- Header de la página --}}
    @include('Dashboard.Partials.page-header', [
        'title' => 'Compras',
        'subtitle' => 'Gestión de compras registradas en el sistema.',
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'route' => 'dashboard'],
            ['label' => 'Shoppings'],
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
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title mb-0">Listado de compras</h3>

                            <a href="{{ route('Shoppings.Create') }}"
                            class="btn btn-primary btn-sm rounded-pill shadow-sm ml-auto" title="Nueva categoría">
                                <i class="fas fa-plus mr-1"></i>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="shoppingsTable"
                                       class="table table-striped table-hover align-middle w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha</th>
                                            <th>Total</th>
                                            <th>Proveedor</th>
                                            <th>Usuario</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($shopping as $purchase)
                                            <tr>
                                                <td>{{ $purchase->id }}</td>
                                                <td>{{ $purchase->date }}</td>
                                                <td>{{ $purchase->total }}</td>
                                                <td>{{ $purchase->provider->name }}</td>
                                                <td>{{ $purchase->user->name }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('Shoppings.Edit', $purchase->id) }}"
                                                       class="btn btn-outline-primary btn-sm rounded-pill"
                                                       title="Editar compra">
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
    let table = $('#shoppingsTable').DataTable({
        paging: true,
        searching: true,
        info: true,
        autoWidth: false,
        responsive: true,
        scrollX: false,
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
