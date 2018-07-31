@extends('create-form')
@section('form')
@include('input',['id'=>'kategori_utama','label'=>'Kategori Utama','readonly'=>true,'value'=>$d->nama])
@include('input',['id'=>'nama','label'=>'Nama Kategori'])
@endsection