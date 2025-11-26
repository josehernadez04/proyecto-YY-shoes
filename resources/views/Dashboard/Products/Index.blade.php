@extends('Templates.Dashboard')

@section('content')

    {{-- Header de la página --}}
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row align-items-center mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-weight: 600;">Productos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">Products</li>
                        <li class="breadcrumb-item active">Index</li>
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
            <div class="row">
                <div class="col-12">
                    

                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="card-title mb-0">Listado de productos</h3>

                            <a href="{{ route('Products.Create') }}"
                            class="btn btn-primary btn-sm rounded-pill shadow-sm ml-auto" title="Nuevo producto">
                                <i class="fas fa-plus "></i>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="productsTable"
                                       class="table table-striped table-hover align-middle w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Referencia</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Color</th>
                                            <th>Precio compra</th>
                                            <th>Precio venta</th>
                                            <th>Stock</th>
                                            <th>Categoría</th>
                                            <th>Proveedor</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($products as $product)
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

                                                <td class="text-center">
                                                    {{-- Botón para expandir tallas --}}
                                                    <button
                                                        class="btn btn-success btn-sm expand-row rounded-pill"
                                                        data-id="{{ $product->id }}"
                                                        data-product='@json($product)'
                                                        onclick="expandRow(this)"
                                                        title="Ver tallas / stock">
                                                        <i class="fas fa-plus"></i>
                                                    </button>

                                                    {{-- Botón editar --}}
                                                    <a class="btn btn-outline-primary btn-sm rounded-pill"
                                                       href="{{ route('Products.Edit', $product->id) }}"
                                                       title="Editar producto">
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
    // DataTable para productos
    let table = $('#productsTable').DataTable({
        paging: true,
        searching: true,
        info: true,
        autoWidth: false,
        responsive: true,
        scrollX: false, // ayuda con el tema del scroll horizontal
        rowCallback: function(row) {
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

        let product = $(btn).data('product');
        if (typeof product === "string") {
            product = JSON.parse(product);
        }

        let nextRow = tr.next('.sizes-row');

        if (nextRow.length > 0) {
            nextRow.slideUp(200, function() {
                $(this).remove();
            });

            button.removeClass("btn-danger").addClass("btn-success")
                  .html('<i class="fas fa-plus"></i>');
        } else {
            let sizesMap = { 34:0, 35:0, 36:0, 37:0, 38:0, 39:0, 40:0, 41:0, 42:0, 43:0 };

            product.details.forEach(d => {
                sizesMap[d.size] = d.stock;
            });

            let html = `
                <tr class="sizes-row">
                    <td colspan="11" class="p-0">
                        <table class="table table-striped table-hover align-middle mb-0 inner-sizes-table">
                            <thead style="background-color: #8a5cf686; color: white;">
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
