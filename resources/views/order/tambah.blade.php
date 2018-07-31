@extends('create-form')
@section('form')
@include('input_number',['id'=>'id_order','label'=>'ID Order'])
@include('select',['required'=>true,'id'=>'jadwal','label'=>'Pilih ID Jadwal','selectData'=>$jadwal])
@include('input',['required'=>true,'readonly'=>true,'id'=>'produk','label'=>'Produk'])
@include('input',['required'=>true,'readonly'=>true,'id'=>'marketplace','label'=>'Marketplace'])
@include('input_number',['required'=>true,'readonly'=>true,'id'=>'fee','label'=>'Fee'])
@include('input',['required'=>true,'readonly'=>true,'id'=>'waktu','label'=>'Waktu'])
@endsection

@push('script')

<script>
	$(document).ready(function(){
		$('#jadwal').on('change', function(e){
			var id_jadwal = $(this).val();
			if(id_jadwal){
				$.ajax({
					url : '{{ url('/jadwal') }}/'+id_jadwal,
					success : function(response, status){
						$('#produk').val(response.produk);
						$('#marketplace').val(response.marketplace.nama);
						$('#fee').val(response.fee);
						$('#waktu').val(response.waktu);
					}
				});
			}else{
				alert('silakan pilih id jadwal dulu');
				$('#produk').val('');
				$('#marketplace').val('');
				$('#fee').val('');
				$('#waktu').val('');
			}
		});
	});
</script>

@endpush