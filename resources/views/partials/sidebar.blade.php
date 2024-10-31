<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{url('img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{$info['name']}}</span>
    </a>
    <!-- \Brand Logo -->
    
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
          <img class="img-circle elevation-2"
                    src="@if (!empty(auth()->guard('admin')->user()->pic_emp)) {{ url('uploads/profile/' . auth()->guard('admin')->user()->pic_emp) }} @else {{ url('img/no-image.png') }} @endif"
                    alt="{{ __('pic_emp') }}">
        
        </div>
          <div class="info">
            <a href="#" class="d-block">
            @if (Auth::guard('admin')->check())
                        {{ Auth::guard('admin')->user()->first_name }}
                        {{ Auth::guard('admin')->user()->middle_name }}
                        {{ Auth::guard('admin')->user()->last_name }}
                    @else
                    @endif
            </a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <!-- Admin sidebar -->
        @can('admin')
        @include('partials.admin_sidebar')
        <!-- \Admin sidebar -->
        <!-- Patient sidebar -->
        @elsecan('patient')
          @include('partials.patient_sidebar')
        @endcan
        <!-- \Patient sidebar -->
      <!-- /.sidebar-menu -->
    </div>
</aside>
<!-- /.sidebar -->