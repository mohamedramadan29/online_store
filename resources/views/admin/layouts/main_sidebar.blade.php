

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src={{asset("assets/dist/img/AdminLTELogo.png")}} alt="AdminLTE" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src={{asset("assets/dist/img/user2-160x160.jpg")}} class="img-circl" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> Mohamed Ramadan </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link {{$route == 'dashboard' ? 'active' : ""}}" >
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{trans('main_sidebar.home')}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link {{$route == 'categories' ? 'active' : ""}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{trans('main_sidebar.categories')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item active">
                            <a href="{{route('categories.index')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{trans('main_sidebar.all_categories')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('categories.create')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{trans('main_sidebar.add_category')}}</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{$route == 'products' ? 'active' : ""}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{trans('main_sidebar.products')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item active">
                            <a href="{{route('products.index')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{trans('main_sidebar.all_products')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('products.create')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{trans('main_sidebar.add_new_product')}}</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit">   {{trans('main_sidebar.logout')}}  </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
