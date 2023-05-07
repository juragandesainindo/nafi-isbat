<?php

namespace App\Http\Controllers\Koordinator;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Models\PaketNafiIsbat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KoordinatorPaketNafiIsbatController extends Controller
{
    public function index()
    {
        $paket = PaketNafiIsbat::orderBy('id', 'desc')->get();
        return view('components.koordinator.paket-nafi-isbat.index', compact('paket'));
    }

    public function create()
    {
        return view('components.koordinator.paket-nafi-isbat.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'paket' => 'required|unique:paket_nafi_isbats',
        ]);

        $input['paket'] = str_replace(',', '', $input['paket']);

        PaketNafiIsbat::create($input);

        LogActivity::addToLog('Add paket');

        Alert::success('Success', 'Tambah paket nafi isbat suksess...');

        return redirect()->route('paket.index');
    }

    public function edit($id, $paket)
    {
        $paket = PaketNafiIsbat::where('id', $id)->where('paket', $paket)->first();
        return view('components.koordinator.paket-nafi-isbat.edit', compact('paket'));
    }

    public function update(Request $request, $id, $paket)
    {
        $paket = PaketNafiIsbat::where('id', $id)->where('paket', $paket)->first();

        $input = $request->validate([
            'paket' => 'required|unique:paket_nafi_isbats',
        ]);

        $input['paket'] = str_replace(',', '', $input['paket']);

        $paket->update($input);

        LogActivity::addToLog('Edit paket');

        Alert::success('Success', 'Edit paket nafi isbat suksess...');

        return redirect()->route('paket.index');
    }
}
