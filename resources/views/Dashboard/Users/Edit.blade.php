@extends('Templates.Dashboard')

@section('content')

    {{-- Header de la página --}}
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row align-items-center mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 600;">Editar usuario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item active">Edit</li>
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
                            <h3 class="card-title mb-0">Datos del usuario</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('Users.Update', $user->id) }}" method="POST" autocomplete="off">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    {{-- Nombre completo --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="name">Nombre completo</label>
                                            <input
                                                type="text"
                                                id="name"
                                                name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Nombre completo"
                                                value="{{ old('name', $user->name) }}"
                                                required>
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
                                                id="type_document_id"
                                                name="type_document_id"
                                                class="form-control @error('type_document_id') is-invalid @enderror"
                                                required>
                                                <option value="" disabled>Seleccione</option>
                                                @foreach ($typeDocuments as $typeDocument)
                                                    <option value="{{ $typeDocument->id }}"
                                                        {{ old('type_document_id', $user->type_document_id) == $typeDocument->id ? 'selected' : '' }}>
                                                        {{ $typeDocument->code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('type_document_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Número de documento --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="document">Número de documento</label>
                                            <input
                                                type="text"
                                                id="document"
                                                name="document"
                                                class="form-control @error('document') is-invalid @enderror"
                                                placeholder="Documento"
                                                value="{{ old('document', $user->document) }}"
                                                required
                                                inputmode="numeric"
                                                pattern="[0-9]*"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.maxLength = 20;">
                                            @error('document')
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
                                                id="email"
                                                name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="correo@ejemplo.com"
                                                value="{{ old('email', $user->email) }}"
                                                required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Teléfono --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="phone_number">Teléfono</label>
                                            <input
                                                type="text"
                                                id="phone_number"
                                                name="phone_number"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                placeholder="Número de teléfono"
                                                value="{{ old('phone_number', $user->phone_number ?? $user->phone) }}"
                                                required maxlength="15"
                                                inputmode="numeric"
                                                pattern="[0-9]*"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                            @error('phone_number')
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
                                                id="address"
                                                name="address"
                                                class="form-control @error('address') is-invalid @enderror"
                                                placeholder="Dirección"
                                                value="{{ old('address', $user->address) }}"
                                                required>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Fecha de nacimiento (si la usas) --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="birthdate">Fecha de nacimiento</label>
                                            <input
                                                type="date"
                                                id="birthdate"
                                                name="birthdate"
                                                class="form-control @error('birthdate') is-invalid @enderror"
                                                value="{{ old('birthdate', $user->birthdate) }}"
                                                max="{{ \Carbon\Carbon::now()->subYears(18)->format('Y-m-d') }}">
                                            @error('birthdate')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Contraseña (opcional) --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="password">Contraseña (dejar en blanco para no cambiar)</label>
                                            <input
                                                type="password"
                                                id="password"
                                                name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Mínimo 6 caracteres">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Confirmación de contraseña (solo si cambia) --}}
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group c_form_group">
                                            <label for="password_confirmation">Confirmar nueva contraseña</label>
                                            <input
                                                type="password"
                                                id="password_confirmation"
                                                name="password_confirmation"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                placeholder="Repite la contraseña">
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                {{-- Botones --}}
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="{{ route('Users.Index') }}"
                                       class="btn btn-outline-secondary btn-sm rounded-pill mr-2">
                                        Cancelar
                                    </a>
                                    <button type="submit"
                                            class="btn btn-primary btn-sm rounded-pill">
                                        <i class="fas fa-save "></i> Guardar cambios
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
