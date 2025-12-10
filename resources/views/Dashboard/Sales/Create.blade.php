@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Crear Ventas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Sales</li>
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
                        <div class="form-group c_form_group">
                            <label for="description">Cliente</label>
                            <div class="input-group">
                                <select class="form-control" name="client_id" id="client_id">
                                    <option selected disabled>Seleccione</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>

                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalCreateClient">
                                        <i class="fas fa-user-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Crear Cliente -->
        <div class="modal fade" id="modalCreateClient" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Crear Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <form id="formCreateClient" action="{{ route('Clients.Store') }}" method="POST">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Nombre completo</label>
                                <input type="text" name="name" class="form-control" minlength="3" maxlength="100" required>
                            </div>
                            <div class="form-group">
                                <label>Tipo de documento</label>
                                <select name="type_document_id" class="form-control" required>
                                    <option selected disabled>Seleccione</option>
                                    @foreach ($typeDocuments as $doc)
                                        <option value="{{ $doc->id }}">{{ $doc->code  }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Documento</label>
                                <input type="text" name="document" class="form-control" minlength="5" maxlength="20" required>
                            </div>

                            <div class="form-group">
                                <label>Correo electrónico</label>
                                <input type="email" name="email" class="form-control" minlength="10" maxlength="50" required>
                            </div>

                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="text" name="phone" class="form-control" minlength="5" maxlength="20" required>
                            </div>

                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" name="address" class="form-control" minlength="5" maxlength="150" required>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cliente</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
</section>
@endsection
@section('script')
$('#formCreateClient').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        url: $(this).attr('action'),
        method: 'POST',
        data: $(this).serialize(),
        success: function(response) {

            // Cerrar la modal
            $('#modalCreateClient').modal('hide');

            // Agregar el cliente al selector
            $('#client_id').append(
                `<option value="${response.id}" selected>${response.name}</option>`
            );

            // SweetAlert de éxito
            Swal.fire({
                icon: 'success',
                title: 'Cliente creado',
                text: 'El cliente se registró correctamente.',
                timer: 1800,
                showConfirmButton: false
            });

            // 🔥 LIMPIAR FORMULARIO DESPUÉS DE CREAR CLIENTE
            $('#formCreateClient')[0].reset();
            // Resetear selects específicamente
            $('#formCreateClient select').prop('selectedIndex', 0);
        },
        error: function(xhr) {
            let errors = xhr.responseJSON.errors;
            let message = '';

            for (const field in errors) {
                message += `• ${errors[field][0]}<br>`;
            }

            Swal.fire({
                icon: 'error',
                title: 'Error al crear cliente',
                html: message,
            });
        }
    });
});

$('#modalCreateClient').on('shown.bs.modal', function() {
    $('#formCreateClient')[0].reset();
    $('#formCreateClient select').prop('selectedIndex', 0);
});
@endsection
