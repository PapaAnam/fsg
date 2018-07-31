@extends('my-view')
@section('table')
<thead>
  <tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>No Telp</th>
    <th>Jabatan</th>
    <th>Armada</th>
    @if($role == Auth::user()->role)
    <th>Aksi</th>
    @endif
  </tr>
</thead>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td>{{ $d->id }}</td>
    <td>{{ $d->nama }}</td>
    <td>{{ $d->alamat }}</td>
    <td>{{ $d->no_hp }}</td>
    <td>{{ $d->jabatan }}</td>
    <td>{{ $d->armada }}</td>
    @if($role == Auth::user()->role)
    <td>
      @include('edit_button', ['link' => route('karyawan.edit', [$d->id])])
      @include('delete_button', ['link' => route('karyawan.destroy', [$d->id])])
    </td>
    @endif
  </tr>
  @endforeach
</tbody>
<tfoot>
  <tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>No Telp</th>
    <th>Jabatan</th>
    <th>Armada</th>
    @if($role == Auth::user()->role)
    <th>Aksi</th>
    @endif
  </tr>
</tfoot>
@endsection