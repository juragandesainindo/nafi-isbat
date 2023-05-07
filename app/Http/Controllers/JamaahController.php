<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Http\Requests\JamaahRequest;
use App\Models\Jamaah;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use  RealRashid\SweetAlert\Facades\Alert;

class JamaahController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'Admin') {

            $wilayah = Wilayah::all();
            $jamaah = Jamaah::orderBy('id', 'desc')->get();
            // dd($jamaah->toArray());

            return view('components.admin.jamaah.index', compact('jamaah'));
        } elseif (Auth::user()->role == 'Pemimpin') {

            $a = Auth::user()->id;
            $wilayah = Wilayah::where('user_id', $a)->get();
            // dd($wilayah->toArray());

            return view('components.pemimpin.jamaah.index', compact('wilayah'));
        } else {
            abort(404);
        }
    }

    public function create()
    {
        if (Auth::user()->role == 'Admin') {
            $user = User::where('role', '=', 'Pemimpin')->get();
            return view('components.admin.jamaah.create', compact('user'));
        } else {
            abort(404);
        }
    }

    public function createPemimpin($id, $slug)
    {
        $wilayah = Wilayah::where('id', $id)->where('slug', $slug)->first();
        // dd($wilayah);
        return view('components.pemimpin.jamaah.create', compact('wilayah'));
    }

    public function getWilayah(Request $request)
    {
        $wilayahs = Wilayah::where('user_id', $request->user_id)->get();
        if (count($wilayahs) > 0) {
            return response()->json($wilayahs);
        }
    }

    public function store(JamaahRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('assets/images/jamaah/foto'), $imageName);
            $input['foto'] = $imageName;
        }
        if ($request->hasFile('ktp')) {
            $file = $request->file('ktp');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('assets/images/jamaah/ktp'), $imageName);
            $input['ktp'] = $imageName;
        }

        $input['slug'] = Str::slug($request->nama_jamaah);


        Jamaah::create($input);
        // Jamaah::create($input);

        LogActivity::addToLog('Add jamaah');


        Alert::success('Success', 'Tambah jamaah successfully...');

        return redirect()->route('jamaah.index');
    }

    public function storePemimpin(JamaahRequest $request, $id, $slug)
    {
        $wilayah = Wilayah::where('id', $id)->where('slug', $slug)->first();
        $input =  $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('assets/images/jamaah/foto'), $imageName);
            $input['foto'] = $imageName;
        }
        if ($request->hasFile('ktp')) {
            $file = $request->file('ktp');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('assets/images/jamaah/ktp'), $imageName);
            $input['ktp'] = $imageName;
        }

        $input['slug'] = Str::slug($request->nama_jamaah);


        Jamaah::create($input);
        // Jamaah::create($input);

        LogActivity::addToLog('Add jamaah');


        Alert::success('Success', 'Tambah jamaah successfully...');

        return redirect()->route('jamaah.show', ['id' => $wilayah->id, 'slug' => $wilayah->slug]);
    }

    public function show($id, $slug)
    {
        $jamaah = Jamaah::where('id', $id)->where('slug', $slug)->first();
        if (Auth::user()->role == 'Admin') {
            return view('components.admin.jamaah.show', compact('jamaah'));
        } elseif (Auth::user()->role == 'Pemimpin') {
            $wilayah = Wilayah::where('id', $id)->where('slug', $slug)->first();
            $jamaah = Jamaah::where('wilayah_id', $wilayah->id)->get();
            // dd([$wilayah->toArray(), $jamaah->toArray()]);
            return view('components.pemimpin.jamaah.show', compact('jamaah', 'wilayah'));
        } else {
            abort(404);
        }
    }

    public function detail($id, $slug)
    {
        $jamaah = Jamaah::where('id', $id)->where('slug', $slug)->first();
        return view('components.pemimpin.jamaah.detail', compact('jamaah'));
    }

    public function edit($id, $slug)
    {
        $jamaah = Jamaah::where('id', $id)->where('slug', $slug)->first();
        $user = User::where('role', '=', 'Pemimpin')->get();
        if (Auth::user()->role == 'Admin') {

            return view('components.admin.jamaah.edit', compact('jamaah', 'user'));
        } elseif (Auth::user()->role == 'Pemimpin') {
            return view('components.pemimpin.jamaah.edit', compact('jamaah'));
        } else {
            abort(404);
        }
    }

    public function update(JamaahRequest $request, $id, $slug)
    {
        $jamaah = Jamaah::where('id', $id)->where('slug', $slug)->first();

        $input =  $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("assets/images/jamaah/foto/" . $jamaah->foto)) {
                File::delete("assets/images/jamaah/foto/" . $jamaah->foto);
            }
            $file = $request->file('foto');
            $jamaah->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('assets/images/jamaah/foto'), $jamaah->foto);
            $request['foto'] = $jamaah->foto;
        }

        if ($request->hasFile('ktp')) {
            if (File::exists("assets/images/jamaah/ktp/" . $jamaah->ktp)) {
                File::delete("assets/images/jamaah/ktp/" . $jamaah->ktp);
            }
            $file = $request->file('ktp');
            $jamaah->ktp = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('assets/images/jamaah/ktp'), $jamaah->ktp);
            $request['ktp'] = $jamaah->ktp;
        }

        $input['foto'] = $jamaah->foto;
        $input['ktp'] = $jamaah->ktp;
        $input['slug'] = Str::slug($jamaah->nama_jamaah);

        $jamaah->update($input);

        LogActivity::addToLog('Edit jamaah');


        Alert::success('Success', 'Edit jamaah successfully...');

        return redirect()->route('jamaah.index');
    }

    public function updatePemimpin(JamaahRequest $request, $id, $slug)
    {
        $jamaah = Jamaah::where('id', $id)->where('slug', $slug)->first();

        $input =  $request->validated();

        if ($request->hasFile('foto')) {
            if (File::exists("assets/images/jamaah/foto/" . $jamaah->foto)) {
                File::delete("assets/images/jamaah/foto/" . $jamaah->foto);
            }
            $file = $request->file('foto');
            $jamaah->foto = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('assets/images/jamaah/foto'), $jamaah->foto);
            $request['foto'] = $jamaah->foto;
        }

        if ($request->hasFile('ktp')) {
            if (File::exists("assets/images/jamaah/ktp/" . $jamaah->ktp)) {
                File::delete("assets/images/jamaah/ktp/" . $jamaah->ktp);
            }
            $file = $request->file('ktp');
            $jamaah->ktp = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path('assets/images/jamaah/ktp'), $jamaah->ktp);
            $request['ktp'] = $jamaah->ktp;
        }

        $input['foto'] = $jamaah->foto;
        $input['ktp'] = $jamaah->ktp;
        $input['slug'] = Str::slug($jamaah->nama_jamaah);

        $jamaah->update($input);

        LogActivity::addToLog('Edit jamaah');


        Alert::success('Success', 'Edit jamaah successfully...');

        return redirect()->route('jamaah.show', ['id' => $jamaah->wilayah->id, 'slug' => $jamaah->wilayah->slug]);
    }

    public function destroy($id, $slug)
    {
        $jamaah = Jamaah::where('id', $id)->where('slug', $slug)->first();
        if (File::exists("assets/images/jamaah/foto/" . $jamaah->foto)) {
            File::delete("assets/images/jamaah/foto/" . $jamaah->foto);
        }
        if (File::exists("assets/images/jamaah/ktp/" . $jamaah->ktp)) {
            File::delete("assets/images/jamaah/ktp/" . $jamaah->ktp);
        }

        $jamaah->delete();

        LogActivity::addToLog('Delete jamaah');


        Alert::success('Success', 'Hapus jamaah successfully...');

        return back();
    }
}
