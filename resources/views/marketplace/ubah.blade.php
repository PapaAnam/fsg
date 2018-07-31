@extends('create-form')
@section('form')
@method('put')
@include('input',['id'=>'nama','label'=>'Nama Marketplace','value'=>$d->nama])
@endsection