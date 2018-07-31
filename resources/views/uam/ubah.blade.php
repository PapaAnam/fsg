@extends('create-form')
@section('form')
@method('PUT')
@include('input',['value'=>$d->nama_lengkap,'id'=>'nama_lengkap','label'=>'Nama Lengkap'])
@include('input',['value'=>$d->jabatan,'id'=>'jabatan','label'=>'Jabatan'])
@include('input_email',['value'=>$d->email,'id'=>'email','label'=>'Email'])
@include('input_password',['id'=>'password','label'=>'Password','hint'=>'* Jika password dikosongi maka tidak akan diubah'])
@include('select',['selected'=>$d->role,'id'=>'role','label'=>'Role','selectData'=>[
	[
		'text'=>'Pilih salah satu',
		'value'=>''
	],
	[
		'text'=>'superadmin',
		'value'=>'superadmin'
	],
	[
		'text'=>'admin',
		'value'=>'admin'
	],
	[
		'text'=>'finance',
		'value'=>'finance'
	]
	]])
@endsection