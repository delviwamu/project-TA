<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="{{ route('admin.dasbor') }}" class="logo">
        <img src="{!! $siteLogo ?? '' !!}" alt="navbar brand" class="navbar-brand" height="20" />
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

        <li class="nav-item active">
          <a data-bs-toggle="collapse" href="#dasbor" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Dasbor</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'dasbor' || Request::segment(2) == '') show @endif" id="dasbor">
            <ul class="nav nav-collapse">
              <li @if(Request::segment(2) == 'dasbor' || Request::segment(2) == '') class="active" @endif>
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.dasbor') : route('admin.dasbor') }}">
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
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.statistik.anggota') : route('admin.statistik.anggota') }}">
                  <span class="sub-item">Statistik Anggota Berdasarkan Status</span>
                </a>
              </li>
              
              <li @if(Request::segment(2) == 'statistik' && Request::segment(3) == 'alumni') class="active" @endif">
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.statistik.alumni') : route('admin.statistik.alumni') }}">
                  <span class="sub-item">Statistik Alumni</span>
                </a>
              </li>
              
              <li @if(Request::segment(2) == 'statistik' && Request::segment(3) == 'program-studi') class="active" @endif">
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.statistik.programstudi') : route('admin.statistik.programstudi') }}">
                  <span class="sub-item">Statistik Program Studi, Fakultas & Universitas</span>
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


      

        <!-- klien -->
        <li class="nav-item submenu">
          <a data-bs-toggle="collapse" href="#klien" class="collapsed" aria-expanded="false">
            <i class="fas fa-users"></i>
            <p>Klien</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'klien') show @endif" id="klien">
            <ul class="nav nav-collapse">
              
              <li @if(Request::segment(2) == 'klien' && Request::segment(3) == '') class="active" @endif>
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.anggota') : route('admin.anggota') }}">
                  <span class="sub-item">Tambah Klien Baru</span>
                </a>
              </li>

              <li @if(Request::segment(3) == 'baru') class="active" @endif>
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.anggota.baru') : route('admin.anggota.baru') }}">
                  <span class="sub-item">Data Klien</span>
                </a>
              </li>

            </ul>
          </div>
        </li>

      

        <!-- kasus -->
        <li class="nav-item submenu @if(Request::segment(2) == 'kasus') active @endif" ">
          <a data-bs-toggle="collapse" href="#kasus" class="collapsed" aria-expanded="false">
            <i class="fas fa-file"></i>
            <p>Kasus</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'kasus') show @endif" id="kasus">
            <ul class="nav nav-collapse">
              
              <li @if(Request::segment(2) == 'kasus' && Request::segment(3) == '') class="active" @endif>
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.anggota') : route('admin.anggota') }}">
                  <span class="sub-item">Tambah Kasus Baru</span>
                </a>
              </li>

              <li @if(Request::segment(3) == 'baru') class="active" @endif>
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.anggota.baru') : route('admin.anggota.baru') }}">
                  <span class="sub-item">Data Kasus</span>
                </a>
              </li>

            </ul>
          </div>
        </li>

      

        <!-- data master -->
        <li class="nav-item @if(Request::segment(2) == 'kampus' || Request::segment(2) == 'fakultas' || Request::segment(2) == 'programstudi') active @endif">
          <a data-bs-toggle="collapse" href="#data-master" class="collapsed" aria-expanded="false">
            <i class="fas fa-box"></i>
            <p>Data Master</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'kampus' || Request::segment(2) == 'fakultas' || Request::segment(2) == 'programstudi') show @endif" id="data-master">
            <ul class="nav nav-collapse">
              
              <li @if(Request::segment(2) == 'kampus') class="active" @endif>
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.kampus.index') : route('admin.kampus.index') }}">
                  <span class="sub-item">Kampus</span>
                </a>
              </li>

              <li @if(Request::segment(2) == 'fakultas') class="active" @endif>
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.fakultas.index') : route('admin.fakultas.index') }}">
                  <span class="sub-item">Fakultas</span>
                </a>
              </li>

              <li @if(Request::segment(2) == 'programstudi') class="active" @endif>
                <a href="{{ auth()->user()->hasRole('admin') ? route('admin.programstudi.index') : route('admin.programstudi.index') }}">
                  <span class="sub-item">Program Studi</span>
                </a>
              </li>

            </ul>
          </div>
        </li>
      
      @endif

      

      @if(auth()->user()->hasRole('staf'))

        <li class="nav-item active">
          <a data-bs-toggle="collapse" href="#dasbor" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Dasbor</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'dasbor' || Request::segment(2) == '') show @endif" id="dasbor">
            <ul class="nav nav-collapse">
              <li @if(Request::segment(2) == 'dasbor' || Request::segment(2) == '') class="active" @endif>
                <a href="{{ route('staf.dasbor') }}">
                  <span class="sub-item">Dasbor</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      
      @endif

      

      @if(auth()->user()->hasRole('pengacara'))

        <li class="nav-item active">
          <a data-bs-toggle="collapse" href="#dasbor" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Dasbor</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'dasbor' || Request::segment(2) == '') show @endif" id="dasbor">
            <ul class="nav nav-collapse">
              <li @if(Request::segment(2) == 'dasbor' || Request::segment(2) == '') class="active" @endif>
                <a href="{{ route('pengacara.dasbor') }}">
                  <span class="sub-item">Dasbor</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      
      @endif

      

      

      @if(auth()->user()->hasRole('lbh'))

        <li class="nav-item active">
          <a data-bs-toggle="collapse" href="#dasbor" class="collapsed" aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Dasbor</p>
            <span class="caret"></span>
          </a>
          <div class="collapse @if(Request::segment(2) == 'dasbor' || Request::segment(2) == '') show @endif" id="dasbor">
            <ul class="nav nav-collapse">
              <li @if(Request::segment(2) == 'dasbor' || Request::segment(2) == '') class="active" @endif>
                <a href="{{ route('lbh.dasbor') }}">
                  <span class="sub-item">Dasbor</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      
      @endif



           
            
      </ul>
    </div>
  </div>
</div>
<!-- End Sidebar -->