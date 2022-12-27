<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingLokasi extends Model
{
    use HasFactory;

    protected $table = 'setting_lokasi';

    protected $fillable = ['lat', 'lng'];
}
