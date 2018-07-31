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
    <th>Tanggal</th>
    <th width="200px">No Invoice</th>
    <th>Client</th>
    <th>PIC</th>
    <th>Pekerjaan</th>
    <th>Deskripsi</th>
    <th>Total Tagihan</th>
    <th>Terbayar</th>
    <th>Tertagih</th>
    <th>Pajak</th>
    <th width="300px">Detail Bank Account</th>
    <td>Ttd</td>
    {{-- @if('superadmin' == Auth::user()->role || 'finance' == Auth::user()->role)
    <th>Aksi</th>
    @endif --}}
  </tr>
</thead>
<tfoot>
  <tr>
    <th>ID</th>
    <th>Tanggal</th>
    <th width="200px">No Invoice</th>
    <th>Client</th>
    <th>PIC</th>
    <th>Pekerjaan</th>
    <th>Deskripsi</th>
    <th>Total Tagihan</th>
    <th>Terbayar</th>
    <th>Tertagih</th>
    <th>Pajak</th>
    <th width="300px">Detail Bank Account</th>
    <td>Ttd</td>
    {{-- @if('superadmin' == Auth::user()->role || 'finance' == Auth::user()->role)
    <th>Aksi</th>
    @endif --}}
  </tr>
</tfoot>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td>{{ $d->id }}</td>
    <td>{{ $d->tanggal }}</td>
    <td>{{ $d->no_invoice }}</td>
    <td>{{ $d->proyek->kliendetail->nama_perusahaan }}</td>
    <td>
      <ul>
        @foreach($d->proyek->kliendetail->pic as $pic)
        <li>{{ $pic->tipe.' '.$pic->nama }}</li>
        @endforeach
      </ul>
    </td>
    <td>{{ $d->proyek->nama }}</td>
    <td>{{ $d->deskripsi }}</td>
    <td>{{ $d->total_tagihan }}</td>
    <td>{{ $d->terbayar }}</td>
    <td>{{ $d->tertagih }}</td>
    <td>
      <ul>
        @foreach($d->pajak as $pajak)
        <li>{{ $pajak->nama.' : '.$pajak->pajak }}</li>
        @endforeach
      </ul>
    </td>
    <td>{{ $d->rekening->bank }}</td>
    <td>{{ $d->ttd->nama_lengkap }}</td>
    {{-- @if('superadmin' == Auth::user()->role || 'finance' == Auth::user()->role)
    <td>
      @include('edit_button', ['link' => route('tugas.edit', [$d->id])])
      @include('delete_button', ['link' => route('tugas.destroy', [$d->id])])
    </td>
    @endif --}}
  </tr>
  @endforeach
</tbody>
@endsection

@include('import-datepicker')