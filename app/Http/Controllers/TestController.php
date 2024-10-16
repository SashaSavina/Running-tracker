<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class TestController extends Controller
    {
        public function index()
        {
            dd(asset('storage/uploads/home.jpg'));
        }
    }
    
