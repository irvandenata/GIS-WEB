
            {{-- <li class="nav-item {{ Request::is('wilayah/desa') ? 'active' : null }}"> <a class="nav-link" href="{{ route('wilayah.desa.index') }}"><i class="mdi mdi-pine-tree menu-icon"></i><span class="menu-title">Desa</span></a></li> --}}
            <aside class="main-sidebar  sidebar-dark-primary elevation-4  ">
              <!-- Brand Logo -->
              <a href="#" class="brand-link">
                <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">BPPD Prov. Kalbar</span>
              </a>
          
              <!-- Sidebar -->
              <div class="sidebar ">
                <!-- Sidebar user panel (optional) -->
                
          
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    {{-- <li class="nav-item ">
                      <a href="{{route('dashboard')}}" class="nav-link {{ Request::is('dashboard') ? 'active' : (Request::is('/') ? 'active' : null) }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                          
                        </p>
                      </a>
                     
                    </li> --}}


                    <li class="nav-item ">
                      <a href="{{route('map.index')}}" class="nav-link {{ Request::is('map') ? 'active' : (Request::is('/') ? 'active' : null) }}">
                        <i class="nav-icon fas fa-globe-asia"></i>
                        <p>
                          Map
                          
                        </p>
                      </a>
                     
                    </li>

                  
                   @auth
                   <li class="nav-item ">
                    <a href="{{route('potensi.index')}}" class="nav-link {{ Request::is('potensi') ? 'active' : null }}">
                      <i class="nav-icon fas fa-lightbulb"></i>
                      <p>
                        Data Potensi
                      </p>
                    </a>
                  </li>
                   <li class="nav-item">
                    <a href="{{route('bangunan.index')}}" class="nav-link {{ Request::is('bangunan') ? 'active' : null }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                          Jenis Pada Potensi
                        </p>
                      </a>
                    </li>

                    <li class="nav-item has-treeview {{ Request::is('wilayah/kabupaten') ? 'menu-open' :(Request::is('wilayah/kecamatan') ? 'menu-open' : (Request::is('wilayah/desa') ? 'menu-open' : null)) }} ">
                      <a href="#" class="nav-link {{ Request::is('wilayah/kabupaten') ? 'active' :(Request::is('wilayah/kecamatan') ? 'active' : (Request::is('wilayah/desa') ? 'active' : null)) }}">
                        <i class="nav-icon fas fa-map"></i>
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
                   @endauth
                   @guest
                   <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">
                      <i class="nav-icon fas fa-sign-in-alt"></i>
                      <p>
                        Masuk
                      </p>
                    </a>
                  </li>
                   @endguest

                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
              <!-- /.sidebar -->
            </aside>