<?php

namespace App\Http\Controllers;

use App\Models\SettingJam;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlahUser = User::where('role_id', 2)->count();
        $jam = SettingJam::firstOrFail();
        return view('page.dashboard', compact('jumlahUser', 'jam'));
    }
}
