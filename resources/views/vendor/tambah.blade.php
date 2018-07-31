@extends('create-form')
@section('form')
@include('input',['id'=>'nama','label'=>'Nama'])
@include('input',['id'=>'telp','label'=>'No Telp'])
@include('textarea',['id'=>'alamat','label'=>'Alamat'])
@include('textarea',['id'=>'keterangan','label'=>'Keterangan'])
@endsection