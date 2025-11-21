@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Compras</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Shopping</li>
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
                                    <a class="nav-link active" type="button" href="{{ route('Shopping.Details.Create', ['shopping_id' => $shopping->id]) }}">
                                        AGREAGR DETALLE
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover dataTable dtr-inline nowrap w-100 pb-4">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="6" class="text-center">ORDEN DE COMPRA | SOLICITUD : {{ $shopping->date }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th colspan="6" class="text-center">DATOS DEL PROVEEDOR</th>
                                        </tr>
                                        <tr>
                                            <th>Nombre</th>
                                            <td>{{ $shopping->provider->name }}</td>
                                            <th>Tipo de documento</th>
                                            <td>{{ $shopping->provider->type_document->code }}</td>
                                            <th>Documento</th>
                                            <td>{{ $shopping->provider->document }}</td>
                                        </tr>
                                        <tr>
                                            <th>Telefono</th>
                                            <td>{{ $shopping->provider->phone }}</td>
                                            <th>Dirección</th>
                                            <td>{{ $shopping->provider->address }}</td>
                                            <th>Correo</th>
                                            <td>{{ $shopping->provider->email }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="6" class="text-center">DATOS DEL USUARIO SOLICITA</th>
                                        </tr>
                                        <tr>
                                            <th>Nombre</th>
                                            <td>{{ $shopping->user->name }}</td>
                                            <th>Tipo de documento</th>
                                            <td>{{ $shopping->user->type_document->code }}</td>
                                            <th>Documento</th>
                                            <td>{{ $shopping->user->document }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered table-hover dataTable dtr-inline nowrap w-100 pt-4">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="16" class="text-center">DETALLES ORDEN DE COMPRA</th>
                                        </tr>
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
                                        @foreach ($shopping->details->pluck('product')->unique() as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>${{ number_format($product->purchase_price, 2) }}</td>
                                            <td>${{ number_format($product->purchase_price * $shopping->details->where('product_id', $product->id)->sum('quantity'), 2) }}</td>
                                            <td>{{ $product->name }}({{ $product->reference }})</td>
                                            <td>{{ $shopping->details->where('product_id', $product->id)->pluck('product.color')->unique()->join(', ') }}</td>
                                            <td>{{ $shopping->details->where('product_id', $product->id)->sum('quantity') }}</td>
                                            @foreach ($tallas as $talla)
                                            <td>{{ $shopping->details->where('product_id', $product->id)->where('size', $talla)->sum('quantity') }}</td>
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
@endsection
