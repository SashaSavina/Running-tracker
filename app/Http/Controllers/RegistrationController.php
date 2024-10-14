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
            'phone_number' => ['required', 'string', 'max:255'],
            'password' => ['required', 'min:8', 'confirmed'],
            'date_of_birth' => ['required', 'date'],
            'gender' => 'required|in:M,F',
            'height' => ['required', 'integer'],
            'weight' => ['required', 'integer'],
        ]);

        DB::table('users')->insert([
            'name' => request('name'),
            'email' => request('email'),
            'phone_number' => request('phone_number'),
            'password' => bcrypt(request('password')),
            'date_of_birth' => request('date_of_birth'),
            'gender' => request('gender'),
            'height' => request('height'),
            'weight' => request('weight'),
            'created_at' => now(),
        ]);
        return redirect('/');
    }


}
