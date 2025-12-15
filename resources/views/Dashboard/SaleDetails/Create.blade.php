@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Crear Detalle de Venta</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Sale</li>
                            <li class="breadcrumb-item">Create</li>
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
                            </ul>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Sales.Details.Store') }}" method="post">
                                @csrf

                                <div class="form-group c_form_group" hidden>
                                    <label for="sale_id" class="required">Id venta</label>
                                    <input type="number" class="form-control" id="sale_id" name="sale_id" value="{{ $sale_id }}" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="description" class="required">Producto</label>
                                    <select class="form-control" name="product_id" id="product_id">
                                        <option selected disabled>Seleccione</option>
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}({{ $product->reference }}) - {{ $product->color }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="size" class="required">Talla</label>
                                    <select class="form-control" name="size" id="size">
                                        <option selected disabled>Seleccione</option>
                                        @foreach ($tallas as $talla)
                                        <option value="{{ $talla }}">{{ $talla }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="quantity" class="required">Cantidad</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder=" cantidad " required>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Guardar"/>
                                <a href="{{ route('Sales.Index') }}" class="btn btn-secondary">
                                    Volver
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
