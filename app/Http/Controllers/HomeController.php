<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;

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
        $this->middleware('myrole:admin,member');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hariIni=Jadwal::whereDate('waktu', date('Y-m-d'))->get();
        $besok=Jadwal::whereDate('waktu', date('Y-m-d', strtotime('+1 days')))->get();
        $yangAkanDatang=Jadwal::whereDate('waktu', '>', date('Y-m-d', strtotime('+1 days')))->get();
        return view('dasbor.index',[
            'title'=>'Dasbor',
            'active'=>'dasbor',
            'hariIni'=>$hariIni,
            'besok'=>$besok,
            'yangAkanDatang'=>$yangAkanDatang,
        ]);
    }
}
