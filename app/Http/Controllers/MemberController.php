<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\User;

class MemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('myrole:admin')->except('daftar');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Member::with('user','bank')->get();
        return view('member.index', [
            'data'      => $data,
            'title'     => 'List Member',
            'active'    => 'member.index',
            'noCreate'=>true
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->user()->delete();
        return redirect()->route('member.index')->with('success_msg', 'Member berhasil dihapus');
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

    public function verifikasi(Request $r, Member $member)
    {
        $member->user()->update([
            'status'=>'aktif',
        ]);
        return redirect()->back()->with('success_msg','Member berhasil diverifikasi');
    }
}
