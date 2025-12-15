@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">TipoDocumentos</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">TypeDocuments</li>
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
                                    <a class="nav-link active" type="button" href="{{ route('TypeDocuments.Create') }}">
                                        <i class="fas fa-user-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="typeDocumentsTable"
                                    class="table table-bordered table-hover dataTable dtr-inline nowrap w-100">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>CODE</th>
                                            <th>DESCRIPCION</th>
                                            <th>ESTADO</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($typedocuments as $typedocument)
                                            <tr>
                                                <td>{{ $typedocument->id }}</td>
                                                <td>{{ $typedocument->code }}</td>
                                                <td>{{ $typedocument->description }}</td>
                                                {{-- <td>
                                                    <a href="{{ route('TypeDocuments.Edit', $typedocument->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </td> --}}
                                                <td>
                                                    @if ($typedocument->is_active)
                                                        <span class="badge badge-success">Activo</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactivo</span>
                                                    @endif
                                                </td>

                                                <td class="text-center">
                                                    <a class="btn btn-warning btn-sm"
                                                        href="{{ route('TypeDocuments.Edit', $typedocument->id) }}"
                                                        title="Editar">
                                                        <i class="fas fa-pencil"></i>
                                                    </a>

                                                    <form action="{{ route('TypeDocuments.Toggle', $typedocument->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')

                                                        <button type="submit"
                                                            class="btn btn-sm {{ $typedocument->is_active ? 'btn-danger' : 'btn-success' }}"
                                                            title="{{ $typedocument->is_active ? 'Inactivar tipo documento' : 'Activar tipo documento' }}">
                                                            <i
                                                                class="fas {{ $typedocument->is_active ? 'fa-ban' : 'fa-check' }}"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                    </tbody>
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
    {{-- alert('JS CARGADO'); --}}
    let table = $('#typeDocumentsTable').DataTable({
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



    document.querySelectorAll('.toggle-form button').forEach(button => {
    button.addEventListener('click', function (e) {
    e.preventDefault();

    const form = this.closest('form');
    const name = this.dataset.name;
    const action = this.dataset.action;

    Swal.fire({
    title: '¿Estás seguro?',
    html: `Deseas <b>${action}</b> el tipo de documento <br><b>${name}</b>?`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: action === 'inactivar' ? '#d33' : '#28a745',
    cancelButtonColor: '#6c757d',
    confirmButtonText: 'Sí, confirmar',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
    if (result.isConfirmed) {
    form.submit(); // 👈 AQUÍ está la magia
    }
    });
    });
    });
@endsection
