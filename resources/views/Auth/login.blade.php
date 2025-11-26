<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Y&Y Shoes | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- AdminLTE / Bootstrap (si los usas en el resto del proyecto) -->
    <link rel="stylesheet" href="css/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/dist/css/adminlte.min.css">

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- Fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background:
                radial-gradient(circle at 0% 0%, rgba(244, 244, 245, 0.06), transparent 60%),
                radial-gradient(circle at 100% 100%, rgba(15, 23, 42, 0.35), transparent 55%),
                linear-gradient(135deg, #c084fc 0%, #8b5cf6 40%, #4c1d95 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 18px;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 1100px;
        }

        .auth-card {
            background: #ffffff;
            border-radius: 32px;
            box-shadow: 0 25px 60px rgba(15, 23, 42, 0.35);
            display: flex;
            overflow: hidden;
            min-height: 520px;
        }

        /* Lado izquierdo (ilustración / branding) */
        .auth-left {
            flex: 1;
            background: radial-gradient(circle at top left, #a855f7, #4c1d95);
            color: #fff;
            padding: 34px 40px 30px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .auth-left::before {
            content: '';
            position: absolute;
            inset: 16px;
            border-radius: 32px;
            border: 1px solid rgba(248, 250, 252, 0.15);
            pointer-events: none;
        }

        .brand-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(15, 23, 42, 0.3);
            font-size: 0.75rem;
            z-index: 1;
        }

        .brand-pill i {
            font-size: 1rem;
        }

        .auth-left-main {
            margin-top: 18px;
            z-index: 1;
        }

        .auth-left h2 {
            font-size: 1.9rem;
            font-weight: 600;
            margin: 0 0 10px;
        }

        .auth-left p {
            font-size: 0.9rem;
            max-width: 290px;
            opacity: 0.9;
            margin: 0;
        }

        .auth-badges {
            margin-top: 24px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .auth-badge-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8rem;
            opacity: 0.96;
        }

        .auth-badge-icon {
            width: 26px;
            height: 26px;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(15, 23, 42, 0.45);
            flex-shrink: 0;
        }

        .auth-badge-icon i {
            font-size: 1.1rem;
        }

        .auth-left-footer {
            font-size: 0.75rem;
            opacity: 0.9;
            z-index: 1;
        }

        /* Lado derecho (formulario) */
        .auth-right {
            flex: 1;
            padding: 40px 52px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Logo más bajo */
        .logo-yy-wrapper {
            height: 90px;
            width: 100%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 6px;
        }

        .logo-yy-img {
            max-height: 80px;
            width: auto;
        }

        .auth-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 999px;
            background: #f3e8ff;
            color: #6b21a8;
            font-size: 0.7rem;
            margin: 0 auto 6px;
        }

        .auth-title {
            font-size: 1.6rem;
            font-weight: 600;
            margin-bottom: 4px;
            color: #111827;
            text-align: center;
        }

        .auth-subtitle {
            font-size: 0.85rem;
            color: #6b7280;
            margin-bottom: 22px;
            text-align: center;
        }

        .form-group-custom {
            margin-bottom: 18px;
        }

        .form-group-custom label {
            font-size: 0.8rem;
            color: #6b7280;
            display: block;
            margin-bottom: 4px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            font-size: 1.1rem;
            color: #8b5cf6;
        }

        .input-wrapper input {
            width: 100%;
            border-radius: 999px;
            border: 1px solid #e5e7eb;
            padding: 10px 36px;
            font-size: 0.9rem;
            outline: none;
            transition: all 0.18s ease;
            background-color: #f9fafb;
        }

        .input-wrapper input:focus {
            border-color: #8b5cf6;
            background-color: #ffffff;
            box-shadow: 0 0 0 1px rgba(139, 92, 246, 0.15);
        }

        .input-wrapper input::placeholder {
            color: #9ca3af;
        }

        .input-wrapper .toggle-password {
            position: absolute;
            right: 12px;
            cursor: pointer;
            font-size: 1.1rem;
            color: #9ca3af;
        }

        .invalid-feedback {
            display: block;
            font-size: 0.75rem;
            color: #dc2626;
            margin-top: 4px;
            padding-left: 36px;
        }

        .auth-extra {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.8rem;
            margin: 12px 0 22px;
        }

        .auth-extra label {
            margin: 0 0 0 4px;
            cursor: pointer;
        }

        .auth-extra a {
            color: #4c1d95;
            text-decoration: none;
        }

        .auth-extra a:hover {
            text-decoration: underline;
        }

        .auth-btn {
            width: 100%;
            border: none;
            border-radius: 999px;
            padding: 10px 0;
            font-weight: 600;
            font-size: 0.95rem;
            background: linear-gradient(90deg, #8b5cf6, #6d28d9);
            color: #fff;
            cursor: pointer;
            transition: transform 0.1s ease, box-shadow 0.1s ease, opacity 0.2s ease;
            box-shadow: 0 10px 25px rgba(109, 40, 217, 0.4);
        }

        .auth-btn:hover {
            opacity: 0.93;
            transform: translateY(-1px);
        }

        .auth-btn:active {
            transform: translateY(1px);
            box-shadow: 0 6px 16px rgba(109, 40, 217, 0.45);
        }

        .auth-footer {
            margin-top: 14px;
            font-size: 0.75rem;
            text-align: center;
            color: #9ca3af;
        }

        /* RESPONSIVE */
        @media (max-width: 960px) {
            .auth-card {
                flex-direction: column;
            }

            .auth-left {
                min-height: 230px;
            }

            .auth-right {
                padding: 30px 26px 28px;
            }
        }

        @media (max-width: 720px) {
            .auth-card {
                border-radius: 24px;
            }

            .auth-left {
                padding: 22px 24px;
            }
        }
    </style>
</head>

<body>
<div class="auth-wrapper">
    <div class="auth-card">

        <div class="auth-left">
            <div>
                <div class="brand-pill">
                    <i class='bx bx-shoe'></i>
                    <span>Y&amp;Y Shoes · Panel interno</span>
                </div>

                <div class="auth-left-main">
                    <h2>Protege tu cuenta</h2>
                    <p>Accede al panel de gestión de Y&amp;Y Shoes y administra tus procesos de forma segura.</p>

                    <div class="auth-badges">
                        <div class="auth-badge-item">
                            <div class="auth-badge-icon">
                                <i class='bx bx-shield-quarter'></i>
                            </div>
                            <span>Autenticación segura para tu organización.</span>
                        </div>
                        <div class="auth-badge-item">
                            <div class="auth-badge-icon">
                                <i class='bx bx-trending-up'></i>
                            </div>
                            <span>Control de procesos y seguimiento en tiempo real.</span>
                        </div>
                        <div class="auth-badge-item">
                            <div class="auth-badge-icon">
                                <i class='bx bx-devices'></i>
                            </div>
                            <span>Acceso desde cualquier dispositivo autorizado.</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="auth-left-footer">
                © {{ date('Y') }} Y&amp;Y Shoes · Todos los derechos reservados
            </div>
        </div>

        <div class="auth-right">
            <div class="logo-yy-wrapper">
                <img src="{{ asset('images/logo.png') }}" alt="Y&Y Shoes" class="logo-yy-img">
            </div>

            <h1 class="auth-title">Inicio de Sesión</h1>
            <p class="auth-subtitle">Ingresa tus credenciales para continuar.</p>

            @if (session('status'))
                <div class="alert alert-success py-2 px-3" role="alert" style="font-size: 0.8rem;">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger py-2 px-3" role="alert" style="font-size: 0.8rem;">
                    Revisa la información suministrada.
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group-custom">
                    <label for="email">Correo Electrónico</label>
                    <div class="input-wrapper">
                        <i class='bx bx-envelope input-icon'></i>
                        <input type="email"
                               id="email"
                               name="email"
                               placeholder="correo@ejemplo.com"
                               value="{{ old('email') }}"
                               class="@error('email') is-invalid @enderror"
                               required autofocus>
                        <i class='bx bx-check-circle' style="display:none"></i>
                    </div>
                    @error('email')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group-custom">
                    <label for="password">Contraseña</label>
                    <div class="input-wrapper">
                        <i class='bx bx-lock-alt input-icon'></i>
                        <input type="password"
                               id="password"
                               name="password"
                               placeholder="********"
                               class="@error('password') is-invalid @enderror"
                               required>
                        <i class='bx bx-hide toggle-password' id="togglePassword"></i>
                    </div>
                    @error('password')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="auth-extra">
                    <div>
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Recuérdame</label>
                    </div>
                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit" class="auth-btn">Iniciar Sesión</button>

                <p class="auth-footer">
                    Solo para personal autorizado de Y&amp;Y Shoes.
                </p>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="js/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="js/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="js/dist/js/adminlte.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput  = document.getElementById('password');

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('bx-show');
                this.classList.toggle('bx-hide');
            });
        }
    });
</script>

</body>
</html>
