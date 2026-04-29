<?php
// app/Http/Controllers/GeositeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeositeController extends Controller
{
    public function Tele()
    {
        return view('geosite.Tele');
    }
    
    public function Efrata()
    {
        return view('geosite.Efrata');
    }
    
    public function Sihotang()
    {
        return view('geosite.Sihotang');
    }
}