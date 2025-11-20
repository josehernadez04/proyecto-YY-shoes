@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Crear Ventas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Sales</li>
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
                            <form action="{{ route('Sales.Store') }}" method="post">
                                @csrf
                                <div class="form-group c_form_group">
                                    <label for="name">Cantidad</label>
                                    <input type="number" class="form-control" id="count" name="count" placeholder=" cantidad " required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="description">Precio unitario</label>
                                    <input type="number" class="form-control" id="unit_price" name="unit_price" placeholder="precio unitario" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="description">Subtotal</label>
                                    <input type="number" class="form-control" id="subtotal" name="subtotal" placeholder="subtotal" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="description">Producto</label>
                                    <select class="form-control" name="product_id" id="product_id">
                                        <option selected disabled>Seleccione</option>
                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Guardar"/>
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
