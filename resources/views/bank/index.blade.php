@extends('my-view')
@section('table')
<thead>
  <tr>
    <th>#</th>
    <th>Nama</th>
    <th>Aksi</th>
  </tr>
</thead>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $d->nama_bank }}</td>
    <td>
      @include('edit_button', ['link' => route('bank.edit', [$d->id])])
      @include('delete_button', ['link' => route('bank.destroy', [$d->id])])
    </td>
  </tr>
  @endforeach
</tbody>
<tfoot>
  <tr>
    <th>#</th>
    <th>Nama</th>
    <th>Aksi</th>
  </tr>
</tfoot>
@endsection

@push('css')
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