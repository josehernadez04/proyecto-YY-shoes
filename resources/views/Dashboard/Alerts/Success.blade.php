<style>
    /* === VARIANTE SUCCESS === */
    .toast.yy-toast-success .toast-header {
        background: #dcfce7 !important;
        color: #166534 !important;
    }

    .toast.yy-toast-success .toast-body {
        background: #f0fdf4 !important;
        color: #15803d !important;
    }

    .toast.yy-toast-success .toast-header i {
        color: #22c55e !important;
    }

</style>
@if (session('success') || isset($success))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = @json(session('success') ?? $success);

            $(document).Toasts('create', {
                class: 'yy-toast yy-toast-success',   // mismo diseño que danger pero en verde
                title: 'Éxito',
                icon: 'fas fa-check-circle',
                body: successMessage,
                autohide: true,
                delay: 4000,                         // 4 segundos
                position: 'topRight'
            });
        });
    </script>
@endif

