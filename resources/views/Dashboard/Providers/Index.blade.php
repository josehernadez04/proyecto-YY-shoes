@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Proveedores</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Provider</li>
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
                                    <a class="nav-link active" type="button" href={{ route('Providers.Create') }}>
                                        <i class="fas fa-user-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="providersTable" class="table table-bordered table-hover dataTable dtr-inline nowrap w-100">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>NOMBRE COMPLETO</th>
                                            <th>TIPO DOCUMENTO</th>
                                            <th>DOCUMENTO</th>
                                            <th>TELEFONO</th>
                                            <th>DIRECCION</th>
                                            <th>CORREO ELECTRONICO</th>
                                            <th>ESTADO</th>
                                            <th>ACCIONES</th>
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
                                            <td>
                                                <span class="badge {{ $provider->is_active ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $provider->is_active ? 'Activo' : 'Inactivo' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-warning btn-sm" href="{{ route('Providers.Edit', $provider->id) }}" title="Editar">
                                                    <i class="fas fa-pencil"></i>
                                                </a>

                                                <form action="{{ route('Providers.ToggleStatus', $provider->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="btn btn-sm {{ $provider->is_active ? 'btn-danger' : 'btn-success' }}"
                                                        title="{{ $provider->is_active ? 'Bloquear proveedor' : 'Activar proveedor' }}">
                                                        <i class="fas {{ $provider->is_active ? 'fa-user-slash' : 'fa-user-check' }}"></i>
                                                    </button>
                                                </form>
                                            </td>

                                            {{-- <td>
                                                <a class="nav-link active" type="button" href="{{ route('Providers.Edit', $provider->id) }}">
                                                    <i class="fas fa-pencil"></i>
                                                </a>
                                            </td> --}}
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
let table = $('#providersTable').DataTable({
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
