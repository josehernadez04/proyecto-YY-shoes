@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Editar Compra</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Shipping</li>
                            <li class="breadcrumb-item">Edit</li>
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
                            <form action="{{ route('Shopping.Update', $shopping->id) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group c_form_group">
                                    <label for="document">Fecha</label>
                                    <input type="date" class="form-control" id="date" name="date"
                                        placeholder="Fecha" value="{{ old('date', $shopping->date) }}" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="name">Total</label>
                                    <input type="number" class="form-control" id="total" name="total"
                                        placeholder="total" value="{{ old('total', $shopping->total) }}" disabled>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="description">Proveedor</label>
                                    <select class="form-control" name="provider_id" id="provider_id">
                                        <option selected disabled>Seleccione</option>
                                        @foreach ($providers as $provider)
                                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="description">Usuario</label>
                                    <select class="form-control" name="user_id" id="user_id">
                                        <option selected disabled>Seleccione</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Guardar" />
                            </form>
                        </div>
                    </div>
                </div>

                {{-- =======================================
                      FORMULARIO PARA AGREGAR DETALLES
                     ======================================= --}}

                <div class="col-12">
                    <div class="card card-success mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Agregar Detalle</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Shopping.Details.Store', $shopping->id) }}" method="post">
                                @csrf
                                <div class="form-group c_form_group">
                                    <label for="description">Producto</label>
                                    <select class="form-control" name="product_id" id="product_id">
                                        <option selected disabled>Seleccione</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group c_form_group">
                                    <label for="name">Cantidad</label>
                                    <input type="number" class="form-control" id="count" name="count"
                                        placeholder="cantidad" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="name">Precio Unitario</label>
                                    <input type="number" class="form-control" id="unit_price" name="unit_price"
                                        placeholder="precio unitario" required>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Guardar" />
                            </form>
                        </div>
                    </div>
                </div>

                {{-- =======================================
                               TABLA DE  DETALLES
                     ======================================= --}}

                {{-- <div class="col-12">
                    <div class="card card-success mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Detalles</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>{{ $detail->product->name }}</td>
                                            <td>{{ $detail->count }}</td>
                                            <td>{{ $detail->unit_price }}</td>
            </div> --}}
        </div>
    </section>
@endsection
@section('script')
@endsection
