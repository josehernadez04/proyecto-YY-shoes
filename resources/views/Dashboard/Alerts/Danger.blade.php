<style>
    /* === TOASTS GLOBAL === */
    .toast.yy-toast {
        border-radius: 14px !important;
        box-shadow: 0 18px 35px rgba(15, 23, 42, 0.18) !important;
        border: 1px solid rgba(15, 23, 42, 0.06) !important;
        overflow: hidden;
        padding: 0 !important;
        min-width: 320px;
    }

    /* Cabecera */
    .toast.yy-toast .toast-header {
        border-bottom: 0 !important;
        padding: .65rem .85rem !important;
        font-weight: 600;
    }

    /* Cuerpo */
    .toast.yy-toast .toast-body {
        padding: .55rem .85rem .8rem !important;
        font-size: .87rem;
    }

    /* Ícono dentro de la cabecera */
    .toast.yy-toast .toast-header i {
        margin-right: .35rem;
    }

    /* === VARIANTE DANGER === */
    .toast.yy-toast-danger .toast-header {
        background: #fee2e2 !important;
        color: #991b1b !important;
    }

    .toast.yy-toast-danger .toast-body {
        background: #fef2f2 !important;
        color: #b91c1c !important;
    }

    .toast.yy-toast-danger .toast-header i {
        color: #ef4444 !important;
    }
</style>
@if (session('danger') || isset($danger))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dangerMessage = @json(session('danger') ?? $danger);

            $(document).Toasts('create', {
                class: 'yy-toast yy-toast-danger',   // clases nuevas de diseño
                title: 'Error',
                icon: 'fas fa-times-circle',         // icono fontawesome
                body: dangerMessage,
                autohide: true,
                delay: 4000,                         // 4 segundos
                position: 'topRight'                 // esquina superior derecha
            });
        });
    </script>
@endif

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($errors->all() as $error)
                $(document).Toasts('create', {
                    class: 'yy-toast yy-toast-danger',   // mismo diseño para todos los errores
                    title: 'Error de validación',
                    icon: 'fas fa-times-circle',
                    body: @json($error),
                    autohide: true,
                    delay: 4000,
                    position: 'topRight'
                });
            @endforeach
        });
    </script>
@endif
