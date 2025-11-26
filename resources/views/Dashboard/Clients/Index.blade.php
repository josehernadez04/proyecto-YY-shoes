@extends('Templates.Dashboard')

@section('content')

    {{-- Header de la página --}}
    @include('Dashboard.Partials.page-header', [
        'title' => 'Clientes',
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'route' => 'dashboard'],
            ['label' => 'Clients'],
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
                            <h3 class="card-title mb-0">Listado de clientes</h3>

                            <a href="{{ route('Clients.Create') }}"
                            class="btn btn-primary btn-sm rounded-pill shadow-sm ml-auto" title="Nuevo cliente">
                                <i class="fas fa-plus mr-1"></i>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="clientsTable"
                                       class="table table-striped table-hover align-middle w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre completo</th>
                                            <th>Tipo documento</th>
                                            <th>Documento</th>
                                            <th>Correo electrónico</th>
                                            <th>Teléfono</th>
                                            <th>Dirección</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clients as $client)
                                            <tr>
                                                <td>{{ $client->id }}</td>
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->type_document->code }}</td>
                                                <td>{{ $client->document }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->phone }}</td>
                                                <td>{{ $client->address }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('Clients.Edit', $client->id) }}"
                                                       class="btn btn-outline-primary btn-sm rounded-pill"
                                                       title="Editar cliente">
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
    let table = $('#clientsTable').DataTable({
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
