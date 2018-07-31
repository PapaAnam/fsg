<?php

namespace App\Http\Controllers;

use App\Marketplace;
use Illuminate\Http\Request;
use DB;

class MarketplaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('myrole:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Marketplace::all();
        return view('marketplace.index', [
            'data'      => $data,
            'title'     => 'List Marketplace',
            'active'    => 'marketplace.index',
            'createLink'=>route('marketplace.create')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marketplace.tambah', [
            'title'         => 'Tambah Marketplace',
            'modul_link'    => route('marketplace.index'),
            'modul'         => 'Marketplace',
            'action'        => route('marketplace.store'),
            'active'        => 'marketplace.index'
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
            'nama'=>'required',
        ]);
        if(Marketplace::count() == 0){
            DB::statement('set foreign_key_checks=0;');
            Marketplace::truncate();
        }
        Marketplace::create([
            'nama'=>$request->nama,
        ]);
        return redirect()->route('marketplace.index')->with('success_msg', 'Marketplace berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marketplace  $marketplace
     * @return \Illuminate\Http\Response
     */
    public function show(Marketplace $marketplace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marketplace  $marketplace
     * @return \Illuminate\Http\Response
     */
    public function edit(Marketplace $marketplace)
    {
        return view('marketplace.ubah', [
            'd'             => $marketplace,
            'title'         => 'Ubah Marketplace',
            'modul_link'    => route('marketplace.index'),
            'modul'         => 'Marketplace',
            'action'        => route('marketplace.update', $marketplace->id),
            'active'        => 'marketplace.index'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marketplace  $marketplace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marketplace $marketplace)
    {
        $request->validate([
            'nama'=>'required',
        ]);
        $marketplace->update([
            'nama'=>$request->nama,
        ]);
        return redirect()->route('marketplace.index')->with('success_msg', 'Marketplace berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marketplace  $marketplace
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marketplace $marketplace)
    {
        $marketplace->delete();
        return redirect()->route('marketplace.index')->with('success_msg', 'Marketplace berhasil dihapus');
    }
}
