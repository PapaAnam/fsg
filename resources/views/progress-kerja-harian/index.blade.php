@extends('my-view')
@section('table')
<thead>
  <tr>
    <th>ID</th>
    <th>Tanggal</th>
    <th>Proyek</th>
    <th>Tugas</th>
    <th>Deskripsi</th>
    <th>Ritase</th>
    <th>Material</th>
    <th>Cuaca</th>
    <th>Kendala</th>
    @if('superadmin' == Auth::user()->role || 'admin' == Auth::user()->role)
    <th>Aksi</th>
    @endif
  </tr>
</thead>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td>{{ $d->id }}</td>
    <td>{{ $d->tanggal }}</td>
    <td>{{ $d->proyek->nama }}</td>
    <td>{{ $d->proyek->tugas_count }}</td>
    <td>{{ $d->deskripsi }}</td>
    <td>{{ $d->ritase }}</td>
    <td>
      @if(count($d->material) > 0)
      <ul>
        @foreach($d->material as $material)
        <li>Material {{ $loop->iteration }} : {{ $material->qty }}</li>
        @endforeach
      </ul>
      @endif
    </td>
    <td>{{ $d->cuaca }}</td>
    <td>{{ $d->kendala }}</td>
    @if('superadmin' == Auth::user()->role || 'admin' == Auth::user()->role)
    <td>
      @include('edit_button', ['link' => route('progress-kerja-harian.edit', [$d->id])])
      @include('delete_button', ['link' => route('progress-kerja-harian.destroy', [$d->id])])
    </td>
    @endif
  </tr>
  @endforeach
</tbody>
<tfoot>
  <tr>
    <th>ID</th>
    <th>Tanggal</th>
    <th>Proyek</th>
    <th>Tugas</th>
    <th>Deskripsi</th>
    <th>Ritase</th>
    <th>Material</th>
    <th>Cuaca</th>
    <th>Kendala</th>
    @if('superadmin' == Auth::user()->role || 'admin' == Auth::user()->role)
    <th>Aksi</th>
    @endif
  </tr>
</tfoot>
@endsection