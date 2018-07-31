<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Bank;

class ProfilController extends Controller
{

	public function index()
	{
		$user = null;
		if(Auth::user()->role == 'admin')
			$user = Auth::user();
		else
			$user = User::with('member')->where('id', Auth::id())->first();
		return view('profil.index',[
			'user'=>$user,
			'title'=>'Profil',
			'modul'=>'Profil',
			'active'=>null,
			'modul_link'=>url('/'),
			'action'=>route('profile.update'),
			'listBank'=>Bank::selectMode(),
		]);
	}

	public function update(Request $r)
	{
		if($r->user()->role == 'admin'){
			if($r->email != $r->email_lama){
				$r->validate([
					'email'=>'required|email|unique:users',
				]);
			}
		}else{
			if($r->email != $r->email_lama){
				$r->validate([
					'email'=>'required|email|unique:users',
				]);
			}else{
				$r->validate([
					'nama_ktp'=>'required|string',
					'no_telp'=>'required|numeric',
					'no_rek'=>'required|numeric',
					'atas_nama'=>'required|string',
					'bank'=>'required',
					'password'=>'nullable|min:6',
				]);
			}
		}
		$data = [
			'email'=>$r->email,
		];
		if($r->password){
			$data['password'] = bcrypt($r->password);
		}
		$r->user()->update($data);
		if($r->user()->role == 'member'){
			$r->user()->member()->update([
				'nama_ktp'=>$r->nama_ktp,
				'no_telp'=>$r->no_telp,
				'no_rek'=>$r->no_rek,
				'atas_nama'=>$r->atas_nama,
				'id_bank'=>$r->bank,
			]);
		}
		return redirect()->back()->with('success_msg', 'Profil berhasil diperbarui');
	}

}
