@extends('create-form')
@section('form')
@method('PUT')
@include('select',['id'=>'id_karyawan','label'=>'Karyawan','selectData'=>$listKaryawan,'selected'=>$d->id_karyawan])
@include('datepicker',['value'=>$d->tanggal,'id'=>'tanggal','label'=>'Tanggal'])
@include('timemask',['value'=>$d->jam_mulai,'id'=>'jam_mulai','label'=>'Jam Mulai'])
@include('timemask',['value'=>$d->jam_selesai,'id'=>'jam_selesai','label'=>'Jam Selesai'])
@include('input_number',['value'=>$d->ritase,'id'=>'ritase','label'=>'Ritase'])
@endsection

@include('import-datepicker')
@include('import-timemask')