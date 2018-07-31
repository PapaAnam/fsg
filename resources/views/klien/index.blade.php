@extends('my-view')
@if(Auth::user()->role == 'superadmin')
@section('table')
<thead>
  <tr>
    <th>ID Klien</th>
    <th>Nama Perusahaan</th>
    <th>Alamat</th>
    <th>PIC</th>
    <th>Aksi</th>
  </tr>
</thead>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td>{{ $d->id }}</td>
    <td>{{ $d->nama_perusahaan }}</td>
    <td>{{ $d->alamat }}</td>
    <td>
      <ul>
        @foreach($d->pic as $p)
        <li>Jenis : {{ $p->tipe }}</li>
        <li>Nama : {{ $p->nama }}</li>
        <li>No HP : {{ $p->no_hp }}</li>
        @if(!$loop->last)
        <hr>
        @endif
        @endforeach
      </ul>
    </td>
    <td>
      @include('edit_button', ['link' => route('klien.edit', [$d->id])])
      @include('delete_button', ['link' => route('klien.destroy', [$d->id])])
    </td>
  </tr>
  @endforeach
</tbody>
<tfoot>
  <tr>
    <th>ID Klien</th>
    <th>Nama Perusahaan</th>
    <th>Alamat</th>
    <th>PIC</th>
    <th>Aksi</th>
  </tr>
</tfoot>
@endsection
@endif