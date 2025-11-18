@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Crear Cliente</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Clients</li>
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
                            <form action="{{ route('Clients.Store') }}" method="post">
                                @csrf
                                <div class="form-group c_form_group">
                                    <label for="name">Nombre completo</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre completo" value="{{ old('name') }}" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="type_document_id">Tipos de documento</label>
                                    <select class="form-control" name="type_document_id" id="type_document_id">
                                        <option value="" selected disabled>Seleccione</option>
                                        @foreach ($type_documents as $typeDocument)
                                        <option value="{{ $typeDocument->id }}">{{ $typeDocument->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="document">Documento</label>
                                    <input type="text" class="form-control" id="document" name="document" placeholder="Documento" value="{{ old('document') }}" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="email">Correo Electrónico</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Correo Electrónico" value="{{ old('document') }}">
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="phone">Telefono</label>
                                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="Telefono" value="{{ old('document') }}">
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="address">Direccion</label>
                                    <input type="address" class="form-control" id="address" name="address" placeholder="Direccion" value="{{ old('document') }}">
                                </div>

                                <a href="{{ route('Clients.Index') }}">regresar</a>
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
