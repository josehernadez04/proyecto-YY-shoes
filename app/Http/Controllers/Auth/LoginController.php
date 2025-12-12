<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * 🔐 Sobrescribimos el intento de login
     * para detectar usuarios bloqueados
     */
    protected function attemptLogin(Request $request)
    {
        $username = $this->username(); // email por defecto

        // Buscar usuario por email (o username)
        $user = User::where($username, $request->input($username))->first();

        // 🔴 Usuario existe pero está inactivo
        if ($user && !$user->is_active) {
            abort(
                redirect()
                    ->back()
                    ->withErrors([
                        $username => 'Usuario bloqueado, comunícate con el administrador del sistema.'
                    ])
            );
        }

        // Login normal
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    /**
     * Credenciales normales
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }
}
