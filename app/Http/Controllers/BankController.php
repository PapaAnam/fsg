<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;
use DB;

class BankController extends Controller
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
        $data = Bank::all();
        return view('bank.index', [
            'data'      => $data,
            'title'     => 'List Bank',
            'active'    => 'bank.index',
            'createLink'=>route('bank.create')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank.tambah', [
            'title'         => 'Tambah Bank',
            'modul_link'    => route('bank.index'),
            'modul'         => 'Bank',
            'action'        => route('bank.store'),
            'active'        => 'bank.index'
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
            'nama_bank'=>'required',
        ]);
        if(Bank::count() == 0){
            DB::statement('set foreign_key_checks=0;');
            Bank::truncate();
        }
        Bank::create([
            'nama_bank'=>$request->nama_bank,
        ]);
        return redirect()->route('bank.index')->with('success_msg', 'Bank berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('bank.ubah', [
            'd'             => $bank,
            'title'         => 'Ubah Bank',
            'modul_link'    => route('bank.index'),
            'modul'         => 'Bank',
            'action'        => route('bank.update', $bank->id),
            'active'        => 'bank.index'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $request->validate([
            'nama_bank'=>'required',
        ]);
        $bank->update([
            'nama_bank'=>$request->nama_bank,
        ]);
        return redirect()->route('bank.index')->with('success_msg', 'Bank berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();
        return redirect()->route('bank.index')->with('success_msg', 'Bank berhasil dihapus');
    }
}
