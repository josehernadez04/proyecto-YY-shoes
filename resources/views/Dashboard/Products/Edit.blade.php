@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Editar Producto</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Product</li>
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
                            <form action="{{ route('Products.Update', $products->id) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group c_form_group">
                                    <label for="reference">Referencia</label>
                                    <input type="number" class="form-control" id="reference" name="reference"
                                        placeholder="Referencia" value="{{ $products->reference }}" minlength="3"
                                        maxlength="20" required>
                                </div>

                                <div class="form-group c_form_group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Nombre" value="{{ $products->name }}" minlength="3" maxlength="100" required>
                                </div>

                                <div class="form-group c_form_group">
                                    <label for="categories">Categoria</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="" selected disabled>Seleccione</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $products->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group c_form_group">
                                    <label for="providers">Proveedor</label>
                                    <select class="form-control" name="provider_id" id="provider_id">
                                        <option value="" selected disabled>Seleccione</option>
                                        @foreach ($providers as $provider)
                                            <option value="{{ $provider->id }}"
                                                {{ $provider->id == $products->provider_id ? 'selected' : '' }}>
                                                {{ $provider->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group c_form_group">
                                    <label for="description">Descripcion</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        value="{{ $products->description }}" placeholder="Descripcion" minlength="3" maxlength="500" required>
                                </div>

                                <div class="form-group c_form_group">
                                    <label for="color">Color</label>
                                    <input type="text" class="form-control" id="color" name="color"
                                        value="{{ $products->color }}" placeholder="Color" minlength="3" maxlength="20" required>
                                </div>

                                <div class="form-group c_form_group">
                                    <label for="purchase_price">Precio compra</label>
                                    <input type="text" class="form-control" id="purchase_price" name="purchase_price"
                                        value="{{ $products->purchase_price }}" placeholder="Precio compra">
                                </div>

                                <div class="form-group c_form_group">
                                    <label for="sale_price">Precio venta</label>
                                    <input type="text" class="form-control" id="sale_price" name="sale_price"
                                        value="{{ $products->sale_price }}" placeholder="Precio venta">
                                </div>

                                <input type="submit" class="btn btn-primary" value="Guardar" />
                                <a href="{{ route('Products.Index') }}" class="btn btn-secondary">volver</a>

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
