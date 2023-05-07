<?php

namespace App\Http\Controllers\Koordinator;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Models\BayarNafiIsbat;
use App\Models\Jamaah;
use App\Models\NafiIsbat;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KoordinatorTenderNafiIsbatController extends Controller
{
    public function index()
    {
        $nafiIsbat = NafiIsbat::all();

        return view('components.koordinator.tender-nafi-isbat.index', compact('nafiIsbat'));
    }

    public function show($id, $jamaahId)
    {
        $nafiIsbat = NafiIsbat::with('Jamaah')->where('id', $id)->whereRelation('jamaah', 'slug', $jamaahId)->first();
        $bayarIsbat = BayarNafiIsbat::where('nafi_isbat_id', $id)->orderBy('id', 'desc')->get();

        $totalBayar = $bayarIsbat->sum('bayar');
        $sisa = $nafiIsbat->paketNafiIsbat->paket - $totalBayar;

        // dd($wilayah->toArray());
        return view('components.koordinator.tender-nafi-isbat.show', compact('nafiIsbat', 'bayarIsbat', 'totalBayar', 'sisa'));
    }

    public function store(Request $request)
    {
        $input =  $request->validate([
            'bayar' => 'required',
            'nafi_isbat_id' => 'required'
        ]);

        $input['bayar'] = str_replace(',', '', $input['bayar']);

        BayarNafiIsbat::create($input);

        LogActivity::addToLog('Add Bayar');

        Alert::success('Success', 'Edit bayar suksess...');

        return back();
    }

    public function update(Request $request, $id)
    {
        $bayar = BayarNafiIsbat::findOrFail($id);

        $input =  $request->validate([
            'bayar' => 'required',
        ]);

        $input['bayar'] = str_replace(',', '', $input['bayar']);
        $bayar->update($input);

        LogActivity::addToLog('Edit Bayar');

        Alert::success('Success', 'Edit bayar suksess..');

        return back();
    }

    public function destroy($id)
    {
        BayarNafiIsbat::findOrFail($id)->delete();

        LogActivity::addToLog('Hapus Bayar');

        Alert::error('Delete', 'Hapus bayar suksess..');

        return back();
    }
}
