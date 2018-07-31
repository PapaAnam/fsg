@extends('create-form')
@section('form')
@method('PUT')
@include('datepicker',['id'=>'tanggal','label'=>'Tanggal','value'=>$d->tanggal])
@include('select',['id'=>'id_proyek','label'=>'Pilih Proyek','selectData'=>$listProyek,'selected'=>$d->id_proyek])
@include('input_number',['id'=>'ritase','label'=>'Ritase','value'=>$d->ritase])
@include('select',['id'=>'cuaca','label'=>'Pilih Cuaca','selectData'=>$listCuaca,'selected'=>$d->cuaca])
@include('textarea',['id'=>'deskripsi','label'=>'Deskripsi','value'=>$d->deskripsi])
@include('textarea',['id'=>'kendala','label'=>'Kendala','value'=>$d->kendala])
@endsection

@include('import-datepicker')
@include('import-select2')