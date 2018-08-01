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
      <small> Control Panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=url('')?>"><i class="fa fa-dashboard"></i> Dasbor</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      @include('success_msg')
      @if(Auth::user()->role == 'admin')
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{ $totalMember }}</h3>
            <p>Member</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="{{ route('jadwal.index') }}" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-maroon">
          <div class="inner">
            <h3>{{ $totalMarketplace }}</h3>
            <p>Marketplace</p>
          </div>
          <div class="icon">
            <i class="fa fa-industry"></i>
          </div>
          <a href="{{ route('marketplace.index') }}" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      @endif
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{ $totalEvent }}</h3>
            <p>Event Sekarang</p>
          </div>
          <div class="icon">
            <i class="fa fa-calendar-check-o"></i>
          </div>
          <a href="{{ route('jadwal.index') }}" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ $totalDiproses }}</h3>
            <p>Diproses</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('order.index') }}" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{ $totalDiterima }}</h3>
            <p>Diterima</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{ route('order.index') }}" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-purple">
          <div class="inner">
            <h3>{{ $totalDitransfer }}</h3>
            <p>Ditransfer</p>
          </div>
          <div class="icon">
            <i class="fa fa-paypal"></i>
          </div>
          <a href="{{ route('order.index') }}" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      @if(count($hariIni) > 0)
      <div class="{{ Auth::user()->role == 'member' ? 'col-md-6' : 'col-xs-12' }}">
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
      </div>
      @endif
      @if(Auth::user()->role == 'member')
      <div class="col-md-6">
        <div class="box box-warning">
          <div class="box-header">
            <h3 class="box-title">Pesanan Anda</h3>
          </div>
          <div class="box-body">
            <table id="dt" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID Order</th>
                  <th>Marketplace</th>
                  <th>Produk</th>
                  <th>Waktu</th>
                  <th>Fee</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID Order</th>
                  <th>Marketplace</th>
                  <th>Produk</th>
                  <th>Waktu</th>
                  <th>Fee</th>
                  <th>Status</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($pesanan as $d)
                <tr>
                  <td>{{ $d->id_order }}</td>
                  <td>{{ $d->jadwal->marketplace->nama }}</td>
                  <td>{{ $d->jadwal->produk }}</td>
                  <td>{{ $d->jadwal->waktu }}</td>
                  <td align="right">{{ $d->jadwal->fee_rp }}</td>
                  <td>
                    @if($d->status == 'diproses')
                    <span class="label label-danger">
                      {{ $d->status }}
                    </span>
                    @elseif($d->status == 'diterima')
                    <span class="label label-warning">
                      {{ $d->status }}
                    </span>
                    @else
                    <span class="label label-success">
                      {{ $d->status }}
                    </span>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @endif
      <div class="col-xs-12">
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