@extends('app.table')
@section('content')
<div class="content-wrapper">
  @include('page_header')

  <!-- Main content -->
  <section class="content">
    <div class="row">
      @include('success_msg')
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><?=$title?></h3>
            @include('tambah_button', [
              'link'  => url('rekening/tambah')
            ])
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="dt" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID Rekening</th>
                  <th>Bank</th>
                  <th>Atas Nama</th>
                  <th>No Rekening</th>
                  <th>Kantor Cabang</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($data as $d){
                  ?>
                  <tr>
                    <td><?=$d->id?></td>
                    <td><?=$d->bank?></td>
                    <td><?=$d->atas_nama?></td>
                    <td><?=$d->no_rek?></td>
                    <td><?=$d->kantor_cabang?></td>
                    <td>
                      @include('edit_button', [
                        'link' => url('rekening/ubah/'.$d->id)
                      ])
                      @include('delete_button', [
                        'link' => route('rekening.destroy', $d->id)
                      ])
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>ID Rekening</th>
                  <th>Bank</th>
                  <th>Atas Nama</th>
                  <th>No Rekening</th>
                  <th>Kantor Cabang</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<form action="" id="form-hapus" method="post">
  @method('delete')
  @csrf
</form>
<script>
  function hapus(link, e){
    e.preventDefault();
    if(confirm('Anda yakin ? ')){
      var f = document.getElementById('form-hapus');
      f.action = link;
      f.submit();
    }
  }
</script>
@endsection