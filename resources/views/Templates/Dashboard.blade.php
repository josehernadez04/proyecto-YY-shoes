<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ Auth::user()->id }}">
    <meta name="business-id" content="{{ Auth::user()->business_id }}">
    <meta name="title" content="{{ Auth::user()->title }}">
    <title>Y&Y Shoes | Panel</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Font Awesome 7 Pro (si lo usas) -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.1.0/css/sharp-light.css">

    <!-- Boxicons (para unificar con el login si quieres usarlos aquí también) -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('css/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('css/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('css/plugins/toastr/toastr.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('css/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('css/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('css/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('css/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Chosen Choise -->
    <link rel="stylesheet" href="{{ asset('css/plugins/chosen-choise/main_choices.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/chosen-choise/chosen.min.css') }}">
    <!-- Tablas -->
    <link rel="stylesheet" href="{{ asset('css/plugins/table/table.css') }}">
    <!-- FullCalendar -->
    <link rel="stylesheet" href="{{ asset('css/plugins/fullcalendar/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/fullcalendar-daygrid/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/fullcalendar-timegrid/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/fullcalendar-bootstrap/main.min.css') }}">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ asset('css/plugins/ekko-lightbox/ekko-lightbox.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('css/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('css/plugins/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/select2-bootstrap4-theme/select2-bootstrap4.css') }}">
    <!-- Dropify -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dropify/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/dropify/dropify.min.css') }}">
    <!-- Dropzone -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dropzone/dropzone.min.css') }}">

    <!-- Custom CSS del proyecto -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Auto completar JQuery Search -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.min.css" rel="stylesheet" />

    <!-- Fuente: Poppins, para unificar con el login -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --yy-primary: #8b5cf6 !important;
            --yy-primary-dark: #4c1d95 !important;
            --yy-primary-soft: #eef2ff !important;
            --yy-bg-soft: #f3f4f6 !important;
            --yy-border-soft: #e5e7eb !important;
        }

        * {
            box-sizing: border-box !important;
        }

        html,
        body {
            overflow-x: hidden !important;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background-color: var(--yy-bg-soft);
            font-size: 0.8rem !important;
        }

        .wrapper {
            min-height: 100vh !important;
            overflow-x: hidden !important;
        }

        /* NAVBAR */
        .main-header.navbar {
            background-color: #ffffff !important;
            border-bottom: 1px solid var(--yy-border-soft) !important;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.06) !important;
            color: #111827 !important;
        }

        .main-header .nav-link {
            color: #6b7280 !important;
            font-size: 0.9rem !important;
        }

        .main-header .nav-link:hover {
            color: var(--yy-primary) !important;
        }

        .navbar-nav .form-control-navbar {
            border-radius: 999px !important;
            border: 1px solid var(--yy-border-soft) !important;
            padding-left: 14px !important;
            font-size: 0.85rem !important;
            background-color: #f9fafb !important;
        }

        .navbar-nav .form-control-navbar:focus {
            background-color: #ffffff !important;
            border-color: var(--yy-primary) !important;
            box-shadow: 0 0 0 1px rgba(139, 92, 246, 0.2) !important;
        }

        .navbar-nav .btn-navbar {
            border-radius: 999px !important;
            border: none !important;
            background: var(--yy-primary) !important;
            color: #ffffff !important;
        }

        .navbar-nav .btn-navbar:hover {
            background: var(--yy-primary-dark) !important;
        }

        /* SIDEBAR */
        .main-sidebar {
            background: radial-gradient(circle at 0 0, #ffffff 0, #f9fafb 45%, #e5edff 100%) !important;
            box-shadow: 6px 0 28px rgba(15, 23, 42, 0.08) !important;
            border-right: 1px solid var(--yy-border-soft) !important;
        }

        .brand-link {
            border-bottom: 1px solid var(--yy-border-soft) !important;
            background-color: #ffffff !important;
            display: flex !important;
            align-items: center !important;
            gap: 10px !important;
        }

        .brand-link .brand-image {
            border-radius: 12px !important;
            box-shadow: 0 4px 8px rgba(15, 23, 42, 0.15) !important;
            object-fit: contain !important;
            background: #f9fafb !important;
        }

        .brand-text {
            font-weight: 600 !important;
            letter-spacing: 0.03em !important;
            color: #111827 !important;
        }

        .sidebar .user-panel .info a {
            color: #111827 !important;
            font-size: 0.86rem !important;
            font-weight: 500 !important;
        }

        .sidebar .user-panel .info a:hover {
            color: var(--yy-primary-dark) !important;
        }

        /* MENÚ LATERAL (sin lunas, sin ::before raros) */
        .nav-sidebar > .nav-item {
            margin: 2px 6px !important;
        }

        .nav-sidebar .nav-link {
            border-radius: 999px !important;
            margin: 2px 6px !important;
            font-size: 0.85rem !important;
            color: #4b5563 !important;
            padding: 7px 12px !important;
            display: flex !important;
            align-items: center !important;
            transition: background 0.18s ease, color 0.18s ease !important;
        }

        .nav-sidebar .nav-link i.nav-icon {
            font-size: 1rem !important;
            margin-right: 8px !important;
        }

        /* 🔹 Eliminamos cualquier pseudo-elemento que genere “lunas” */
        .nav-sidebar .nav-link::before,
        .nav-sidebar .nav-treeview .nav-link::before {
            content: none !important;
        }

        .nav-sidebar .nav-link:hover {
            background: #eef2ff !important;
            color: #111827 !important;
        }

        .nav-sidebar .nav-link.active {
            background: linear-gradient(90deg, var(--yy-primary), var(--yy-primary-dark)) !important;
            color: #ffffff !important;
            box-shadow: 0 8px 18px rgba(129, 140, 248, 0.45) !important;
        }

        .nav-sidebar .nav-link.active i.nav-icon {
            color: #ffffff !important;
        }

        /* SUBMENÚS LIMPIOS */
        .nav-sidebar .nav-treeview {
            border-left: none !important;      /* sin línea curva ni nada */
            margin-left: 0 !important;
            padding-left: 24px !important;     /* solo sangría normal */
        }

        .nav-sidebar .nav-treeview .nav-link {
            border-radius: 999px !important;
            font-size: 0.8rem !important;
            color: #6b7280 !important;
            padding: 6px 10px !important;
        }

        .nav-sidebar .nav-treeview .nav-link i.nav-icon {
            font-size: 0.85rem !important;
            margin-right: 8px !important;
        }

        .nav-sidebar .nav-treeview .nav-link.active {
            background: #e0e7ff !important;
            color: #111827 !important;
            box-shadow: none !important;
        }

        /* CONTENIDO */
        .content-header h1{
            font-size: 1.15rem !important;
        }
        .content-wrapper {
            background: radial-gradient(circle at top left, #f9fafb 0%, #e5e7eb 100%) !important;
            box-shadow: 0 -10px 25px rgba(15, 23, 42, 0.08) !important;
            overflow-x: hidden !important;
        }

        h1,h2,h3,h4 {
            color: #111827 !important;
            font-weight: 600 !important;
        }

        /* TARJETAS */
        .card {
            position: relative;
            border-radius: 22px !important;
            border: 1px solid var(--yy-border-soft) !important;
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.04) !important;
            background-color: #ffffff !important;
            overflow: hidden !important;
        }

        .card-header {
            position: relative;
            border-radius: 22px 22px 0 0 !important;
            border-bottom: 1px solid var(--yy-border-soft) !important;
            background: linear-gradient(90deg, #f9fafb 0%, var(--yy-primary-soft) 100%) !important;
        }

        .card-header .card-title {
            position: relative !important;
            padding-left: 14px !important;
            font-weight: 600 !important;
            color: #111827 !important;
        }

        .card-header .card-title::before {
            content: "" !important;
            position: absolute !important;
            left: 0 !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            width: 4px !important;
            height: 18px !important;
            border-radius: 999px !important;
            background: var(--yy-primary) !important;
        }

        .nav-flat.nav-sidebar>.nav-item .nav-treeview .nav-item>.nav-link, .nav-flat.nav-sidebar>.nav-item>.nav-treeview .nav-item>.nav-link {
            border-left: none !important;
        }

        /* FOOTER */
        .main-footer {
            background: #ffffff !important;
            color: #6b7280 !important;
            border-top: 1px solid var(--yy-border-soft) !important;
            box-shadow: 0 -4px 12px rgba(15, 23, 42, 0.04) !important;
            font-size: 0.8rem !important;
        }

        .main-footer a {
            color: var(--yy-primary-dark) !important;
            font-weight: 500 !important;
        }

        .main-footer a:hover {
            color: #111827 !important;
        }

        /* FORM GROUP REUTILIZABLE */
        .c_form_group {
            border: 1px solid var(--yy-border-soft) !important;
            text-align: left !important;
            padding: 10px !important;
            border-radius: 10px !important;
            background-color: #ffffff !important;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none !important;
            margin: 0 !important;
        }

        @media (max-width: 767.98px) {
            .content-wrapper {
                border-radius: 18px 18px 0 0 !important;
                margin-top: 5px !important;
            }

            .main-header .form-inline {
                display: none !important;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button" id="SideBarButton">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/Dashboard" class="nav-link">Inicio</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3 d-none d-md-block">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Buscar..."
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Logout -->
            <li class="nav-item">
                <a class="nav-link" style="cursor: pointer;" onclick="document.logout.submit();"
                   title="Cerrar sesión">
                    <i class="fas fa-power-off"></i>
                </a>
                <form name="logout" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            <!-- Control Sidebar -->
            <!-- <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                   role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li> -->
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4 sidebar-dark-lightblue">
        <!-- Brand Logo -->
        <a href="/Dashboard" class="brand-link">
            <img src="{{ asset('images/logo.png') }}" alt="Y&Y Shoes Logo"
                 class="brand-image elevation-3"
                 style="opacity:.95; width:42px; height:42px;">
            <span class="brand-text font-weight-light">Y&Y Shoes</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ auth()->user()->profilePhoto ? auth()->user()->profilePhoto->url : asset('css/dist/img/avatar.png') }}"
                         class="img-circle elevation-2"
                         onerror="this.src='{{ asset('css/dist/img/user2-160x160.jpg') }}'"
                         alt="User Image">
                </div>

                <div class="info">
                    <a href="/Dashboard/Profile/Index" class="d-block">
                        {{ Auth::user()->name . ' ' . Auth::user()->last_name }}
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent"
                    data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="/Dashboard"
                           class="nav-link {{ Request::route()->getName() === 'Dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    @foreach ($items as $item)
                        <li class="nav-item has-treeview {{ in_array(Request::route()->getName(), $item->submodules->pluck('permission')->toArray()) ? 'menu-open' : '' }}">
                            <a href="#"
                               class="nav-link {{ in_array(Request::route()->getName(), $item->submodules->pluck('permission')->toArray()) ? 'active' : '' }}">
                                <i class="{{ 'nav-icon '.$item->icon }}"></i>
                                <p>
                                    {{ $item->name }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach ($item->submodules as $subitem)
                                    <li class="nav-item">
                                        <a href="{{ $subitem->url }}"
                                           class="nav-link {{ Request::route()->getName() === $subitem->permission ? 'active' : '' }}">
                                            <i class="{{ 'nav-icon '.$subitem->icon }}"></i>
                                            <p>{{ $subitem->name }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) si lo necesitas
        <section class="content-header">
            ...
        </section>
        -->

        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong>Copyright &copy; {{ \Carbon\Carbon::now()->format('Y') }} <a>Y&Y Shoes</a>.</strong>
        Todos los derechos reservados.
        <div class="float-right d-none d-sm-inline-block">
            <b>Versión</b> 1.0.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Contenido extra -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('js/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('js/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('js/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('js/jqvmap/maps/jquery.vmap.world.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('js/moment/moment.min.js') }}"></script>
<script src="{{ asset('js/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('js/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('js/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('js/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/dist/js/adminlte.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('js/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('js/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- AdminLTE demo -->
<script src="{{ asset('js/dist/js/demo.js') }}"></script>
<!-- jQuery Mapael -->
<script src="{{ asset('js/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('js/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('js/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('js/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('js/chart.js/Chart.min.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('js/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- FLOT CHARTS -->
<script src="{{ asset('js/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('js/flot-old/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('js/flot-old/jquery.flot.pie.min.js') }}"></script>
<!-- FullCalendar -->
<script src="{{ asset('js/fullcalendar/main.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar-daygrid/main.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar-timegrid/main.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar-interaction/main.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar-bootstrap/main.min.js') }}"></script>
<!-- jquery-validation -->
<script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/jquery-validation/additional-methods.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('js/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('js/toastr/toastr.min.js') }}"></script>
<!-- Chosen Choise -->
<script src="{{ asset('js/chosen-choise/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('js/chosen-choise/choices.min.js') }}"></script>
<!-- Ekko Lightbox -->
<script src="{{ asset('js/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<script src="{{ asset('js/filterizr/jquery.filterizr.min.js') }}"></script>
<!-- DataTables Buttons -->
<script src="{{ asset('js/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/datatables-buttons/js/dataTables.buttons.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script src="{{ asset('js/select2/js/select2.full.min.js') }}"></script>

<!-- Dropify -->
<script src="{{ asset('js/dropify/dropify.js') }}"></script>
<script src="{{ asset('js/dropify/dropify.min.js') }}"></script>

<!-- Dropzone -->
<script src="{{ asset('js/dropzone/dropzone.min.js') }}"></script>

<script src="{{ asset('js/dist/js/Validators.js') }}"></script>

<!-- Auto completar JQuery Search -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.min.js"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $('.select2').select2({
        tags: "true",
        allowClear: true
    });

    $('.dropify').dropify();

    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
</script>

<script>
    @yield('script')
</script>

</body>
</html>
