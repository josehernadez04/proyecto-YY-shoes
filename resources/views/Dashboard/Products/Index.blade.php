@extends('Templates.Dashboard')

@section('content')
<section class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Producto</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Products</li>
                        <li class="breadcrumb-item">Index</li>
                    </ol>
                </div>
            </div>
        </div>
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
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('Products.Create') }}">
                                    <i class="fas fa-user-plus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <table id="productsTable" class="table table-bordered table-hover dataTable dtr-inline nowrap w-100">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>REFERENCIA</th>
                                        <th>NOMBRE</th>
                                        <th>DESCRIPCION</th>
                                        <th>COLOR</th>
                                        <th>PRECIO COMPRA</th>
                                        <th>PRECIO VENTA</th>
                                        <th>STOCK</th>
                                        <th>CATEGORIA</th>
                                        <th>PROVEEDOR</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($products as $product)

                                    {{-- FILA PRINCIPAL --}}
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->reference }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->color }}</td>
                                        <td>{{ $product->purchase_price }}</td>
                                        <td>{{ $product->sale_price }}</td>
                                        <td>{{ $product->details->sum('stock') }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->provider->name }}</td>

                                        <td>
                                            <button
                                                class="btn btn-sm btn-success expand-row"
                                                data-id="{{ $product->id }}"
                                                data-product='@json($product)'
                                                onclick="expandRow(this)">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                            <a class="btn btn-warning btn-sm" href="{{ route('Products.Edit', $product->id) }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('script')

// Inicializa DataTable ignorando filas secundarias (child-row)
let table = $('#productsTable').DataTable({
    paging: true,
    searching: true,
    info: true,
    autoWidth: false,
    responsive: true,
    rowCallback: function(row) {
        // si es fila secundaria, DataTable NO la procesa
        if ($(row).data('child') === true) {
            $(row).hide();
        }
    },
    language: {
        oPaginate: {
            sFirst: 'Primero',
            sLast: 'Último',
            sNext: 'Siguiente',
            sPrevious: 'Anterior',
        },
        info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
        infoEmpty: 'No hay registros para mostrar',
        infoFiltered: '(filtrados de _MAX_ registros en total)',
        emptyTable: 'No hay datos disponibles.',
        lengthMenu: 'Mostrar _MENU_ registros',
        search: 'Buscar:',
        zeroRecords: 'No se encontraron registros.',
        decimal: ',',
        thousands: '.'
    }
});

function expandRow(btn) {

    let tr = $(btn).closest('tr');
    let button = $(btn);

    // Obtener JSON desde el atributo data
    let product = $(btn).data('product');

    // Si data-product viene como texto, convertirlo a objeto
    if (typeof product === "string") {
        product = JSON.parse(product);
    }

    // Detectar si ya existe la fila expandida
    let nextRow = tr.next('.sizes-row');

    if (nextRow.length > 0) {

        nextRow.slideUp(200, function() {
            $(this).remove();
        });

        button.removeClass("btn-danger").addClass("btn-success")
              .html('<i class="fas fa-plus"></i>');

    } else {

        // Crear mapa de tallas con default = 0
        let sizesMap = { 34:0, 35:0, 36:0, 37:0, 38:0, 39:0, 40:0, 41:0, 42:0, 43:0 };

        product.details.forEach(d => {
            sizesMap[d.size] = d.stock;
        });

        let html = `
            <tr class="sizes-row" style="background:#f8f9fa;">
                <td colspan="11" class="p-0">
                    <table class="table table-bordered mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Total</th>
                                <th>T34</th>
                                <th>T35</th>
                                <th>T36</th>
                                <th>T37</th>
                                <th>T38</th>
                                <th>T39</th>
                                <th>T40</th>
                                <th>T41</th>
                                <th>T42</th>
                                <th>T43</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>${product.details.reduce((acc, d) => acc + parseInt(d.stock), 0)}</td>
                                <td>${sizesMap[34]}</td>
                                <td>${sizesMap[35]}</td>
                                <td>${sizesMap[36]}</td>
                                <td>${sizesMap[37]}</td>
                                <td>${sizesMap[38]}</td>
                                <td>${sizesMap[39]}</td>
                                <td>${sizesMap[40]}</td>
                                <td>${sizesMap[41]}</td>
                                <td>${sizesMap[42]}</td>
                                <td>${sizesMap[43]}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        `;

        tr.after(html);
        tr.next().hide().slideDown(200);

        button.removeClass("btn-success").addClass("btn-danger")
              .html('<i class="fas fa-minus"></i>');
    }
}


@endsection
