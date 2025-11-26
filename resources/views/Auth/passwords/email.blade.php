<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Y&Y Shoes | Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- AdminLTE / Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dist/css/adminlte.min.css') }}">

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
            min-height: 460px;
        }

        /* Lado izquierdo */
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
            max-width: 300px;
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

        /* Logo */
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
            padding: 10px 40px 10px 36px;
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

        .invalid-feedback {
            display: block;
            font-size: 0.75rem;
            color: #dc2626;
            margin-top: 4px;
            padding-left: 36px;
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
            margin-bottom: 10px;
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
            margin-top: 6px;
            font-size: 0.75rem;
            text-align: center;
            color: #9ca3af;
        }

        /* Botón / link para volver */
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 999px;
            border: 1px solid #e5e7eb;
            font-size: 0.8rem;
            color: #4b5563;
            text-decoration: none;
            background: #f9fafb;
            transition: background 0.15s ease, transform 0.1s ease, box-shadow 0.1s ease;
            margin-bottom: 16px;
        }

        .back-btn i {
            font-size: 1.1rem;
        }

        .back-btn:hover {
            background: #f3f4f6;
            box-shadow: 0 4px 10px rgba(148, 163, 184, 0.35);
            transform: translateY(-1px);
        }

        /* RESPONSIVE */
        @media (max-width: 960px) {
            .auth-card {
                flex-direction: column;
            }

            .auth-left {
                min-height: 220px;
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
        .auth-btn-secondary {
            width: 100%;
            border-radius: 999px;
            padding: 9px 0;
            font-weight: 500;
            font-size: 0.9rem;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            color: #4b5563;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            transition: background 0.15s ease, transform 0.1s ease, box-shadow 0.1s ease;
        }

        .auth-btn-secondary:hover {
            background: #f3f4f6;
            box-shadow: 0 4px 10px rgba(148, 163, 184, 0.35);
            transform: translateY(-1px);
        }
    </style>
</head>

<body>
<div class="auth-wrapper">
    <div class="auth-card">

        <!-- Lado izquierdo -->
        <div class="auth-left">
            <div>
                <div class="brand-pill">
                    <i class='bx bx-shoe'></i>
                    <span>Y&amp;Y Shoes · Panel interno</span>
                </div>

                <div class="auth-left-main">
                    <h2>¿Olvidaste tu contraseña?</h2>
                    <p>Ingresa tu correo y te enviaremos un enlace para restablecer tu contraseña.</p>

                    <div class="auth-badges">
                        <div class="auth-badge-item">
                            <div class="auth-badge-icon">
                                <i class='bx bx-mail-send'></i>
                            </div>
                            <span>Recibe un enlace de recuperación en pocos segundos.</span>
                        </div>
                        <div class="auth-badge-item">
                            <div class="auth-badge-icon">
                                <i class='bx bx-time-five'></i>
                            </div>
                            <span>El enlace tendrá un tiempo limitado de uso.</span>
                        </div>
                        <div class="auth-badge-item">
                            <div class="auth-badge-icon">
                                <i class='bx bx-check-shield'></i>
                            </div>
                            <span>Proceso seguro para proteger tu cuenta.</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="auth-left-footer">
                © {{ date('Y') }} Y&amp;Y Shoes · Todos los derechos reservados
            </div>
        </div>

        <!-- Lado derecho -->
        <div class="auth-right">
            <div class="logo-yy-wrapper">
                <img src="{{ asset('images/logo.png') }}" alt="Y&Y Shoes" class="logo-yy-img">
            </div>

            <h1 class="auth-title">Recuperar acceso</h1>
            <p class="auth-subtitle">Te enviaremos un enlace para que puedas crear una nueva contraseña.</p>

            @if (session('status'))
                <div class="alert alert-success py-2 px-3" role="alert" style="font-size: 0.8rem;">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST">
                @csrf

                <div class="form-group-custom">
                    <label for="email">Correo Electrónico</label>
                    <div class="input-wrapper">
                        <i class='bx bx-envelope input-icon'></i>
                        <input type="email"
                               id="email"
                               name="email"
                               class="@error('email') is-invalid @enderror"
                               placeholder="correo@ejemplo.com"
                               value="{{ old('email') }}">
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="auth-btn">
                    Solicitar nueva contraseña
                </button>

                <a href="{{ route('login') }}" class="auth-btn-secondary">
                    <i class='bx bx-arrow-back'></i>
                    <span>Volver al inicio de sesión</span>
                </a>

                <p class="auth-footer">
                    Si recuerdas tu contraseña, puedes volver al inicio de sesión desde el botón superior.
                </p>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/dist/js/adminlte.min.js') }}"></script>

</body>
</html>
