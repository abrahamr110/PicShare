<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function showLogin() {
        return view('user_views.login');
    }

    public function showRegister() {
        return view('user_views.register');
    }
    public function doLogin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'El campo Email es requerido',
            'email.email' => 'El campo Email debe ser un correo electrónico válido',
            'password.required' => 'El campo Contraseña es requerido',
            'password.min' => 'El campo Contraseña debe tener al menos 6 caracteres',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Sesión iniciada.');
        } else {
            return redirect()->back()->with('error', 'Credenciales incorrectas.');
        }
    }

    public function doRegister(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'El campo Nombre es requerido',
            'email.required' => 'El campo Email es requerido',
            'email.email' => 'El campo Email debe ser un correo electrónico válido',
            'email.unique' => 'Este correo ya está registrado',
            'password.required' => 'El campo Contraseña es requerido',
            'password.min' => 'El campo Contraseña debe tener al menos 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->route('home')->with('success', 'Registro exitoso.');
    }

    public function doLogout() {
        Auth::logout();
        return redirect()->route('user.showLogin')->with('success', 'Sesión cerrada.');
    }


    public function showDashboard()
    {
        if (Auth::check()) {
            $user = Auth::user();
            dd($user);
            return view('user_views.dashboard', compact('user'));
        } else {
            return redirect()->route('user.showLogin');
        }
    }
}