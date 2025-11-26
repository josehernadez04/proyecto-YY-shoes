@extends('Templates.Dashboard')

@section('content')

    {{-- Header de la página --}}
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row align-items-center mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 600;">Editar producto</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">Productos</li>
                        <li class="breadcrumb-item active">Editar</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    {{-- Alertas --}}
    @include('Dashboard.Alerts.Success')
    @include('Dashboard.Alerts.Info')
    @include('Dashboard.Alerts.Question')
    @include('Dashboard.Alerts.Warning')
    @include('Dashboard.Alerts.Danger')

    {{-- Contenido principal --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-xl-12">

                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title mb-0">Datos del producto</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('Products.Update', $products->id) }}"
                                  method="POST" autocomplete="off">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    {{-- Referencia --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="reference">Referencia</label>
                                            <input
                                                type="text"
                                                class="form-control @error('reference') is-invalid @enderror"
                                                id="reference"
                                                name="reference"
                                                placeholder="Referencia"
                                                value="{{ old('reference', $products->reference) }}"
                                                required maxlength="20">
                                            @error('reference')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Nombre --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="name">Nombre</label>
                                            <input
                                                type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="name"
                                                name="name"
                                                placeholder="Nombre del producto"
                                                value="{{ old('name', $products->name) }}"
                                                required maxlength="100">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Categoría --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="category_id">Categoría</label>
                                            <select
                                                class="form-control @error('category_id') is-invalid @enderror"
                                                name="category_id"
                                                id="category_id"
                                                required>
                                                <option value="" disabled>Seleccione</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id', $products->category_id) == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Proveedor --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="provider_id">Proveedor</label>
                                            <select
                                                class="form-control @error('provider_id') is-invalid @enderror"
                                                name="provider_id"
                                                id="provider_id"
                                                required>
                                                <option value="" disabled>Seleccione</option>
                                                @foreach ($providers as $provider)
                                                    <option value="{{ $provider->id }}"
                                                        {{ old('provider_id', $products->provider_id) == $provider->id ? 'selected' : '' }}>
                                                        {{ $provider->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('provider_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="color">Color</label>
                                            <input
                                                type="text"
                                                class="form-control @error('color') is-invalid @enderror"
                                                id="color"
                                                name="color"
                                                value="{{ old('color', $products->color) }}"
                                                placeholder="Color"
                                                maxlength="20">
                                            @error('color')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Precios y stock --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="purchase_price">Precio compra</label>
                                            <input
                                                type="text"
                                                class="form-control @error('purchase_price') is-invalid @enderror"
                                                id="purchase_price"
                                                name="purchase_price"
                                                value="{{ old('purchase_price', $products->purchase_price) }}"
                                                placeholder="0"
                                                maxlength="20"
                                                inputmode="numeric"
                                                pattern="[0-9]*"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                            @error('purchase_price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="sale_price">Precio venta</label>
                                            <input
                                                type="text"
                                                class="form-control @error('sale_price') is-invalid @enderror"
                                                id="sale_price"
                                                name="sale_price"
                                                value="{{ old('sale_price', $products->sale_price) }}"
                                                placeholder="0"
                                                maxlength="20"
                                                inputmode="numeric"
                                                pattern="[0-9]*"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                            @error('sale_price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Descripción --}}
                                    <div class="col-8 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="description">Descripción</label>
                                            <textarea
                                                class="form-control @error('description') is-invalid @enderror"
                                                id="description"
                                                name="description"
                                                placeholder="Descripción del producto"
                                                rows="3"
                                                maxlength="500">{{ old('description', $products->description) }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Botones --}}
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="{{ route('Products.Index') }}"
                                       class="btn btn-outline-secondary btn-sm rounded-pill mr-2">
                                        Cancelar
                                    </a>
                                    <button type="submit"
                                            class="btn btn-primary btn-sm rounded-pill">
                                        <i class="fas fa-save"></i> Guardar
                                    </button>
                                </div>

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
