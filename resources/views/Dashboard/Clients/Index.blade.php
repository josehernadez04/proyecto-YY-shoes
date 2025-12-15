@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Clientes</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Clients</li>
                            <li class="breadcrumb-item">Index</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </section>

    @include('Dashboard.Alerts.Success')
    @include('Dashboard.Alerts.Info')
    @include('Dashboard.Alerts.Question')
    @include('Dashboard.Alerts.Warning')
    @include('Dashboard.Alerts.Danger')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" type="button" href="{{ route('Clients.Create') }}">
                                        <i class="fas fa-user-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="clientsTable"
                                    class="table table-bordered table-hover dataTable dtr-inline nowrap w-100">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>NOMBRE COMPLETO</th>
                                            <th>TIPO DOCUMENTO</th>
                                            <th>DOCUMENTO</th>
                                            <th>CORREO ELECTRONICO</th>
                                            <th>TELEFONO</th>
                                            <th>DIRECCION</th>
                                            <th>ESTADO</th>
                                            <th>ACCIONES</th>
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
                                                <td>
                                                    <span class="badge {{ $client->is_active ? 'badge-success' : 'badge-danger' }}">
                                                        {{ $client->is_active ? 'Activo' : 'Inactivo' }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-warning btn-sm"
                                                        href="{{ route('Clients.Edit', $client->id) }}" title="Editar">
                                                        <i class="fas fa-pencil"></i>
                                                    </a>

                                                    <form action="{{ route('Clients.ToggleStatus', $client->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            class="btn btn-sm {{ $client->is_active ? 'btn-danger' : 'btn-success' }}"
                                                            title="{{ $client->is_active ? 'Bloquear cliente' : 'Activar cliente' }}">
                                                            <i
                                                                class="fas {{ $client->is_active ? 'fa-user-slash' : 'fa-user-check' }}"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
