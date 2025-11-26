@extends('Templates.Dashboard')

@section('content')

    {{-- Header de la página --}}
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row align-items-center mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 600;">Crear proveedor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">Proveedores</li>
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
                            <h3 class="card-title mb-0">Datos del proveedor</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('Providers.Store') }}" method="POST" autocomplete="off">
                                @csrf

                                <div class="row">
                                    {{-- Nombre completo --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="name">Nombre completo</label>
                                            <input
                                                type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="name"
                                                name="name"
                                                value="{{ old('name') }}"
                                                placeholder="Nombre completo"
                                                required maxlength="80">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Tipo de documento --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="type_document_id">Tipo de documento</label>
                                            <select
                                                class="form-control @error('type_document_id') is-invalid @enderror"
                                                name="type_document_id"
                                                id="type_document_id"
                                                required>
                                                <option value="" disabled {{ old('type_document_id') ? '' : 'selected' }}>
                                                    Seleccione
                                                </option>
                                                @foreach ($typeDocuments as $typeDocument)
                                                    <option value="{{ $typeDocument->id }}"
                                                        {{ old('type_document_id') == $typeDocument->id ? 'selected' : '' }}>
                                                        {{ $typeDocument->code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('type_document_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Documento --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="document">Documento</label>
                                            <input
                                                type="text"
                                                class="form-control @error('document') is-invalid @enderror"
                                                id="document"
                                                name="document"
                                                value="{{ old('document') }}"
                                                placeholder="Documento"
                                                required
                                                inputmode="numeric"
                                                pattern="[0-9]*"
                                                minlength="5"
                                                maxlength="20"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                            @error('document')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Teléfono --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="phone">Teléfono</label>
                                            <input
                                                type="text"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                id="phone"
                                                name="phone"
                                                value="{{ old('phone') }}"
                                                placeholder="Teléfono"
                                                inputmode="numeric"
                                                pattern="[0-9]*"
                                                minlength="10"
                                                maxlength="15"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Dirección --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="address">Dirección</label>
                                            <input
                                                type="text"
                                                class="form-control @error('address') is-invalid @enderror"
                                                id="address"
                                                name="address"
                                                value="{{ old('address') }}"
                                                placeholder="Dirección" maxlength="100">
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Correo electrónico --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="email">Correo electrónico</label>
                                            <input
                                                type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="email"
                                                name="email"
                                                value="{{ old('email') }}"
                                                placeholder="correo@ejemplo.com" maxlength="100">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Botones --}}
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="{{ route('Providers.Index') }}"
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
