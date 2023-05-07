<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Models\BayarNafiIsbat;
use App\Models\Jamaah;
use App\Models\NafiIsbat;
use App\Models\PaketNafiIsbat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NafiIsbatController extends Controller
{

    // =================== PAKET ===================
    public function paketIndex()
    {
        $paket = PaketNafiIsbat::orderBy('id', 'desc')->get();

        if (Auth::user()->role == 'Admin') {

            return view('components.admin.nafi-isbat.paket.index', compact('paket'));
        } elseif (Auth::user()->role == 'Koordinator') {
            return view('components.koordinator.nafi-isbat.paket.index', compact('paket'));
        } else {
            abort(404);
        }
    }

    public function paketStore(Request $request)
    {
        $input = $request->validate([
            'paket' => 'required|unique:paket_nafi_isbats',
        ]);

        $input['paket'] = str_replace(',', '', $input['paket']);

        PaketNafiIsbat::create($input);

        LogActivity::addToLog('Add paket');

        return back();
    }

    public function paketUpdate(Request $request, $id)
    {
        $paket = PaketNafiIsbat::findOrFail($id);

        $paket->update($request->all());

        LogActivity::addToLog('Edit paket');

        return back();
    }

    public function paketDestroy($id)
    {
        PaketNafiIsbat::findOrFail($id)->delete();

        LogActivity::addToLog('Hapus paket');

        return back();
    }



    // =================== TENDER ===================
    public function tenderIndex()
    {
        $jamaah = Jamaah::all();
        $paket = PaketNafiIsbat::all();
        $tender = NafiIsbat::all();
        // dd([$jamaah->toArray()]);
        return view('components.admin.nafi-isbat.tender.index', compact('jamaah', 'paket', 'tender'));
    }

    public function tenderCreate()
    {
        $jamaah = Jamaah::all();
        $paket = PaketNafiIsbat::all();
        return view('components.admin.nafi-isbat.tender.create', compact('jamaah', 'paket'));
    }

    public function tenderStore(Request $request)
    {
        $input = $request->validate([
            'jamaah_id' => 'required|unique:nafi_isbats',
            'paket_nafi_isbat_id' => 'required',
        ]);
        NafiIsbat::create($input);

        LogActivity::addToLog('Add tender');

        return redirect()->route('tender-nafi-isbat.tenderIndex');
    }

    public function tenderEdit($id, $jamaahId)
    {
        $nafiIsbat = NafiIsbat::with('Jamaah')->where('id', $id)->whereRelation('jamaah', 'slug', $jamaahId)->first();
        $paket = PaketNafiIsbat::all();

        // dd($nafiIsbat->toArray());
        return view('components.admin.nafi-isbat.tender.edit', compact('nafiIsbat', 'paket'));
    }

    public function tenderUpdate(Request $request, $id, $jamaahId)
    {
        $nafiIsbat = NafiIsbat::with('Jamaah')->where('id', $id)->whereRelation('jamaah', 'slug', $jamaahId)->first();

        $input = $request->validate([
            'paket_nafi_isbat_id' => 'required',
        ]);


        $nafiIsbat->update($input);

        LogActivity::addToLog('Edit tender');

        return redirect()->route('tender-nafi-isbat.tenderIndex');
    }

    public function tenderDestroy($id)
    {
        NafiIsbat::findOrFail($id)->delete();

        LogActivity::addToLog('Edit tender');

        return back();
    }

    // =================== BAYAR ===================
    public function bayarTender($id, $jamaahId)
    {
        $nafiIsbat = NafiIsbat::with('Jamaah')->where('id', $id)->whereRelation('jamaah', 'slug', $jamaahId)->first();
        $bayarIsbat = BayarNafiIsbat::where('nafi_isbat_id', $id)->orderBy('id', 'desc')->get();
        $totalBayar = $bayarIsbat->sum('bayar');
        $sisa = $nafiIsbat->paketNafiIsbat->paket - $totalBayar;
        // dd($sisa);
        // dd([$nafiIsbat->toArray(), $bayarIsbat->toArray(), $tender]);

        return view('components.admin.nafi-isbat.bayar.index', compact('nafiIsbat', 'bayarIsbat', 'totalBayar', 'sisa'));
    }

    public function bayarStore(Request $request)
    {
        $input = $request->validate([
            'bayar'         => 'required',
            'nafi_isbat_id' => 'required'
        ]);

        $input['bayar'] = str_replace(',', '', $input['bayar']);

        BayarNafiIsbat::create($input);

        LogActivity::addToLog('Add Bayar');

        return back();
    }

    public function bayarUpdate(Request $request, $id)
    {
        $bayar = BayarNafiIsbat::findOrFail($id);

        $input = $request->validate([
            'bayar'         => 'required',
        ]);

        $input['bayar'] = str_replace(',', '', $input['bayar']);

        $bayar->update($input);

        LogActivity::addToLog('Edit Bayar');

        return back();
    }

    public function bayarDestroy($id)
    {
        BayarNafiIsbat::findOrFail($id)->delete();

        LogActivity::addToLog('Hapus Bayar');

        return back();
    }
}
