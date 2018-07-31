@extends('create-form')
@section('form')
@include('datepicker',['id'=>'tanggal','label'=>'Tanggal'])
@include('timemask',['id'=>'jam','label'=>'Jam'])
@include('input',['id'=>'produk','label'=>'Produk'])
@include('input_number',['id'=>'fee','label'=>'Fee'])
@include('select',['id'=>'marketplace','label'=>'Marketplace','selectData'=>$marketplace])
@endsection

@include('import-datepicker')
@include('import-timemask')