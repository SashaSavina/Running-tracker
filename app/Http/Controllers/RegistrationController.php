<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function save(Request $request)
    {
    
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = User::create([ // Используем User::create() для создания нового пользователя
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'password' => Hash::make($request->input('password')), // Используем Hash::make() для хеширования пароля
            'date_of_birth' => $request->input('date_of_birth'),
            'gender' => $request->input('gender'),
            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
        ]);

        Auth::login($user);
        return redirect('/show/profile');
    }


}
