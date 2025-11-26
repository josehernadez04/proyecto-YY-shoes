@extends('Templates.Dashboard')

@section('content')

    {{-- Header de la página --}}
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row align-items-center mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 600;">Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

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
                            <h3 class="card-title mb-0">Listado de usuarios</h3>

                            <a href="{{ route('Users.Create') }}"
                            class="btn btn-primary btn-sm rounded-pill shadow-sm ml-auto" title="Nuevo usuario">
                                <i class="fas fa-user-plus mr-1"></i>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="users"
                                       class="table table-striped table-hover align-middle w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre completo</th>
                                            <th>Tipo documento</th>
                                            <th>Documento</th>
                                            <th>Correo electrónico</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->type_document->code }}</td>
                                                <td>{{ $user->document }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('Users.Edit', $user->id) }}"
                                                       class="btn btn-outline-primary btn-sm rounded-pill"
                                                       title="Editar usuario">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- FOOTER con el botón al final --}}
                        

                    </div><!-- /.card -->

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    let table = $('#users').DataTable({
        paging: true,
        searching: true,
        info: true,
        autoWidth: false,
        responsive: true,
        scrollX: false, // evita que Datatables fuerce scroll horizontal
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
