@include('table.atas')
<style>
@@media screen and (min-width: 426px) {
  .table-responsive {
    overflow: hidden;
  }
}
@@media screen and (max-width: 425px) {
  .table-responsive {
    overflow: auto;
  }
}
</style>
<div class="content-wrapper">
  <section class="content-header">
  <h1>
    <?=$title?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=url('')?>"><i class="fa fa-dashboard"></i> Dasbor</a></li>
  </ol>
</section>
  <section class="content">
    <div class="row">
      @include('success_msg')
      <div class="col-xs-12">
        @if(count($hariIni) > 0)
        <div class="box box-danger">
          <div class="box-header">
            <h3 class="box-title">Flash Sale Hari Ini</h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table id="dt" class="table table-bordered table-striped">
                @include('dasbor.template', ['data'=>$hariIni])
              </table>
            </div>
          </div>
        </div>
        @endif
        @if(count($besok) > 0)
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Flash Sale Besok</h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table id="dt" class="table table-bordered table-striped">
                @include('dasbor.template', ['data'=>$besok])
              </table>
            </div>
          </div>
        </div>
        @endif
        @if(count($yangAkanDatang) > 0)
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Flash Sale Yang Akan Datang</h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table id="dt" class="table table-bordered table-striped">
                @include('dasbor.template', ['data'=>$yangAkanDatang])
              </table>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </section>
</div>
@include('table.bawah')