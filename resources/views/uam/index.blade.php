@extends('my-view')
@section('table')
<thead>
  <tr>
    <th>ID User</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Email</th>
    <th>Role</th>
    <th>Aksi</th>
  </tr>
</thead>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td>{{ $d->id }}</td>
    <td>{{ $d->nama_lengkap }}</td>
    <td>{{ $d->jabatan }}</td>
    <td>{{ $d->email }}</td>
    <td>{{ $d->role }}</td>
    <td>
      @include('edit_button', ['link' => route('uam.edit', [$d->id])])
      @include('delete_button', ['link' => route('uam.destroy', [$d->id])])
    </td>
  </tr>
  @endforeach
</tbody>
<tfoot>
  <tr>
    <th>ID User</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Email</th>
    <th>Role</th>
    <th>Aksi</th>
  </tr>
</tfoot>
@endsection