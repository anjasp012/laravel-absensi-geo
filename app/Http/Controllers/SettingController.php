<?php

namespace App\Http\Controllers;

use App\Models\SettingAbsensi;
use App\Models\SettingJam;
use App\Models\SettingLokasi;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function lokasi()
    {
        $lokasi = SettingLokasi::firstOrCreate();
        return view('page.admin.setting.lokasi.index', compact('lokasi'));
    }


    public function jamMasuk()
    {
        $jam = SettingJam::firstOrCreate();
        $jam = $jam->jam_masuk;
        return view('page.admin.setting.jam.index', compact('jam'));
    }

    public function jamKeluar()
    {
        $jam = SettingJam::firstOrCreate();
        $jam = $jam->jam_pulang;
        return view('page.admin.setting.jam.index', compact('jam'));
    }

    public function storeLokasi(Request $request)
    {
        $lokasi = SettingLokasi::firstOrCreate();
        // dd($request->all());
        $inputVal = $request->validate([
            'lat' => 'required',
            'lng' => 'required',
        ]);

        try {
            $lokasi->update($inputVal);
            alert()->success('Berhasil Update Lokasi');
            return redirect()->back();
        } catch (\Exception $th) {
            alert()->error('Gagal Update Lokasi');
            return redirect()->back();
        }


    }
    public function storeJamMasuk(Request $request)
    {
        // dd($request->all());
        $jamMasuk = SettingJam::firstOrCreate();
        $request->validate([
            'jam' => ['required'],
        ]);

        $inputVal['jam_masuk'] = $request->jam;

        try {
            $jamMasuk->update($inputVal);
            alert()->success('Berhasil Update Jam Masuk');
            return redirect(route('data-absensi.index'));
        } catch (\Exception $th) {
            alert()->error('Gagal Update Jam Masuk');
            return redirect(route('data-absensi.index'));
        }
    }

    public function storeJamKeluar(Request $request)
    {
        $jamKeluar = SettingJam::firstOrCreate();
        $request->validate([
            'jam' => ['required'],
        ]);

        $inputVal['jam_pulang'] = $request->jam;

        try {
            $jamKeluar->update($inputVal);
            alert()->success('Berhasil Update Jam Keluar');
            return redirect(route('data-absensi.index'));
        } catch (\Exception $th) {
            alert()->error('Gagal Update Jam Keluar');
            return redirect(route('data-absensi.index'));
        }
    }
}
