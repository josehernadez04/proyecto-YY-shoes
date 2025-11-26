@extends('Templates.Dashboard')

@section('content')

    {{-- Header de la página --}}
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row align-items-center mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 600;">Crear categoría</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">Categorías</li>
                        <li class="breadcrumb-item active">Crear</li>
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
                            <h3 class="card-title mb-0">Datos de la categoría</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('Categories.Store') }}" method="POST" autocomplete="off">
                                @csrf

                                <div class="row">
                                    {{-- Nombre --}}
                                    <div class="col-12 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="name">Nombre</label>
                                            <input
                                                type="text"
                                                id="name"
                                                name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nombre de la categoría"
                                                value="{{ old('name') }}" maxlength="100"
                                                required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Descripción --}}
                                    <div class="col-12 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="description">Descripción</label>
                                            <textarea
                                                id="description"
                                                name="description"
                                                class="form-control @error('description') is-invalid @enderror"
                                                placeholder="Descripción breve de la categoría"
                                                rows="3" maxlength="250"
                                                required>{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Botones --}}
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="{{ route('Categories.Index') }}"
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
