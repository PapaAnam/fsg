@extends('create-form')
@section('form')
@method('put')
@include('input',['id'=>'kategori_utama','label'=>'Kategori Utama','readonly'=>true,'value'=>$kategori->nama])
@include('input',['id'=>'nama','label'=>'Nama Kategori','value'=>$d->nama])
@endsection