@extends('Templates.Dashboard')

@section('content')

    {{-- Header de la página --}}
    @include('Dashboard.Partials.page-header', [
        'title' => 'Proveedores',
        'subtitle' => 'Gestión de proveedores registrados.',
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'route' => 'dashboard'],
            ['label' => 'Providers'],
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
                            <h3 class="card-title mb-0">Listado de proveedores</h3>

                            <a href="{{ route('Providers.Create') }}"
                            class="btn btn-primary btn-sm rounded-pill shadow-sm ml-auto" title="Nueva proveedor">
                                <i class="fas fa-plus mr-1"></i>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="providersTable"
                                       class="table table-striped table-hover align-middle w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre completo</th>
                                            <th>Tipo documento</th>
                                            <th>Documento</th>
                                            <th>Teléfono</th>
                                            <th>Dirección</th>
                                            <th>Correo electrónico</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($providers as $provider)
                                            <tr>
                                                <td>{{ $provider->id }}</td>
                                                <td>{{ $provider->name }}</td>
                                                <td>{{ $provider->type_document->code }}</td>
                                                <td>{{ $provider->document }}</td>
                                                <td>{{ $provider->phone }}</td>
                                                <td>{{ $provider->address }}</td>
                                                <td>{{ $provider->email }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('Providers.Edit', $provider->id) }}"
                                                       class="btn btn-outline-primary btn-sm rounded-pill"
                                                       title="Editar proveedor">
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
    let table = $('#providersTable').DataTable({
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
