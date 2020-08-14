
            {{-- <li class="nav-item {{ Request::is('wilayah/desa') ? 'active' : null }}"> <a class="nav-link" href="{{ route('wilayah.desa.index') }}"><i class="mdi mdi-pine-tree menu-icon"></i><span class="menu-title">Desa</span></a></li> --}}
            <aside class="main-sidebar  sidebar-dark-primary elevation-4  ">
              <!-- Brand Logo -->
              <a href="index3.html" class="brand-link">
                <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
              </a>
          
              <!-- Sidebar -->
              <div class="sidebar ">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                    <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                  </div>
                </div>
          
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item ">
                      <a href="{{route('dashboard')}}" class="nav-link {{ Request::is('dashboard') ? 'active' : (Request::is('/') ? 'active' : null) }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                          
                        </p>
                      </a>
                     
                    </li>

                    <li class="nav-item ">
                      <a href="{{route('potensi.index')}}" class="nav-link {{ Request::is('potensi') ? 'active' : null }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Data Potensi
                        </p>
                      </a>
                     
                    </li>
                   
                    <li class="nav-item">
                    <a href="{{route('bangunan.index')}}" class="nav-link {{ Request::is('bangunan') ? 'active' : null }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                          Banguanan 
                        </p>
                      </a>
                    </li>
                    
                    <li class="nav-item has-treeview {{ Request::is('wilayah/kabupaten') ? 'menu-open' :(Request::is('wilayah/kecamatan') ? 'menu-open' : (Request::is('wilayah/desa') ? 'menu-open' : null)) }} ">
                      <a href="#" class="nav-link {{ Request::is('wilayah/kabupaten') ? 'active' :(Request::is('wilayah/kecamatan') ? 'active' : (Request::is('wilayah/desa') ? 'active' : null)) }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                          Data Wilayah
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{route('wilayah.kabupaten.index')}}" class="nav-link {{ Request::is('wilayah/kabupaten') ? 'active' : null }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kabupaten</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{route('wilayah.kecamatan.index')}}" class="nav-link {{ Request::is('wilayah/kecamatan') ? 'active' : null }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kecamatan</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{route('wilayah.desa.index')}}" class="nav-link {{ Request::is('wilayah/desa') ? 'active' : null }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Desa</p>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                          Keluar
                        </p>
                      </a>
                     

                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                   </form>
                    </li>
                   
                    
                   
                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
              <!-- /.sidebar -->
            </aside>