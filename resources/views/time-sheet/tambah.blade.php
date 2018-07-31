@extends('create-form')
@section('form')
@include('select',['id'=>'id_karyawan','label'=>'Karyawan','selectData'=>$listKaryawan])
@include('datepicker',['id'=>'tanggal','label'=>'Tanggal'])
@include('timemask',['id'=>'jam_mulai','label'=>'Jam Mulai'])
@include('timemask',['id'=>'jam_selesai','label'=>'Jam Selesai'])
@include('input_number',['id'=>'ritase','label'=>'Ritase'])
@endsection

@include('import-datepicker')
@include('import-timemask')