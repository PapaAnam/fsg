@extends('create-form')
@section('form')
@method('put')
@include('input',['id'=>'nama_bank','label'=>'Nama Bank','value'=>$d->nama_bank])
@endsection