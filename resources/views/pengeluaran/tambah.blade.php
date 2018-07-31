@extends('create-form')
@section('form')
@include('input',['id'=>'no','label'=>'No'])
@include('datepicker',['id'=>'tanggal','label'=>'Tanggal','value'=>date('Y-m-d')])
@include('select',['id'=>'id_vendor','label'=>'Pilih Vendor','selectData'=>$listVendor])
@include('select',['id'=>'id_karyawan','label'=>'Pilih Pelaksana','selectData'=>$listPelaksana])
@include('input_number',['id'=>'nominal','label'=>'Nominal'])
@include('select',['id'=>'id_proyek','label'=>'Pilih Proyek','selectData'=>$listProyek])
@include('select',['id'=>'id_kategori','label'=>'Pilih Kategori','selectData'=>$listKategori])
<div class="form-group">
	<label class="col-lg-2 control-label"></label>
	<div class="col-sm-6">
		<button id="cek-sub" class="btn btn-primary btn-flat">
			Cek Sub Kategori
		</button>
	</div>
</div>
@include('select',['id'=>'id_sub_kategori','label'=>'Pilih Sub Kategori','selectData'=>[]])
@include('input',['id'=>'ref','label'=>'Ref'])
@include('input_image',['id'=>'kwitansi','label'=>'Scan Kwitansi'])
@endsection

@include('import-datepicker')
@push('script')
<script>
	$(document).ready(function(){
		$('#tambah-pajak').on('click', function(e){
			e.preventDefault();
			var pajakBaruHtml = '<div id="pajak-baru">'+$('#template-pajak').html()+$('#template-hapus').html()+'</div>';
			$('#pajak-baru-view').append(pajakBaruHtml);
		});
		$('#cek-sub').on('click', function(e){
			e.preventDefault();
			$.ajax({
				url : '{{ url('/api/sub-kategori') }}?kategori='+$('#id_kategori').val(),
				success : function(response,status){
					var optHtml = "";
					if(response.length <= 0){
						optHtml = '<option>Tidak ada sub</option>';
					}else{
						for (var i = 0; i < response.length; i++) {
							optHtml += '<option value="'+response[i].id+'">['+response[i].id+']'+response[i].nama+'</option>';
						}
					}
					$('#id_sub_kategori').html(optHtml);
				}
			})
		});
	});
	@if(count($errors->all()) > 0)
	$.ajax({
		url : '{{ url('/api/sub-kategori') }}?kategori={{ old('id_klien') }}',
		success : function(response,status){
			var optHtml = "";
			if(response.length <= 0){
				optHtml = '<option>Tidak ada pekerjaan</option>';
			}else{
				for (var i = 0; i < response.length; i++) {
					optHtml += '<option value="'+response[i].id+'">['+response[i].id+']'+response[i].nama+'</option>';
				}
			}
			$('#id_sub_kategori').html(optHtml);
			$('#id_sub_kategori').val('{{ old('id_proyek') }}');
		}
	})
	@endif
</script>
@endpush