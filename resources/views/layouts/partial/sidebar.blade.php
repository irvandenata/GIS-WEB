<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item {{ Request::is('dashboard') ? 'active' : (Request::is('/') ? 'active' :null) }}">
        <a class="nav-link " href="{{ route('dashboard') }}"">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Data Potensi</span>
          <i class="menu-arrow"></i>
        </a>

        <div class="collapse {{ Request::is('potensi/ekonomi') ? 'show' : (Request::is('potensi/listrik')? 'show' :( Request::is('potensi/ekonomi')? 'show' :null))   }}" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item {{ Request::is('potensi/ekonomi') ? 'active' : null }}"> <a class="nav-link" href="{{ route('potensi.ekonomi.index') }}"><i class="mdi mdi-scale menu-icon"></i><span class="menu-title">Ekonomi</span></a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html"><i class="mdi mdi-pine-tree menu-icon"></i><span class="menu-title">Tambang</span></a></li>
            <li class="nav-item "> <a class="nav-link" href="pages/ui-features/buttons.html"><i class="mdi mdi-pine-tree menu-icon"></i><span class="menu-title">Sosial</span></a></li>
            <li class="nav-item {{ Request::is('potensi/listrik') ? 'active' : null }}"> <a class="nav-link" href="{{ route('potensi.listrik.index') }}"><i class="mdi mdi mdi-flash menu-icon"></i><span class="menu-title">Listrik</span></a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html"><i class="mdi mdi-pine-tree menu-icon"></i><span class="menu-title">Lingkungan</span></a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ Request::is('bangunan') ? 'active' : null }} ">
      <a class="nav-link" href="{{route('bangunan.index')}}">
          <i class="mdi mdi-map-marker menu-icon"></i>
          <span class="menu-title">Data Bangunan</span>
        </a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Data Wilayah</span>
          <i class="menu-arrow"></i>
        </a>

        <div class="collapse {{ Request::is('wilayah/kabupaten') ? 'show' : (Request::is('wilayah/kecamatan')? 'show' :( Request::is('wilayah/desa')? 'show' :null))   }}" id="ui-basic2">
          <ul class="nav flex-column sub-menu">
           
            <li class="nav-item {{ Request::is('wilayah/kabupaten') ? 'active' : null }}"> <a class="nav-link" href="{{ route('wilayah.kabupaten.index') }}"><i class="mdi mdi-pine-tree menu-icon"></i><span class="menu-title">Kabupaten</span></a></li>
            <li class="nav-item {{ Request::is('wilayah/kecamatan') ? 'active' : null }}"> <a class="nav-link" href="{{ route('wilayah.kecamatan.index') }}"><i class="mdi mdi mdi-flash menu-icon"></i><span class="menu-title">Kecamatan</span></a></li>
            <li class="nav-item {{ Request::is('wilayah/desa') ? 'active' : null }}"> <a class="nav-link" href="{{ route('wilayah.desa.index') }}"><i class="mdi mdi-pine-tree menu-icon"></i><span class="menu-title">Desa</span></a></li>
          </ul>
        </div>
      </li>
      
      <li class="nav-item">
      <a class="nav-link" href="{{route('map')}}">
          <i class="mdi mdi-map-marker menu-icon"></i>
          <span class="menu-title">Maps Potensi</span>
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="documentation/documentation.html">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">Edit Akun</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
          <i class="mdi mdi-logout-variant menu-icon"></i>
          <span class="menu-title">Keluar</span>
          
        </a>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
          </form>
      </li>
    </ul>
  </nav>