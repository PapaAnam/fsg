<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Jadwal;
use Auth;
use App\Member;
use Excel;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('myrole:member')->only('create', 'store');
        $this->middleware('myrole:admin')->only('bayar', 'bayarStore','excel');
    }


    public function index()
    {
        $data = [];
        if(Auth::user()->role == 'admin')
            $data = Order::with('jadwal.marketplace', 'member')->get();
        else
            $data = Order::with('jadwal.marketplace', 'member')->where('id_member', Auth::user()->member()->first()->id)->get();
        return view('order.index', [
            'data'      => $data,
            'title'     => 'List Order',
            'active'    => 'order.index',
            'createLink'=>route('order.create'),
            'role'=>'member',
            'listMember'=>Member::selectMode(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.tambah', [
            'title'         => 'Tambah Order',
            'modul_link'    => route('order.index'),
            'modul'         => 'Order',
            'action'        => route('order.store'),
            'active'        => 'order.index',
            'jadwal'=>Jadwal::selectMode(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jadwal'=>'required',
            'id_order'=>'required|numeric'
        ]);
        Order::create([
            'id_jadwal'=>$request->jadwal,
            'id_order'=>$request->id_order,
            'id_member'=>Auth::user()->member()->first()->id
        ]);
        return redirect()->route('order.index')->with('success_msg', 'Order berhasil dimasukkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('success_msg', 'Order berhasil dihapus');
    }

    public function daftar(Request $r)
    {
        $r->validate([
            'email'=>'required|email|unique:users',
            'nama_ktp'=>'required|string',
            'no_telp'=>'required|numeric',
            'no_rek'=>'required|numeric',
            'atas_nama'=>'required|string',
            'bank'=>'required',
            'password'=>'required|confirmed|min:6',
            'password_confirmation'=>'required'
        ]);
        $user = User::create([
            'email'=>$r->email,
            'password'=>bcrypt($r->password),
        ]);
        $user->member()->create([
            'nama_ktp'=>$r->nama_ktp,
            'no_telp'=>$r->no_telp,
            'no_rek'=>$r->no_rek,
            'atas_nama'=>$r->atas_nama,
            'id_bank'=>$r->bank,
        ]);
        return redirect()->back()->with('success_msg', 'Daftar berhasil dilakukan, menunggu verifikasi admin');
    }

    public function verifikasi(Request $r, Order $order)
    {
        $order->user()->update([
            'status'=>'aktif',
        ]);
        return redirect()->back()->with('success_msg','Order berhasil diverifikasi');
    }

    public function bayar(Order $order)
    {
        $order = Order::with('jadwal')->where('id', $order->id)->first();
        // return $order;
        return view('order.bayar', [
            'order'=>$order,
            'title'=>'Bayar Order',
            'active'=>'order.index',
            'modul_link'=>route('order.index'),
            'modul'=>'Order',
            'action'=>route('bayar.store',[$order->id]),
        ]);
    }

    public function bayarStore(Request $r, Order $order)
    {
        $r->validate([
            'bukti'=>'required|mimes:jpeg,png'
        ]);
        $path = asset(str_replace('public/', 'storage/', $r->file('bukti')->store('public/bukti')));
        $order->update([
            'bukti'=>$path,
            'status'=>'Lunas',
        ]);
        return redirect()->route('order.index')->with('success_msg', 'Pembayaran berhasil dilakukan');
    }

    public function excel(Request $r)
    {
        $id_member = $r->query('member');
        $member = Member::find($id_member);
        $order = Order::with('jadwal.marketplace', 'member')->where('id_member', $id_member)->get();
        if(count($order) <= 0){
            return 'mohon maaf member ini belum pernah melakukan order';
        }
        Excel::create('laporan order '.$member->nama_ktp, function($excel) use ($order){
            $excel->sheet('data', function($sheet) use ($order){
                $data = [];
                foreach ($order as $o) {
                    $data[] = [
                        'ID Order'=>$o->id_order,
                        'Member'=>$o->id_order,
                        'Marketplace'=>$o->member->nama_ktp,
                        'Produk'=>$o->jadwal->marketplace->nama,
                        'Waktu'=>$o->jadwal->produk,
                        'Fee'=>$o->jadwal->waktu,
                        'Status'=>$o->status,
                    ];
                }
                $sheet->with($data);
                $sheet->row(1, function($row){
                    $row->setFontWeight('bold');
                });
                $kolom = ['A','B','C','D','E','F','G'];
                for ($i=1; $i <= count($data)+1; $i++) { 
                    foreach ($kolom as $k) {
                        $sheet->cell($k.$i, function($cell){
                            $cell->setBorder('thin','thin','thin','thin');
                        });
                    }
                }
            });
        })->download('xlsx');

    }
}
