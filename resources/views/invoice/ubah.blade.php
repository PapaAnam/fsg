@extends('create-form')
@section('form')
@method('PUT')
@include('select',['selected'=>$d->id_proyek,'id'=>'id_proyek','label'=>'Pilih Proyek','selectData'=>$listProyek])
@include('select2',['selected'=>$pelaksana,'id'=>'pelaksana','label'=>'Pilih Pelaksana','selectData'=>$listKaryawan])
@include('input_number',['value'=>$d->qty,'id'=>'qty','label'=>'Qty'])
@include('select',['id'=>'satuan','label'=>'Pilih Satuan','selectData'=>$listSatuan])
@include('datepicker',['value'=>$d->start_date,'id'=>'start_date','label'=>'Start Date'])
@include('datepicker',['value'=>$d->end_date,'id'=>'end_date','label'=>'End Date'])
@include('textarea',['value'=>$d->deskripsi,'id'=>'deskripsi','label'=>'Deskripsi'])
@endsection

@include('import-datepicker')
@include('import-select2')