<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\SettingJam;
use App\Models\SettingLokasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AbsensiMasukController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // dd($request->all());
        $settingJam = SettingJam::first();
        $lokasi = SettingLokasi::selectRaw("ST_Distance_Sphere(
                    Point($request->long, $request->lat),
                    Point(lng, lat)
                ) * ? as distance", [50])
        ->whereRaw("ST_Distance_Sphere(
                    Point($request->long, $request->lat),
                    Point(lng, lat)
                ) <  ? ", 100)
        ->first();

        dd($lokasi);

        $request->validate([
            'image' => ['required'],
        ]);

        $img = $request->image;
        $folderPathDb = "uploads/";
        $folderPath = "public/uploads/";
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        $file = $folderPath . $fileName;
        $filePath = $folderPathDb . $fileName;

        $inputVal['user_id'] = auth()->user()->id;
        $inputVal['tanggal'] = Carbon::today();
        $inputVal['foto_masuk'] = $filePath;
        $inputVal['catatan_masuk'] = $request->catatan;
        $masuk = now();
        $inputVal['waktu_masuk'] = $masuk;
        if ($masuk > $settingJam->jam_masuk) {
            $inputVal['keterangan_masuk'] = 'Terlambat';
        }

        // dd($inputVal);

        if ($lokasi) {
            Storage::put($file, $image_base64);
            Absensi::create($inputVal);
            alert()->success('Berhasil Absesnsi');
            return redirect(route('absensi.index'));
        } else {
            alert()->error('Gagal Absesnsi', 'Anda diluar jangkauan kantor');
            return redirect()->back();
        }
    }
}
