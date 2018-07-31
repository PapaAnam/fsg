@extends('create-form')
@section('form')
@method('put')
@if(Auth::user()->role == 'admin')
@else
@include('input',['value'=>$user->member->nama_ktp,'id'=>'nama_ktp','label'=>'Nama KTP'])
@include('input',['value'=>$user->member->no_telp,'id'=>'no_telp','label'=>'No Telp'])
@include('input',['value'=>$user->member->no_rek,'id'=>'no_rek','label'=>'No Rek'])
@include('input',['value'=>$user->member->atas_nama,'id'=>'atas_nama','label'=>'Atas Nama'])
@include('select',['selected'=>$user->member->id_bank,'id'=>'bank','label'=>'Pilih Bank','selectData'=>$listBank])
@endif
<input type="hidden" name="email_lama" value="{{ $user->email }}">
@include('input_email',['value'=>$user->email,'id'=>'email','label'=>'Email'])
@include('input_password',['id'=>'password','label'=>'Password','hint'=>'* Jika password dikosongi maka tidak akan diubah'])
@endsection