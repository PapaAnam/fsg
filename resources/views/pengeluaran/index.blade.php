@extends('my-view')
@section('other-box')
<div class="row">
  @yield('filter')
</div>
@endsection
@section('table')
<thead>
  <tr>
    <th>ID</th>
    <th>No</th>
    <th>Tanggal</th>
    <th>Vendor</th>
    <th>Pelaksana</th>
    <th>Nominal</th>
    <th>Proyek</th>
    <th>Kategori</th>
    <th>Deskripsi</th>
    <th>Ref</th>
    <th>Kwitansi</th>
  </tr>
</thead>
<tfoot>
  <tr>
    <th>ID</th>
    <th>No</th>
    <th>Tanggal</th>
    <th>Vendor</th>
    <th>Pelaksana</th>
    <th>Nominal</th>
    <th>Proyek</th>
    <th>Kategori</th>
    <th>Deskripsi</th>
    <th>Ref</th>
    <th>Kwitansi</th>
  </tr>
</tfoot>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td>{{ $d->id }}</td>
    <td>{{ $d->no }}</td>
    <td>{{ $d->tanggal }}</td>
    <td>{{ $d->vendor->nama }}</td>
    <td>{{ $d->pelaksana->nama }}</td>
    <td>{{ $d->nominal }}</td>
    <td>{{ $d->proyek->nama }}</td>
    <td>
      {{ $d->kategori->nama }} <br>
      {{ $d->subkategori ? $d->subkategori->nama : '' }}
    </td>
    <td>{{ $d->deskripsi }}</td>
    <td>{{ $d->ref }}</td>
    <td><a href="{{ $d->kwitansi }}" target="_blank">Lihat</a></td>
  </tr>
  @endforeach
</tbody>
@endsection

@include('import-datepicker')