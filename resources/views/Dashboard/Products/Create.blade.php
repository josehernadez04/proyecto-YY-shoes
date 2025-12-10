@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Crear Producto</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">product</li>
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
                            <form action="{{ route('Products.Store') }}" method="post">
                                @csrf
                                <div class="form-group c_form_group">
                                    <label for="reference">Referencia</label>
                                    <input type="number" class="form-control" id="refence" name="reference"
                                        placeholder="Referencia" minlength="3" maxlength="20" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Nombre " required minlength="3" maxlength="100" required>
                                </div>

                                <div class="form-group c_form_group">
                                    <label for="category_id">Categoría</label>

                                    <div class="d-flex">
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option value="" selected disabled>Seleccione</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                        <button type="button" class="btn btn-success ml-2" data-toggle="modal"
                                            data-target="#modalCreateCategory">
                                            <i class="nav-icon fas fa-list"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group c_form_group">
                                    <label for="provider_id">Proveedores</label>
                                    <div class="d-flex gap-2">
                                        <select class="form-control" name="provider_id" id="provider_id">
                                            <option value="" selected disabled>Seleccione</option>
                                            @foreach ($providers as $provider)
                                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                            @endforeach
                                        </select>

                                        <button type="button" class="btn btn-success ml-2" data-toggle="modal"
                                            data-target="#modalCreateProvider">
                                            <i class="nav-icon fas fa-person-dolly"></i>
                                        </button>
                                    </div>
                                    <small class="text-muted">¿No existe el proveedor? Créalo aquí.</small>
                                </div>

                                <div class="form-group c_form_group">
                                    <label for="description">description</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        placeholder="Descripcion" minlength="3" maxlength="500" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="color">Color</label>
                                    <input type="text" class="form-control" id="color" name="color"
                                        placeholder="Color" minlength="3" maxlength="20" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="purchase_price">Precio compra</label>
                                    <input type="number" class="form-control" id="purchase_price" name="purchase_price"
                                        placeholder="Precio compra" required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="sale_price">Precio venta</label>
                                    <input type="number" class="form-control" id="sale_price" name="sale_price"
                                        placeholder="Precio venta" required>
                                </div>


                                <input type="submit" class="btn btn-primary" value="Guardar" />

                                <a href="{{ route('Products.Index') }}" class="btn btn-secondary">
                                    Volver
                                </a>
                            </form>

                            {{-- =============================================================
                                                  MODAL CATEGORIA
                            ================================================================== --}}

                            <div class="modal fade" id="modalCreateCategory" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title">Crear Categoría</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                            <form id="formCreateCategory">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Nombre de la categoría</label>
                                                    <input type="text" class="form-control" name="name"
                                                        minlength="3" maxlength="100" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Descripción</label>
                                                    <input type="text" class="form-control" name="description"
                                                        minlength="3" maxlength="500" required>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button class="btn btn-primary" onclick="saveCategory()">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- =============================================================
                                               MODAL PROVEEDOR
                            ================================================================== --}}
                            <div class="modal fade" id="modalCreateProvider" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title">Crear Proveedor</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                            <form id="formCreateProvider">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Nombre del proveedor</label>
                                                    <input type="text" class="form-control" name="name"
                                                        minlength="3" maxlength="100" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Tipo de Documento</label>
                                                    <select class="form-control" name="type_document_id" required>
                                                        @foreach ($typeDocuments as $doc)
                                                            <option value="{{ $doc->id }}">{{ $doc->code }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Número de documento</label>
                                                    <input type="text" class="form-control" name="document" required
                                                        minlength="3" maxlength="20">
                                                </div>

                                                <div class="form-group">
                                                    <label>Teléfono</label>
                                                    <input type="text" class="form-control" name="phone" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Dirección</label>
                                                    <input type="text" class="form-control" name="address"
                                                        minlength="3" maxlength="100">
                                                </div>
                                            </form>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button class="btn btn-primary" onclick="saveProvider()">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    function saveCategory() {
    const form = document.getElementById('formCreateCategory');
    const data = new FormData(form);

    fetch("{{ route('Categories.AjaxStore') }}", {
    method: "POST",
    body: data
    })
    .then(response => response.json())
    .then(result => {

    if (!result.success) {
    alert("Error al crear la categoría");
    return;
    }

    let category = result.category;

    // 👉 Agregar opción al select
    const select = document.getElementById('category_id');
    const option = new Option(category.name, category.id, true, true);
    select.add(option);

    // 👉 Cerrar modal
    $('#modalCreateCategory').modal('hide');

    // 👉 Limpiar formulario
    form.reset();
    })
    .catch(error => {
    console.error('Error:', error);
    });
    }


    function saveProvider() {

    const form = document.getElementById('formCreateProvider');
    const data = new FormData(form);

    fetch("{{ route('Providers.AjaxStore') }}", {
    method: "POST",
    body: data
    })
    .then(async response => {

    // Si la respuesta NO es OK → errores de validación
    if (!response.ok) {
    const errorData = await response.json();

    let mensajes = '';
    Object.values(errorData.errors).forEach(errList => {
    errList.forEach(err => mensajes += `• ${err}<br>`);
    });

    Swal.fire({
    icon: 'error',
    title: 'Error de validación',
    html: mensajes,
    confirmButtonColor: '#d33'
    });

    throw new Error("Errores de validación");
    }

    return response.json();
    })
    .then(result => {

    if (!result.success) {
    Swal.fire({
    icon: 'error',
    title: 'No se pudo crear el proveedor',
    text: 'Intente nuevamente.'
    });
    return;
    }

    let provider = result.provider;

    // 👉 Agregar proveedor al select
    const select = document.getElementById('provider_id');
    const option = new Option(provider.name, provider.id, true, true);
    select.add(option);

    // 👉 Cerrar modal
    $('#modalCreateProvider').modal('hide');

    // 👉 Limpiar formulario
    form.reset();

    // 👉 Notificación
    Swal.fire({
    icon: 'success',
    title: 'Proveedor creado',
    text: `El proveedor ${provider.name} fue agregado correctamente.`,
    timer: 1500,
    showConfirmButton: false
    });
    })
    .catch(error => {
    console.error('Error:', error);
    });
    }
@endsection
