<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\AbsensiKeluar;
use App\Models\SettingJam;
use App\Models\SettingLokasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AbsensiKeluarController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $settingJam = SettingJam::first();
        $updatekeluar = Absensi::where('user_id', auth()->user()->id)->where('tanggal', Carbon::today())->firstOrFail();
        $request->validate([
            'image' => ['required'],
        ]);

        $lokasi = SettingLokasi::selectRaw("ST_Distance_Sphere(
                            Point($request->long, $request->lat),
                            Point(lng, lat)
                        ) * ? as distance", [0])
                ->whereRaw("ST_Distance_Sphere(
                            Point($request->long, $request->lat),
                            Point(lng, lat)
                        ) <  ? ", 1000)
                ->first();

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

        $inputVal['foto_keluar'] = $filePath;
        $inputVal['catatan_keluar'] = $request->catatan;
        $keluar = now()->toTimeString();
        $inputVal['waktu_keluar'] = $keluar;
        if ($keluar < $settingJam->jam_pulang) {
            $inputVal['keterangan_keluar'] = 'Bolos';
        }

        if ($lokasi) {
            Storage::put($file, $image_base64);
            $updatekeluar->update($inputVal);
            alert()->success('Berhasil Absesnsi');
            return redirect(route('absensi.index'));
        } else {
            // dd('anda diluar jangkauan kantor');
            alert()->error('Gagal Absesnsi', 'Anda diluar jangkauan kantor');
            return redirect()->back();
        }
    }
}
