<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'absensi';

    protected $fillable = ['user_id', 'tanggal', 'foto_masuk', 'keterangan_masuk', 'catatan_masuk', 'waktu_masuk', 'foto_keluar', 'keterangan_keluar', 'catatan_keluar', 'waktu_keluar',];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
