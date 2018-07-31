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
            <div class="box-body">
              <div class="form-group">
                <label for="nama" class="col-lg-2 control-label">Nama</label>
                <div class="col-sm-6">
                  <input name="nama" value="{{ old('nama') }}" type="text" class="form-control" id="nama" placeholder="Nama">
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