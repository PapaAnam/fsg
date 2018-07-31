<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Marketplace;
use Illuminate\Http\Request;
use DB;

class JadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('myrole:admin')->except('getData');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jadwal::all();
        return view('jadwal.index', [
            'data'      => $data,
            'title'     => 'List Jadwal Flash Sale',
            'active'    => 'jadwal.index',
            'createLink'=>route('jadwal.create')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marketplace = Marketplace::selectMode();
        return view('jadwal.tambah', [
            'title'         => 'Tambah Jadwal Flash Sale',
            'modul_link'    => route('jadwal.index'),
            'modul'         => 'Jadwal',
            'action'        => route('jadwal.store'),
            'active'        => 'jadwal.index',
            'marketplace'=>$marketplace,
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
            'tanggal'=>'required|date_format:Y-m-d',
            'jam'=>'required|date_format:H:i:s',
            'produk'=>'required',
            'fee'=>'required|numeric',
            'marketplace'=>'required|numeric',
        ]);
        if(Jadwal::count() == 0){
            DB::statement('set foreign_key_checks=0;');
            Jadwal::truncate();
        }
        Jadwal::create([
            'waktu'=>$request->tanggal.' '.$request->jam,
            'produk'=>$request->produk,
            'fee'=>$request->fee,
            'id_marketplace'=>$request->marketplace,
        ]);
        return redirect()->route('jadwal.index')->with('success_msg', 'Jadwal flash sale berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        $marketplace = Marketplace::selectMode();
        return view('jadwal.ubah', [
            'd'             => $jadwal,
            'title'         => 'Ubah Jadwal Flash Sale',
            'modul_link'    => route('jadwal.index'),
            'modul'         => 'Jadwal',
            'action'        => route('jadwal.update', $jadwal->id),
            'active'        => 'jadwal.index',
            'marketplace'=>$marketplace,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'tanggal'=>'required|date_format:Y-m-d',
            'jam'=>'required|date_format:H:i:s',
            'produk'=>'required',
            'fee'=>'required|numeric',
            'marketplace'=>'required|numeric',
        ]);
        $jadwal->update([
            'waktu'=>$request->tanggal.' '.$request->jam,
            'produk'=>$request->produk,
            'fee'=>$request->fee,
            'id_marketplace'=>$request->marketplace,
        ]);
        return redirect()->route('jadwal.index')->with('success_msg', 'Jadwal flash sale berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success_msg', 'Jadwal flash sale berhasil dihapus');
    }

    public function getData(Jadwal $jadwal)
    {
        return Jadwal::with('marketplace')->where('id', $jadwal->id)->first();
    }
}
