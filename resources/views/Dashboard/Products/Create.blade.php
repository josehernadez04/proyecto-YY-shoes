@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Crear Producto</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">product</li>
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
                            <form action="{{ route('Products.Store') }}" method="post">
                                @csrf
                                <div class="form-group c_form_group">
                                    <label for="reference">Referencia</label>
                                    <input type="number" class="form-control" id="refence" name="reference"
                                        placeholder="Referencia " required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Nombre " required>
                                </div>

                                <div class="form-group c_form_group">
                                    <label for="category_id">Categoria</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="" selected disabled>Seleccione</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group c_form_group">
                                    <label for="provider_id">Provedores</label>
                                    <select class="form-control" name="provider_id" id="provider_id">
                                        <option value="" selected disabled>Seleccione</option>
                                        @foreach ($providers as $provider)
                                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group c_form_group">
                                    <label for="description">description</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        placeholder="Descripcion" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="size">Talla</label>
                                    <input type="number" class="form-control" id="size" name="size"
                                        placeholder="Talla" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="color">Color</label>
                                    <input type="text" class="form-control" id="color" name="color"
                                        placeholder="Color" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="purchase_price">Precio compra</label>
                                    <input type="number" class="form-control" id="purchase_price" name="purchase_price"
                                        placeholder="Precio compra" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="sale_price">Precio venta</label>
                                    <input type="number" class="form-control" id="sale_price" name="sale_price"
                                        placeholder="Precio venta" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="stock">stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock"
                                        placeholder="stock" required>
                                </div>


                                <input type="submit" class="btn btn-primary" value="Guardar" />
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
