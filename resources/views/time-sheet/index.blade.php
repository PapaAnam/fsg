@extends('my-view')
@section('other-box')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Lihat berdasarkan rentang waktu</h3>
  </div>
  <div class="box-body">
    <form method="get" action="" class="form-horizontal">
      @include('datepicker', ['id'=>'dari','label'=>'Dari','required'=>true,'value'=>request()->query('dari')])
      @include('datepicker', ['id'=>'sampai','label'=>'Sampai','required'=>true,'value'=>request()->query('sampai')])
      <div class="form-group">
        <label class="col-lg-2 control-label"></label>
        <div class="col-sm-6">
          <button type="submit" class="btn btn-primary btn-flat">Lihat</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
@section('table')
<thead>
  <tr>
    <th>ID Time Sheet</th>
    <th>NIK</th>
    <th>Nama</th>
    <th>Tanggal</th>
    <th>Jam Mulai</th>
    <th>Jam Selesai</th>
    <th>Total Jam</th>
    <th>Ritase</th>
    @if('superadmin' == Auth::user()->role)
    <th>Aksi</th>
    @endif
  </tr>
</thead>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td>{{ $d->id }}</td>
    <td>{{ $d->karyawan->nik }}</td>
    <td>{{ $d->karyawan->nama }}</td>
    <td>{{ $d->tanggal }}</td>
    <td>{{ $d->jam_mulai }}</td>
    <td>{{ $d->jam_selesai }}</td>
    <td>{{ $d->total_jam }}</td>
    <td>{{ $d->ritase }}</td>
    @if('superadmin' == Auth::user()->role)
    <td>
      @include('edit_button', ['link' => route('time-sheet.edit', [$d->id])])
      @include('delete_button', ['link' => route('time-sheet.destroy', [$d->id])])
    </td>
    @endif
  </tr>
  @endforeach
</tbody>
<tfoot>
  <tr>
    <th>ID Time Sheet</th>
    <th>NIK</th>
    <th>Nama</th>
    <th>Tanggal</th>
    <th>Jam Mulai</th>
    <th>Jam Selesai</th>
    <th>Total Jam</th>
    <th>Ritase</th>
    @if('superadmin' == Auth::user()->role)
    <th>Aksi</th>
    @endif
  </tr>
</tfoot>
@endsection

@include('import-datepicker')