@extends('my-view')
@section('table')
<thead>
  <tr>
    <th>ID Vendor</th>
    <th>Nama</th>
    <th>No Telp</th>
    <th>Alamat</th>
    <th>Keterangan</th>
    @if(Auth::user()->role == 'superadmin')
    <th>Aksi</th>
    @endif
  </tr>
</thead>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td><?=$d->id?></td>
    <td><?=$d->nama?></td>
    <td><?=$d->telp?></td>
    <td><?=$d->alamat?></td>
    <td><?=$d->keterangan?></td>
    @if(Auth::user()->role == 'superadmin')
    <td>
      @include('edit_button', ['link' => route('vendor.edit', [$d->id])])
      @include('delete_button', ['link' => route('vendor.destroy', [$d->id])])
    </td>
    @endif
  </tr>
  @endforeach
</tbody>
<tfoot>
  <tr>
    <th>ID Vendor</th>
    <th>Nama</th>
    <th>No Telp</th>
    <th>Alamat</th>
    <th>Keterangan</th>
    @if(Auth::user()->role == 'superadmin')
    <th>Aksi</th>
    @endif
  </tr>
</tfoot>
@endsection