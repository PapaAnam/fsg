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
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Lihat berdasarkan Klien</h3>
  </div>
  <div class="box-body">
    <form method="get" action="" class="form-horizontal">
      @include('select',['id'=>'klien','label'=>'Pilih Klien','selectData'=>$listKlien,'selected'=>request()->query('klien')])
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
    <th>ID</th>
    <th>Proyek</th>
    <th>Klien</th>
    <th>Deskripsi</th>
    <th>Qty</th>
    <th>Satuan</th>
    <th>Pelaksana</th>
    <th>Mulai</th>
    <th>Akhir</th>
    @if('superadmin' == Auth::user()->role || 'admin' == Auth::user()->role)
    <th>Aksi</th>
    @endif
  </tr>
</thead>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td>{{ $d->id }}</td>
    <td>{{ $d->proyek->nama }}</td>
    <td>{{ $d->proyek->kliendetail->nama_perusahaan }}</td>
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
    @if('superadmin' == Auth::user()->role || 'admin' == Auth::user()->role)
    <td>
      @include('edit_button', ['link' => route('tugas.edit', [$d->id])])
      @include('delete_button', ['link' => route('tugas.destroy', [$d->id])])
    </td>
    @endif
  </tr>
  @endforeach
</tbody>
<tfoot>
  <tr>
    <th>ID</th>
    <th>Proyek</th>
    <th>Deskripsi</th>
    <th>Qty</th>
    <th>Satuan</th>
    <th>Pelaksana</th>
    <th>Mulai</th>
    <th>Akhir</th>
    @if('superadmin' == Auth::user()->role || 'admin' == Auth::user()->role)
    <th>Aksi</th>
    @endif
  </tr>
</tfoot>
@endsection

@include('import-datepicker')