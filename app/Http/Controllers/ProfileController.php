<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DateTime;
 

class ProfileController extends Controller
{

    public function upload(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:2048'], 
        ]);

        $path = $request->file('image')->store('img', 'public'); 

        DB::table('users')->where('id',Auth::user()->id)->update(['photo' => $path]); 

        return redirect()->back();
    }


    public function show()
    {
        if (Auth::check()) {
    $users=DB::table('users')
            ->where('id',Auth::user()->id)
            ->get();
            $pulse_zones = DB::table('pulse_zones')
            ->get();
        return view('profile', compact('users','pulse_zones'));
    } else {
      return view('entrance');
    }
    }

    public function pulse()
    {   
        $today = date('Y-m-d');
        $date_of_birth = date(Auth::user()->date_of_birth);
        $today = date('Y-m-d');
        list($birthYear, $birthMonth, $birthDay) = explode('-', $date_of_birth);
        list($todayYear, $todayMonth, $todayDay) = explode('-', $today);
        $age = $todayYear - $birthYear;
        if ($todayMonth < $birthMonth || ($todayMonth == $birthMonth && $todayDay < $birthDay)) {
            $age--;
        }
        $max=220-$age;
        DB::table('pulse_zones')->insert([
            'users_id' =>Auth::user()->id,
            'Z1' => $max*0.5,
            'Z2' => $max*0.6,
            'Z3' => $max*0.7,
            'Z4' => $max*0.8,
            'Z5' => $max*0.9,
        ]);

        $users=DB::table('users')
            ->where('id',Auth::user()->id)
            ->get();
            $pulse_zones = DB::table('pulse_zones')
            ->get();
        return view('profile', compact('users','pulse_zones'));
    }

    public function index(string $id)
    {
        $users=DB::table('users')
            ->where('id','=',$id)
            ->get();
        return view('profile_edit', compact('users'));
    }


    public function edit(Request $request,string $id)
    {
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('uploads', 'public');
            DB::table('users')->updateOrInsert([
                'photo' => $path,
            ]);
        }
        DB::table('users')->where('id','=',$id)->update([
            'name' => request('name'),
            'email' => request('email'),
            'phone_number' => request('phone_number'),
            'gender' => request('gender'),
            'height' => request('height'),
            'weight' => request('weight'),
            'password' => bcrypt(request('password')),
        ]);
        $users=DB::table('users')
            ->where('id',Auth::user()->id)
            ->get();
            $pulse_zones = DB::table('pulse_zones')
            ->get();
        return view('profile', compact('users','pulse_zones'));
    }


}
