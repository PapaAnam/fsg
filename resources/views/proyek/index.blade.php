@extends('my-view')
@section('table')
<thead>
  <tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Klien</th>
    <th>Deskripsi</th>
    <th>Qty</th>
    <th>Satuan</th>
    <th>Pelaksana</th>
    <th>Mulai</th>
    <th>Akhir</th>
    @if('superadmin' == Auth::user()->role)
    <th>Aksi</th>
    @endif
  </tr>
</thead>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td>{{ $d->id }}</td>
    <td>{{ $d->nama }}</td>
    <td>{{ $d->kliendetail->nama_perusahaan }}</td>
    <td>{{ $d->deskripsi }}</td>
    <td>{{ $d->qty }}</td>
    <td>{{ $d->satuandetail->nama }}</td>
    <td>
      @if(count($d->pelaksana) > 0)
      <ul>
        @foreach($d->pelaksana as $pelaksana)
        <li>{{ $pelaksana->karyawan->nama }}</li>
        @endforeach
      </ul>
      @endif
    </td>
    <td>{{ $d->start_date }}</td>
    <td>{{ $d->end_date }}</td>
    @if('superadmin' == Auth::user()->role)
    <td>
      @include('edit_button', ['link' => route('proyek.edit', [$d->id])])
      @include('delete_button', ['link' => route('proyek.destroy', [$d->id])])
    </td>
    @endif
  </tr>
  @endforeach
</tbody>
<tfoot>
  <tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Klien</th>
    <th>Deskripsi</th>
    <th>Qty</th>
    <th>Satuan</th>
    <th>Pelaksana</th>
    <th>Mulai</th>
    <th>Akhir</th>
    @if('superadmin' == Auth::user()->role)
    <th>Aksi</th>
    @endif
  </tr>
</tfoot>
@endsection

@include('import-datepicker')