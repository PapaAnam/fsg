@extends('my-view')
@section('table')
<thead>
  <tr>
    <th>ID Jadwal</th>
    <th>Waktu</th>
    <th>Produk</th>
    <th>Marketplace</th>
    <th>Fee</th>
    <th>Aksi</th>
  </tr>
</thead>
<tfoot>
  <tr>
    <th>ID Jadwal</th>
    <th>Waktu</th>
    <th>Produk</th>
    <th>Marketplace</th>
    <th>Fee</th>
    <th>Aksi</th>
  </tr>
</tfoot>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td>{{ $d->id }}</td>
    <td>{{ $d->waktu }}</td>
    <td>{{ $d->produk }}</td>
    <td>{{ $d->marketplace->nama }}</td>
    <td align="right">{{ $d->fee_rp }}</td>
    <td>
      @include('edit_button', ['link' => route('jadwal.edit', [$d->id])])
      @include('delete_button', ['link' => route('jadwal.destroy', [$d->id])])
    </td>
  </tr>
  @endforeach
</tbody>
@endsection

@push('style')
<style>
@@media screen and (min-width: 426px) {
  .table-responsive {
    overflow: hidden;
  }
}
@@media screen and (max-width: 425px) {
  .table-responsive {
    overflow: auto;
  }
}
</style>
@endpush