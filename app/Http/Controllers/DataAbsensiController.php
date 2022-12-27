<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\AbsensiMasuk;
use Illuminate\Http\Request;

class DataAbsensiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $laporanAbsensi = Absensi::all();
        // dd($laporanAbsensi);
        return view('page.admin.data-absensi.index', compact('laporanAbsensi'));
    }
}
