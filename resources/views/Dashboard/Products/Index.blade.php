@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Producto</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Products</li>
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
                                    <a class="nav-link active" type="button" href="{{ route('Products.Create') }}">
                                        <i class="fas fa-user-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table  class="table table-bordered table-hover dataTable dtr-inline nowrap w-100">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>REFERENCIA</th>
                                            <th>NOMBRE</th>
                                            <th>DESCRIPCION</th>
                                            <th>TALLA</th>
                                            <th>COLOR</th>
                                            <th>PRECIO COMPRA </th>
                                            <th>PRECIO VENTA</th>
                                            <th>STOCK</th>
                                            <th>CATEGORIA</th>
                                            <th>PROVEEDOR</th>
                                            <th>ACCIONES</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->reference }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->size }}</td>
                                            <td>{{ $product->color }}</td>
                                            <td>{{ $product->purchase_price }}</td>
                                            <td>{{ $product->sale_price }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->provider->name }}</td>

                                            <td>
                                                <a class="nav-link active" type="button" href="{{ route('Products.Edit', $product->id) }}">
                                                    <i class="fas fa-pencil"></i>
                                                </a>
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
@endsection
