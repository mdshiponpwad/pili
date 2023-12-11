<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="{{ route('dashboard') }}" class="d-block" style="text-transform: capitalize;">{{ auth()->user()->name ?? '' }}</a>
          <span class="badge badge-warning">{{ auth()->user()->role ?? '' }}</span>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
              <a href="{{route('dashboard')}}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  DashBoard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
          </li>
          {{-- @if ($data->type == 'super_admin' || $data->type == 'admin') --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user text-orange"></i>
              <p>
                Manage User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none; margin-left:20px;">
              <li class="nav-item" style="font-size: 15px;">
                <a href="{{ route('get.user') }}" class="nav-link">
                  <i class="fa fa-check-circle nav-icon" aria-hidden="true"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bars text-orange"></i>
              <p>
                Manage Menu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none; margin-left:20px;">
              <li class="nav-item" style="font-size: 15px;">
                <a href="{{ route('menus') }}" class="nav-link">
                  <i class="fa fa-check-circle nav-icon" aria-hidden="true"></i>
                  <p>Menu List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-sliders-h text-blue"></i>

              <p>
                Manage Banar
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none; margin-left:20px;">
              <li class="nav-item" style="font-size: 15px;">
                <a href="{{ route('banar.list') }}" class="nav-link">
                    <i class="fas fa-check-circle nav-icon"></i>
                  <p>Banner List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sitemap text-info"></i>
              <p>
                Manage Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none; margin-left:20px;">
              <li class="nav-item" style="font-size: 15px;">
                <a href="{{route('categories')}}" class="nav-link">
                  <i class="fas fa-check-circle nav-icon"></i>
                  <p>Main Category</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-product-hunt text-green"></i>

              <p>
                Manage Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none; margin-left:20px;">
              <li class="nav-item" style="font-size: 15px;">
                <a href="{{route('products')}}" class="nav-link">
                  <i class="fas fa-check-circle nav-icon"></i>
                  <p>Product List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-autoprefixer text-info"></i>
              <p>
                Manage Attribute
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none; margin-left:20px;">
              <li class="nav-item" style="font-size: 15px;">
                <a href="{{route('attributes')}}" class="nav-link">
                  <i class="fas fa-check-circle nav-icon"></i>
                  <p>Product Attribute</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-autoprefixer text-info"></i>
              <p>
                Manage Order
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none; margin-left:20px;">
              <li class="nav-item" style="font-size: 15px;">
                <a href="{{route('order')}}" class="nav-link">
                  <i class="fas fa-check-circle nav-icon"></i>
                  <p>Product Order</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ url('admin/sales') }}" class="nav-link">
              <i class="nav-icon fas fa-sitemap text-info"></i>
              <p>
                Manage Sales
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('clients') }}" class="nav-link">
              <i class="nav-icon fab fa-cuttlefish text-info"></i>
              <p>
                Manage Satiesfied Client
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('blogs') }}" class="nav-link">
              <i class="nav-icon fab fa-blogger text-info"></i>
              <p>
                Manage Blog
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('socials') }}" class="nav-link">
              <i class="nav-icon fab fa-stripe-s"></i>
              <p>
                Manage CSR
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('gallery') }}" class="nav-link">
              <i class="nav-icon fas fa-images text-info"></i>
              <p>
                Manage Gallery
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('setting')}}" class="nav-link">
              <i class="nav-icon fas fa-cog text-info"></i>
              <p>
                Company Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('web-site-meta')}}" class="nav-link">
              <i class="nav-icon fas fa-tag text-info"></i>
              <p>
                Website Meta
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('ads.list')}}" class="nav-link">
              <i class="nav-icon fas fa-ad text-info"></i>
              <p>
                Manage Ads
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('message') }}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Manage Message
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('pages') }}" class="nav-link">
              <i class="nav-icon fas fa-sitemap text-info"></i>
              <p>
                Manage Page
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
