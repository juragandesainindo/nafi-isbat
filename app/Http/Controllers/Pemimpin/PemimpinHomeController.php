<?php

namespace App\Http\Controllers\Pemimpin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemimpinHomeController extends Controller
{
    public function index()
    {
        return view('components.pemimpin.home');
    }
}
