<?php

namespace App\Http\Controllers;

use App\Models\Jamaah;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $jamaah = Jamaah::count();
        $wilayah = Wilayah::count();
        // dd($user, $jamaah, $wilayah);
        return view('components.dashboard', compact('user', 'jamaah', 'wilayah'));
    }
}
