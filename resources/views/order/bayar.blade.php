@extends('create-form')
@section('form')
@include('input_number',['id'=>'id_order','label'=>'ID Order','readonly'=>true,'value'=>$order->id_order])
@include('input_number',['id'=>'id_jadwal','label'=>'ID Jadwal','readonly'=>true,'value'=>$order->id_jadwal])
@include('input',['required'=>true,'readonly'=>true,'id'=>'produk','label'=>'Produk','value'=>$order->jadwal->produk])
@include('input',['required'=>true,'readonly'=>true,'id'=>'marketplace','label'=>'Marketplace','value'=>$order->jadwal->marketplace->nama])
@include('input_number',['required'=>true,'readonly'=>true,'id'=>'fee','label'=>'Fee','value'=>$order->jadwal->fee])
@include('input',['required'=>true,'readonly'=>true,'id'=>'waktu','label'=>'Waktu','value'=>$order->jadwal->waktu])
@include('input_image',['required'=>true,'id'=>'bukti','label'=>'Bukti Pembayaran'])
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