<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function tampilanAdmin()
    {
        return view('tampilanadmin');
    }
}
