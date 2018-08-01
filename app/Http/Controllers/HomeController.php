<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Order;
use App\Member;
use App\Marketplace;

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
    public function index(Request $r)
    {
        $user = $r->user();
        $hariIni=Jadwal::whereDate('waktu', date('Y-m-d'))->get();
        $besok=Jadwal::whereDate('waktu', date('Y-m-d', strtotime('+1 days')))->get();
        $yangAkanDatang=Jadwal::whereDate('waktu', '>', date('Y-m-d', strtotime('+1 days')))->get();
        $totalDiproses = 0;
        $totalDiterima = 0;
        $totalDitransfer = 0;
        if($user->role == 'admin'){
            $totalDiproses = Order::where('status', 'diproses')->count();
            $totalDiterima = Order::where('status', 'diterima')->count();
            $totalDitransfer = Order::where('status', 'ditransfer')->count();
        }else{
            $member = Member::where('id_user', $user->id)->first();
            $totalDiproses = Order::where('id_member', $member->id)->where('status', 'diproses')->count();
            $totalDiterima = Order::where('id_member', $member->id)->where('status', 'diterima')->count();
            $totalDitransfer = Order::where('id_member', $member->id)->where('status', 'ditransfer')->count();
        }
        return view('dasbor.index',[
            'title'=>'Dasbor',
            'active'=>'dasbor',
            'hariIni'=>$hariIni,
            'besok'=>$besok,
            'yangAkanDatang'=>$yangAkanDatang,
            'totalDiproses'=>$totalDiproses,
            'totalDiterima'=>$totalDiterima,
            'totalDitransfer'=>$totalDitransfer,
            'totalEvent'=>count($hariIni),
            'totalMember'=>$user->role == 'admin' ? Member::count() : 0,
            'totalMarketplace'=>$user->role == 'admin' ? Marketplace::count() : 0,
            'pesanan'=>$user->role == 'member' ? Order::where('id_member', $member->id)->get() : [],
        ]);
    }
}
