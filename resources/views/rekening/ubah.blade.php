@extends('app.form')
@section('content')
<div class="content-wrapper">
  @include('page_header2')

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        @include('error_msg')
        <!-- Horizontal Form -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?=$title?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form action="<?=$action?>" method="post" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="box-body">
              <div class="form-group">
                <label for="bank" class="col-lg-2 control-label">Bank</label>
                <div class="col-sm-6">
                  <input required="required" name="bank" value="{{ old('bank') ? old('bank') : $d->bank }}" type="text" class="form-control" id="bank" placeholder="Bank">
                </div>
              </div>
              <div class="form-group">
                <label for="atas_nama" class="col-lg-2 control-label">Atas Nama</label>
                <div class="col-sm-6">
                  <input required="required" name="atas_nama" value="{{ old('atas_nama') ? old('atas_nama') : $d->atas_nama }}" type="text" class="form-control" id="atas_nama" placeholder="Atas Nama">
                </div>
              </div>
              <div class="form-group">
                <label for="no_rek" class="col-lg-2 control-label">No Rekening</label>
                <div class="col-sm-6">
                  <input required="required" name="no_rek" value="{{ old('no_rek') ? old('no_rek') : $d->no_rek }}" type="text" class="form-control" id="no_rek" placeholder="No Rekening">
                </div>
              </div>
              <div class="form-group">
                <label for="kantor_cabang" class="col-lg-2 control-label">Kantor Cabang</label>
                <div class="col-sm-6">
                  <input required="required" name="kantor_cabang" value="{{ old('kantor_cabang') ? old('kantor_cabang') : $d->kantor_cabang }}" type="text" class="form-control" id="kantor_cabang" placeholder="Kantor Cabang">
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              @include('batal_btn')
              @include('simpan_btn')
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
        <!-- /.box -->
      </div>

      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endsection