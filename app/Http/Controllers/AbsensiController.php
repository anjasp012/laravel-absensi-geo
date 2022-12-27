<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\AbsensiKeluar;
use App\Models\AbsensiMasuk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $absensi = Absensi::where('user_id', auth()->user()->id)->where('tanggal', Carbon::today())->first();
        return view('page.karyawan.absensi.index', compact('absensi'));
    }

    public function masuk()
    {
        return view('page.karyawan.absensi.masuk');
    }

    public function keluar()
    {
        return view('page.karyawan.absensi.keluar');
    }
}
