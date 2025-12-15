@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Crear Usuario</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Users</li>
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
                            <form action="{{ route('Users.Store') }}" method="post">
                                @csrf
                                <div class="form-group c_form_group">
                                    <label for="name" class="required">Nombre completo</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Nombre completo" minlength="3" maxlength="100" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="type_document_id" class="required">Tipos de documento</label>
                                    <select class="form-control" name="type_document_id" id="type_document_id">
                                        <option value="" selected disabled>Seleccione</option>
                                        @foreach ($typeDocuments as $typeDocument)
                                            <option value="{{ $typeDocument->id }}">{{ $typeDocument->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="document" class="required">Documento</label>
                                    <input type="text" class="form-control" id="document" name="document"
                                        placeholder="Documento" minlength="5" maxlength="20" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="email" class="required">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Correo Electrónico" pattern="^[\w\.\-]+@([\w\-]+\.)+[a-zA-Z]{2,}$"
                                        minlength="10" maxlength="50" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="phone" class="required">Telefono</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="Telefono" minlength="5" maxlength="20" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="address" class="required">Direccion</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Direccion" minlength="5" maxlength="150" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="birthdate" class="required">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" id="birthdate" name="birthdate"
                                        placeholder="Fecha de Nacimiento" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="password" class="required">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Contraseña" required>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Guardar" />
                                <a class=" btn btn-secondary" type="button" href="{{ route('Users.Index') }}">volver</a>
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
