@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Ventas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Sales</li>
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

            <div class="row mb-3">
                <div class="col-6">
                    <h3>Listado de Ventas</h3>
                </div>
                <div class="col-6 text-right">
                    {{-- <a href="{{ route('Sales.Create') }}" class="btn btn-primary">Nueva Venta</a> --}}
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalNewSale">
                        Nueva Venta
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-body table-responsive">
                    <table id="salesTable" class="table table-bordered table-hover dataTable dtr-inline nowrap w-100">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Vendedor</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->id }}</td>
                                    <td>{{ $sale->client->name ?? 'Sin cliente' }}</td>
                                    <td>{{ $sale->user->name }}</td>
                                    <td>{{ $sale->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('Sales.Show', $sale->id) }}" class="btn btn-info btn-sm">
                                            Ver
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
    <!-- Modal Nueva Venta -->
    <div class="modal fade" id="modalNewSale" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Nueva Venta</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <form id="formNewSale" method="POST" action="{{ route('Sales.Store') }}">
                    @csrf
                    <div class="modal-body">

                        <label>Cliente</label>
                        <div class="input-group">
                            <select name="client_id" id="clientNewSale" class="form-control" required>
                                <option selected disabled>Seleccione</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>

                            <!-- BOTÓN PARA CREAR CLIENTE -->
                            <div class="input-group-append">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#modalCreateClient">
                                    <i class="fas fa-user-plus"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Continuar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
@section('script')
    let table = $('#salesTable').DataTable({
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

    $('#formNewSale').on('submit', function(e){
    e.preventDefault();

    $.ajax({
    url: $(this).attr('action'),
    method: 'POST',
    data: $(this).serialize(),
    headers: { 'X-Requested-With': 'XMLHttpRequest' },

    success: function(response){

    // Generar URL correcta usando route()
    let url = "{{ route('Sales.Show', ':id') }}";
    url = url.replace(':id', response.id);

    window.location.href = url;
    },

    error: function(xhr){
    Swal.fire({
    icon: 'error',
    title: 'Error',
    text: 'Debe seleccionar un cliente válido.'
    });
    }
    });
    });
@endsection
