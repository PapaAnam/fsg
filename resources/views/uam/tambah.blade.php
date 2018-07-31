@extends('create-form')
@section('form')
@include('input',['id'=>'nama_lengkap','label'=>'Nama Lengkap'])
@include('input',['id'=>'jabatan','label'=>'Jabatan'])
@include('input_email',['id'=>'email','label'=>'Email'])
@include('input_password',['id'=>'password','label'=>'Password'])
@include('select',['id'=>'role','label'=>'Role','selectData'=>[
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