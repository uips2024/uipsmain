@extends('layouts.app')

@section('title')
    {{ __('Create Reservation') }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.css') }}">
@endsection

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <h1 class="m-0 text-dark">
                            <i class="fa fa-cogs nav-icon"></i>
                            {{ __('Reservations') }}
                        </h1>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item "><a
                                href="{{ route('admin.reservations.index') }}">{{ __('Reservations') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Create Reservation') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Create Reservation') }}</h3>
        </div>
        <form method="POST" action="{{ route('admin.reservations.store') }}">
            <!-- /.card-header -->
            <div class="card-body">
                @csrf
                @include('admin.reservations._form')
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                
                <button type="submit" class="btn btn-primary" name="action" value="proceed">
                    <i class="fa fa-check"></i> {{ __('Proceed') }}
                </button>

                @can('view_reservation_admin')
                    <button type="submit" class="btn btn-primary" name="action" value="save">
                        <i class="fa fa-check"></i> {{ __('Save') }}
                    </button>
                @endcan

            </div>
    </div>

    </form>

    </div>
@endsection
@section('scripts')
    <script src="{{ url('js/admin/reservations.js') }}"></script>
@endsection
