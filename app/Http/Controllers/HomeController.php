<?php

namespace App\Http\Controllers;

use App\Models\Jamaah;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            $user = User::count();
            $jamaah = Jamaah::count();
            $wilayah = Wilayah::count();
            return view('components.admin.home', compact('user', 'jamaah', 'wilayah'));
        } elseif (Auth::user()->role == 'Pemimpin') {
            $user = Auth::user()->id;
            $jamaah = Jamaah::where('user_id', $user)->count();
            $wilayah = Wilayah::where('user_id', $user)->count();

            // dd($user, $jamaah, $wilayah);
            return view('components.pemimpin.home', compact('jamaah', 'wilayah'));
        } else {
            return view('components.koordinator.home');
        }
    }
}
