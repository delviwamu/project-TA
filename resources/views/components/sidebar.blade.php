<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="{{ route('dasbor') }}" class="logo">
        <img src="{!! $siteLogo ? asset($siteLogo) : env('APP_LOGO') !!}" alt="navbar brand" class="navbar-brand" height="20" />
        <span class="text-light ps-2">{!! $siteTitle ?? 'site title' !!}</span>
      </a>
      <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
          <i class="gg-menu-right"></i>
        </button>
        <button class="btn btn-toggle sidenav-toggler">
          <i class="gg-menu-left"></i>
        </button>
      </div>
      <button class="topbar-toggler more">
        <i class="gg-more-vertical-alt"></i>
      </button>
    </div>
    <!-- End Logo Header -->
  </div>
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">
      
      @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('advokasi'))

      @endif

        <li class="nav-item active">
          <a data-bs-toggle="collapse" href="#dasbor" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Dasbor</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'dasbor' || Request::segment(2) == '') show @endif" id="dasbor">
            <ul class="nav nav-collapse">
              <li @if(Request::segment(2) == 'dasbor' || Request::segment(2) == '') class="active" @endif>
                <a href="{{ auth()->user()->hasRole('admin') ? route('dasbor') : route('dasbor') }}">
                  <span class="sub-item">Dasbor</span>
                </a>
              </li>
            </ul>
          </div>
        </li>





        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Statistik</h4>
        </li>


      

        <!-- Ringkasan Statistik -->
        <li class="nav-item @if(Request::segment(2) == 'statistik') active @endif">
          <a data-bs-toggle="collapse" href="#ringkasan-statistik" class="collapsed" aria-expanded="false">
            <i class="fas fa-chart-bar"></i>
            <p>Ringkasan Statistik</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'statistik') show @endif" id="ringkasan-statistik">
            <ul class="nav nav-collapse">
              
              <li @if(Request::segment(2) == 'statistik' && Request::segment(3) == 'anggota') class="active" @endif">
                <a href="{{ auth()->user()->hasRole('admin') ? route('dasbor') : route('dasbor') }}">
                  <span class="sub-item">Statistik Klien</span>
                </a>
              </li>
              
              <li @if(Request::segment(2) == 'statistik' && Request::segment(3) == 'anggota') class="active" @endif">
                <a href="{{ auth()->user()->hasRole('admin') ? route('dasbor') : route('dasbor') }}">
                  <span class="sub-item">Statistik Kasus Berdasarkan Status</span>
                </a>
              </li>
              

            </ul>
          </div>
        </li>



        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Manajemen Data</h4>
        </li>




        <!-- manajemen data -->
        <li class="nav-item @if(Request::segment(1) == 'client') active @endif">
          <a data-bs-toggle="collapse" href="#client" class="collapsed" aria-expanded="false">
            <i class="fas fa-users"></i>
            <p>Manajemen Klien</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(1) == 'client') show @endif" id="client">
            <ul class="nav nav-collapse">
              
              @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('advokasi'))
              <li @if(Request::segment(1) == 'client' && Request::segment(2) == 'create') class="active" @endif>
                <a href="{{ route('client.create') ? route('client.create') : route('dasbor') }}">
                  <span class="sub-item">Buat Klien Baru</span>
                </a>
              </li>
              @endif
              
              <li @if(Request::segment(1) == 'client' && Request::segment(2) == '') class="active" @endif>
                <a href="{{ route('client.index') ? route('client.index') : route('dasbor') }}">
                  <span class="sub-item">Data Klien</span>
                </a>
              </li>
              

            </ul>
          </div>
        </li>




        <!-- manajemen data -->
        <li class="nav-item @if(Request::segment(1) == 'client-case') active @endif">
          <a data-bs-toggle="collapse" href="#case" class="collapsed" aria-expanded="false">
            <i class="fas fa-suitcase"></i>
            <p>Manajemen Kasus</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(1) == 'client-case') show @endif" id="case">
            <ul class="nav nav-collapse">
              
              @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('advokasi'))
              <li @if(Request::segment(1) == 'client-case' && Request::segment(2) == 'create') class="active" @endif>
                <a href="{{ route('clientCase.create') ? route('clientCase.create') : route('dasbor') }}">
                  <span class="sub-item">Buat Kasus Baru</span>
                </a>
              </li>
              @endif
              
              <li @if(Request::segment(1) == 'client-case' && Request::segment(2) == '') class="active" @endif>
                <a href="{{ route('clientCase.index') ? route('clientCase.index') : route('dasbor') }}">
                  <span class="sub-item">Data Kasus</span>
                </a>
              </li>
              

            </ul>
          </div>
        </li>

        <!-- manajemen data -->
        <li class="nav-item @if(Request::segment(1) == 'court') active @endif">
          <a data-bs-toggle="collapse" href="#court" class="collapsed" aria-expanded="false">
            <i class="fas fa-building"></i>
            <p>Manajemen Sidang</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(1) == 'court') show @endif" id="court">
            <ul class="nav nav-collapse">
              
              @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('advokasi'))
              <li @if(Request::segment(1) == 'client' && Request::segment(2) == 'create') class="active" @endif>
                <a href="{{ route('clientCase.create') ? route('clientCase.create') : route('dasbor') }}">
                  <span class="sub-item">Buat Kasus Baru</span>
                </a>
              </li>
              @endif 
              
              <li @if(Request::segment(1) == 'client' && Request::segment(2) == '') class="active" @endif>
                <a href="{{ route('clientCase.index') ? route('clientCase.index') : route('dasbor') }}">
                  <span class="sub-item">Data Kasus</span>
                </a>
              </li>
              

            </ul>
          </div>
        </li>
           
            
      </ul>
    </div>
  </div>
</div>
<!-- End Sidebar -->