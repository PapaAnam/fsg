@extends('my-view')
@if(Auth::user()->role == 'admin')
@section('other-box')
<div class="box box-success">
  <div class="box-header with-border ">
    <h3 class="box-title">Export ke excel</h3>
  </div>
  <div class="box-body">
    <form method="get" action="" class="form-horizontal">
      @include('select',['id'=>'member','label'=>'Pilih Member','selectData'=>$listMember,'selected'=>request()->query('member')])
      <div class="form-group">
        <label class="col-lg-2 control-label"></label>
        <div class="col-sm-6">
          <button type="submit" onclick="eksporExcel(event)" class="btn btn-success btn-flat">Export <i class="fa fa-file-excel-o"></i></button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
@endif
@section('table')
<thead>
  <tr>
    <th>#</th>
    <th>ID Order</th>
    <th>Member</th>
    <th>Marketplace</th>
    <th>Produk</th>
    <th>Waktu</th>
    <th>Fee</th>
    <th>Status</th>
    <th>Bukti</th>
    <th>Aksi</th>
  </tr>
</thead>
<tfoot>
  <tr>
    <th>#</th>
    <th>ID Order</th>
    <th>Member</th>
    <th>Marketplace</th>
    <th>Produk</th>
    <th>Waktu</th>
    <th>Fee</th>
    <th>Status</th>
    <th>Bukti</th>
    <th>Aksi</th>
  </tr>
</tfoot>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $d->id_order }}</td>
    <td>{{ $d->member->nama_ktp }}</td>
    <td>{{ $d->jadwal->marketplace->nama }}</td>
    <td>{{ $d->jadwal->produk }}</td>
    <td>{{ $d->jadwal->waktu }}</td>
    <td align="right">{{ $d->jadwal->fee_rp }}</td>
    <td>
      @if($d->status == 'Belum Lunas')
      <span class="label label-danger">
        {{ $d->status }}
      </span>
      @else
      <span class="label label-success">
        {{ $d->status }}
      </span>
      @endif
    </td>
    <td>
      @if($d->bukti)
      <a href="{{ $d->bukti }}" target="_blank">Lihat</a>
      @endif
    </td>
    <td>
      @if(Auth::user()->role == 'admin' && $d->status == 'Belum Lunas')
      @include('bayar_button', ['link' => route('order.bayar', [$d->id])])
      @endif
      @include('delete_button', ['link' => route('order.destroy', [$d->id])])
    </td>
  </tr>
  @endforeach
</tbody>
@endsection
@push('script')
<script>
  function eksporExcel(event){
    event.preventDefault();
    var id_member = $('#member').val();
    if(id_member){
      window.open('{{ url('/order/export-excel') }}?member='+id_member);
    }else{
      alert('silakan pilih member terlebih dahulu');
    }
  }
</script>
@endpush