@extends('layouts.app')

@section('title')
  {{__('Dashboard')}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{url('plugins/swtich-netliva/css/netliva_switch.css')}}">
@endsection

@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            <i class="nav-icon fas fa-th"></i>
            {{__('Dashboard')}}
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">{{__('Dashboard')}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
@section('content')
@can('admin')

<!-- Admin Reports -->
<div class="row">
    <div class="col-lg-2 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{2}}</h3>
          <p>{{__('Sample')}}</p>
        </div>
        <div class="icon">
          <i class="fa fa-flask"></i>
        </div>
        <a href="" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-2 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{1}}</h3>
          <p>{{__('Sample')}}</p>
        </div>
        <div class="icon">
          <i class="fa fa-vial"></i>
        </div>
        <a href="" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-2 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{0}}</h3>
          <p>{{__('Sample')}}</p>
        </div>
        <div class="icon">
          <i class="fa fa-capsules"></i>
        </div>
        <a href="" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-2 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{4}}</h3>
          <p>{{__('Sample')}}</p>
        </div>
        <div class="icon">
          <i class="fa fa-user-injured"></i>
        </div>
        <a href="" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-2 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{2}}</h3>
          <p>{{__('Sample')}}</p>
        </div>
        <div class="icon">
          <i class="fas fa-file-contract nav-icon"></i>
        </div>
        <a href="" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-2 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{2}}</h3>
          <p>{{__('Sample')}}</p>
        </div>
        <div class="icon">
          <i class="fa fa-home"></i>
        </div>
        <a href="" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- today statistics -->
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-olive color-palette">
        <span class="info-box-icon">
          <i class="fas fa-money-bill-wave"></i>
        </span>

        <div class="info-box-content">
          <span class="info-box-text">{{__('Today income amount')}}</span>
          <span class="info-box-number">{{2}} {{get_currency()}}</span>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-olive color-palette">
        <span class="info-box-icon">
          <i class="fas fa-money-bill-wave"></i>
        </span>

        <div class="info-box-content">
          <span class="info-box-text">{{__('Today expense amount')}}</span>
          <span class="info-box-number">{{5}} {{get_currency()}}</span>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-olive color-palette">
        <span class="info-box-icon">
          <i class="fas fa-money-bill-wave"></i>
        </span>

        <div class="info-box-content">
          <span class="info-box-text">{{__('Today profit amount')}}</span>
          <span class="info-box-number">{{4}} {{get_currency()}}</span>
        </div>
      </div>
    </div>
    <!-- /today statistics -->

    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-primary">
        <span class="info-box-icon"><i class="fa fa-list"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">{{__('Sample')}}</span>
          <span class="info-box-number">{{4}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-warning">
        <span class="info-box-icon"><i class="fa fa-pause-circle"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">{{__('Sample')}}</span>
          <span class="info-box-number">{{2}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-success">
        <span class="info-box-icon"><i class="fa fa-check-double"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">{{__('Sample')}}</span>
          <span class="info-box-number">{{1}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-primary">
        <span class="info-box-icon"><i class="fa fa-list"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">{{__('Sample')}}</span>
          <span class="info-box-number">{{2}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-warning">
        <span class="info-box-icon"><i class="fa fa-pause-circle"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">{{__('Sample')}}</span>
          <span class="info-box-number">{{1}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-md-4 col-sm-6 col-12">
      <div class="info-box bg-success">
        <span class="info-box-icon"><i class="fa fa-check-double"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">{{__('Sample')}}</span>
          <span class="info-box-number">{{2}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
  </div>
  <!-- /.row -->
<!-- /Admin Reports -->

<!-- Online Users -->
<div class="row">
   <div class="col-lg-12">
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-wifi"></i> {{__('Online users')}} ( <span class="online_count">0</span> )</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body pt-0 pb-0">
        <ul class="products-list product-list-in-card pl-2 pr-2 online_list">
        </ul>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
<!-- \Online Users -->

<!-- Today scheduled visits -->
<div class="row">
  <div class="col-lg-12 table-responsive">
      <div class="card card-danger">
        <div class="card-header">
          <h5 class="card-title">
            <i class="fas fa-bell"></i> {{__('Today scheduled')}}  ( {{2}} )
          </h5>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body table-responsive">
         
        </div>
      </div>
       
  </div>
</div>
<!-- /Today scheduled visits -->
</div>
@endcan
@endsection

@section('scripts')
  <!-- Switch -->
  <script src="{{url('plugins/swtich-netliva/js/netliva_switch.js')}}"></script>
  <script src="{{url('js/admin/dashboard.js')}}"></script>
@endsection