@extends('Templates.Dashboard')

@section('content')

    {{-- Header de la página --}}
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row align-items-center mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 600;">Crear tipo de documento</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">Tipos de documento</li>
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
                            <h3 class="card-title mb-0">Datos del tipo de documento</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('TypeDocuments.Store') }}" method="POST" autocomplete="off">
                                @csrf

                                <div class="row">
                                    {{-- Código --}}
                                    <div class="col-12 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="code">Código</label>
                                            <input
                                                type="text"
                                                class="form-control @error('code') is-invalid @enderror"
                                                id="code"
                                                name="code"
                                                placeholder="Ej: CC, TI, NIT"
                                                value="{{ old('code') }}"
                                                required maxlength="5">
                                            @error('code')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Descripción --}}
                                    <div class="col-12 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="description">Descripción</label>
                                            <input
                                                type="text"
                                                class="form-control @error('description') is-invalid @enderror"
                                                id="description"
                                                name="description"
                                                placeholder="Descripción del tipo de documento"
                                                value="{{ old('description') }}"
                                                required maxlength="250">
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Botones --}}
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="{{ route('TypeDocuments.Index') }}"
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
