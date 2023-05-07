<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use  RealRashid\SweetAlert\Facades\Alert;

class WilayahController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            $wilayah = Wilayah::orderBy('id', 'desc')->get();
            return view('components.admin.wilayah.index', compact('wilayah'));
        } elseif (Auth::user()->role == 'Pemimpin') {
            $user = Auth::user()->id;
            $wilayah = Wilayah::where('user_id', $user)->get();
            // dd($wilayah->toArray());
            return view('components.pemimpin.wilayah.index', compact('wilayah'));
        } else {
            abort(404);
        }
    }

    public function create()
    {
        $user = User::where('role', '=', 'Pemimpin')->orderBy('name', 'asc')->get();
        if (Auth::user()->role == 'Admin') {
            return view('components.admin.wilayah.create', compact('user'));
        } elseif (Auth::user()->role == 'Pemimpin') {
            return view('components.pemimpin.wilayah.create', compact('user'));
        } else {
            abort(404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_wilayah' => ['required', 'string', 'max:255', 'unique:wilayahs'],
        ]);

        Wilayah::create([
            'nama_wilayah' => $request->nama_wilayah,
            'slug' => Str::slug($request->nama_wilayah),
            'user_id' => $request->user_id
        ]);

        LogActivity::addToLog('Add wilayah');

        Alert::success('Success', 'Create wilayah successfully...');
        return redirect()->route('wilayah.index');
    }

    public function edit($id, $slug)
    {
        $wilayah = Wilayah::where('id', $id)->where('slug', $slug)->first();
        // dd($wilayah->id);
        if (Auth::user()->role == 'Admin') {
            return view('components.admin.wilayah.edit', compact('wilayah'));
        } elseif (Auth::user()->role == 'Pemimpin') {
            return view('components.pemimpin.wilayah.edit', compact('wilayah'));
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id, $slug)
    {
        $request->validate([
            'nama_wilayah' => ['required', 'string', 'max:255', 'unique:wilayahs'],
        ]);

        $wilayah = Wilayah::where('id', $id)->where('slug', $slug)->first();


        $wilayah->update([
            'nama_wilayah' => $request->nama_wilayah,
            'slug' => Str::slug($request->nama_wilayah),
        ]);

        LogActivity::addToLog('Edit wilayah');

        Alert::success('Success', 'Edit wilayah successfully...');

        return redirect()->route('wilayah.index');
    }

    public function destroy($id)
    {
        Wilayah::findOrFail($id)->delete();

        LogActivity::addToLog('Hapus wilayah');

        Alert::error('Delete', 'Delete wilayah successfully...');
        return back();
    }
}
