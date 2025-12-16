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
                            <li class="breadcrumb-item">Sale</li>
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
                                    <a class="nav-link active" type="button"
                                        href="{{ route('Sales.Details.Create', ['sale_id' => $sale->id]) }}">
                                        AGREGAR DETALLE
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover dataTable dtr-inline nowrap w-100 pb-4">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="6" class="text-center">FACTURA DE VENTA | N° FACTURA:
                                                {{ $sale->code }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th colspan="6" class="text-center">DATOS DEL CLIENTE</th>
                                        </tr>
                                        <tr>
                                            <th>Nombre</th>
                                            <td>{{ $sale->client->name }}</td>
                                            <th>Tipo de documento</th>
                                            <td>{{ $sale->client->type_document->code }}</td>
                                            <th>Documento</th>
                                            <td>{{ $sale->client->document }}</td>
                                        </tr>
                                        <tr>
                                            <th>Telefono</th>
                                            <td>{{ $sale->client->phone }}</td>
                                            <th>Dirección</th>
                                            <td>{{ $sale->client->address }}</td>
                                            <th>Correo</th>
                                            <td>{{ $sale->client->email }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="6" class="text-center">DATOS DEL USUARIO VENDEDOR</th>
                                        </tr>
                                        <tr>
                                            <th>Nombre</th>
                                            <td>{{ $sale->user->name }}</td>
                                            <th>Tipo de documento</th>
                                            <td>{{ $sale->user->type_document->code }}</td>
                                            <th>Documento</th>
                                            <td>{{ $sale->user->document }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table id="salesTable"
                                    class="table table-bordered table-hover dataTable dtr-inline nowrap w-100 pt-4">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Precio</th>
                                            <th>Subtotal</th>
                                            <th>Referencia</th>
                                            <th>Color</th>
                                            <th>Total</th>
                                            @foreach ($tallas as $talla)
                                                <th>T{{ $talla }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sale->details->pluck('product')->unique() as $product)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>${{ number_format($product->purchase_price, 2) }}</td>
                                                <td>${{ number_format($product->purchase_price * $sale->details->where('product_id', $product->id)->sum('quantity'), 2) }}
                                                </td>
                                                <td>{{ $product->name }}({{ $product->reference }})</td>
                                                <td>{{ $sale->details->where('product_id', $product->id)->pluck('product.color')->unique()->join(', ') }}
                                                </td>
                                                <td>{{ $sale->details->where('product_id', $product->id)->sum('quantity') }}
                                                </td>
                                                @foreach ($tallas as $talla)
                                                    <td>{{ $sale->details->where('product_id', $product->id)->where('size', $talla)->sum('quantity') }}
                                                    </td>
                                                @endforeach
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
@endsection
