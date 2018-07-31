@extends('my-view')
@section('table')
<thead>
  <tr>
    <th>#</th>
    <th>Nama KTP</th>
    <th>No Telp</th>
    <th>Email</th>
    <th>Status</th>
    <th>No Rek</th>
    <th>Atas Nama</th>
    <th>Bank</th>
    <th>Aksi</th>
  </tr>
</thead>
<tfoot>
  <tr>
    <th>#</th>
    <th>Nama KTP</th>
    <th>No Telp</th>
    <th>Email</th>
    <th>Status</th>
    <th>No Rek</th>
    <th>Atas Nama</th>
    <th>Bank</th>
    <th>Aksi</th>
  </tr>
</tfoot>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $d->nama_ktp }}</td>
    <td>{{ $d->no_telp }}</td>
    <td>{{ $d->user->email }}</td>
    <td>
      @if($d->user->status == 'aktif')
      <span class="label label-success">
        {{ $d->user->status }}
      </span>
      @else
      <span class="label label-warning">
        {{ $d->user->status }}
      </span>
      @endif
    </td>
    <td>{{ $d->no_rek }}</td>
    <td>{{ $d->atas_nama }}</td>
    <td>{{ $d->bank->nama_bank }}</td>
    <td>
      @if($d->user->status == 'belum aktif')
      @include('verifikasi_button', ['link' => route('member.verifikasi', [$d->id])])
      @endif
      @include('delete_button', ['link' => route('member.destroy', [$d->id])])
    </td>
  </tr>
  @endforeach
</tbody>
@endsection

{{-- @push('css')
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
@endpush --}}