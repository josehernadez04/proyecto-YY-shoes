@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Crear Compra</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Shopping</li>
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
                            <form action="{{ route('Shoppings.Store') }}" method="post">
                                @csrf
                                <div class="form-group c_form_group">
                                    <label for="name" class="required">Fecha</label>
                                    <input type="datetime-local" class="form-control" id="date" name="date" placeholder=" cantidad " required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="description" class="required">Proveedor</label>
                                    <div class="input-group">
                                        <select class="form-control" name="provider_id" id="provider_id" >
                                            <option selected disabled>Seleccione</option>
                                            @foreach ($providers as $provider)
                                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                            @endforeach
                                        </select>

                                        <!-- Botón crear proveedor -->
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalCreateProvider">
                                                <i class="fas fa-user-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group c_form_group">
                                    <label for="description">Usuario</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Guardar"/>
                                <a href="{{ route('Shoppings.Index') }}" class="btn btn-secondary">Volver</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Crear Proveedor -->
<div class="modal fade" id="modalCreateProvider" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Crear Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form id="formCreateProvider" action="{{ route('Providers.Store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label class="required">Nombre completo</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="required">Tipo de documento</label>
                        <select name="type_document_id" class="form-control" required>
                            <option selected disabled>Seleccione</option>
                            @foreach ($typeDocuments as $doc)
                                <option value="{{ $doc->id }}">{{ $doc->code }} - {{ $doc->description }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required">Documento</label>
                        <input type="number" name="document" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="required">Teléfono</label>
                        <input type="number" name="phone" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="required">Dirección</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="required">Correo Electrónico</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Proveedor</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
@section('script')
$('#formCreateProvider').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        url: $(this).attr('action'),
        method: 'POST',
        data: $(this).serialize(),
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        success: function(response) {

            // Cerrar modal
            $('#modalCreateProvider').modal('hide');

            // Insertar proveedor recién creado en el select
            $('#provider_id').append(
                `<option value="${response.id}" selected>${response.name}</option>`
            );

            Swal.fire({
                icon: 'success',
                title: 'Proveedor creado',
                text: 'El proveedor fue registrado correctamente.',
                timer: 1800,
                showConfirmButton: false
            });

            // limpiar formulario
            $('#formCreateProvider')[0].reset();
            $('#formCreateProvider select').prop('selectedIndex', 0);
        },
        error: function(xhr) {
            let errors = xhr.responseJSON.errors;
            let message = "";

            for (let field in errors) {
                message += `• ${errors[field][0]}<br>`;
            }

            Swal.fire({
                icon: 'error',
                title: 'Error al crear proveedor',
                html: message
            });
        }
    });
});

// limpiar modal al abrir
$('#modalCreateProvider').on('shown.bs.modal', function() {
    $('#formCreateProvider')[0].reset();
    $('#formCreateProvider select').prop('selectedIndex', 0);
});
@endsection
