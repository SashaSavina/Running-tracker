<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DateTime;


class TrainingController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            $trainings=DB::table('trainings')
                    ->where('users_id',Auth::user()->id)
                    ->get();
                    $bases = DB::table('bases')
                    ->get();
                    $intensives = DB::table('intensives')
                    ->get();
                return view('training', compact('trainings','bases' ,'intensives'));
            } else {
              return view('entrance');
            }
        }
}
