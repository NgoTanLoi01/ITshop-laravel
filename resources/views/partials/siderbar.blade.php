  <!-- Main Sidebar Container -->
  <aside style="background-color: #1f2234" class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('home') }}" class="brand-link">
          <img src="{{ asset('AdminLTE/dist/img/login_logo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light"><b>Shopping</b></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar ">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              @if (Auth::check())
                  <div class="info">
                      <a href="" class="fas fa-user">
                          {{ Auth::user()->name }}
                      </a>
                  </div>
                  <div class="info">
                      <a href="{{ route('logout') }}">
                          Logout
                      </a>
                  </div>
              @else
                  <div class="info">
                      <a href="">
                          Guest
                      </a>
                  </div>
              @endif
          </div>


          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input style="background-color: #1f2234" class="form-control form-control-sidebar" type="search"
                      placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                      <button style="background-color: #1f2234" class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                  <li class="nav-item">
                      <a href="{{ route('categories.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Danh mục sản phẩm
                              <span class="right badge badge-danger"></span>
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('menus.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-bars"></i>
                          <p>
                              Menus
                              <span class="right badge badge-danger"></span>
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('product.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-shopping-cart"></i>
                          <p>
                              Sản phẩm
                              <span class="right badge badge-danger"></span>
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('slider.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-sliders-h"></i>
                          <p>
                              Slider
                              <span class="right badge badge-danger"></span>
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('settings.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-cog"></i>
                          <p>
                              Setting
                              <span class="right badge badge-danger"></span>
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                          <p>
                              Danh sách nhân viên
                              <span class="right badge badge-danger"></span>
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>

          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
