<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingJam extends Model
{
    use HasFactory;

    protected $table = 'setting_jam';

    protected $fillable = ['jam_masuk', 'jam_pulang'];

    public $timestamps = false;
}
