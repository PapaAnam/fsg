@extends('create-form')
@section('form')
@include('datepicker',['id'=>'tanggal','label'=>'Tanggal','value'=>date('Y-m-d')])
@include('select',['id'=>'id_proyek','label'=>'Pilih Proyek','selectData'=>$listProyek])
@include('input_number',['id'=>'ritase','label'=>'Ritase'])
@include('select',['id'=>'cuaca','label'=>'Pilih Cuaca','selectData'=>$listCuaca])
@include('textarea',['id'=>'deskripsi','label'=>'Deskripsi'])
@include('textarea',['id'=>'kendala','label'=>'Kendala'])
@endsection

@include('import-datepicker')
@include('import-select2')