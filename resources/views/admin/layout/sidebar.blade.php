<?php
use App\Http\Controllers\HomeController;
$user = HomeController::getUser();
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link text-center">
        <span class="brand-text font-weight-bold ">TLBookstore</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel justify-content-center mt-3 pb-3 mb-3 d-flex text-light">

            <div class="info-hello">
                Xin chào, {{ $user->first_name }}
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

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (CheckPermissionAdmin($user->id, 'list_statistic'))
                <li class="nav-item {{ Route::current()->getName() === 'dashboard.index'  ? 'menu-open' : null }}">
                    <a href="#"
                        class="nav-link {{ Route::current()->getName() === 'dashboard.index' ? 'active' : null }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p class="text-capitalize">
                            Bảng điều khiển
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}"
                                class="nav-link {{ Route::current()->getName() === 'dashboard.index' ? 'active' : null }}">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p class="text-capitalize">Thống kê</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if (CheckPermissionAdmin($user->id, 'list_product,list_category,list_publisher,list_warehouse'))
                    <li
                        class="nav-item {{ Route::current()->getName() === 'product.index' || Route::current()->getName() === 'publisher.index' || Route::current()->getName() === 'categories.index' || Route::current()->getName() === 'product.warehouse' ? 'menu-open' : null }}">
                        <a href="#"
                            class="nav-link {{ Route::current()->getName() === 'product.index' || Route::current()->getName() === 'publisher.index' || Route::current()->getName() === 'categories.index' || Route::current()->getName() === 'product.warehouse' ? 'active' : null }}">
                            <i class="nav-icon text-sm fas fa-layer-group"></i>
                            <p class="text-capitalize">
                                Group Sản Phẩm
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if (CheckPermissionAdmin($user->id, 'list_category'))
                                <li class="nav-item">
                                    <a href="{{ route('categories.index') }}"
                                        class="nav-link {{ Route::current()->getName() === 'categories.index' ? 'active' : null }}">
                                        <i class="nav-icon text-sm fas fa-boxes"></i>
                                        <p class="text-capitalize">
                                            Danh Mục Sản Phẩm
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if (CheckPermissionAdmin($user->id, 'list_publisher'))
                                <li class="nav-item">
                                    <a href="{{ route('publisher.index') }}"
                                        class="nav-link {{ Route::current()->getName() === 'publisher.index' ? 'active' : null }}">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p class="text-capitalize">
                                            Nhà Xuất Bản
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if (CheckPermissionAdmin($user->id, 'list_product'))
                                <li class="nav-item">
                                    <a href="{{ route('product.index') }}"
                                        class="nav-link {{ Route::current()->getName() === 'product.index' ? 'active' : null }}">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p class="text-capitalize">
                                            Danh Sách sản phẩm
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if (CheckPermissionAdmin($user->id, 'list_warehouse'))
                                <li class="nav-item">
                                    <a href="{{ route('product.warehouse') }}"
                                        class="nav-link {{ Route::current()->getName() === 'product.warehouse' ? 'active' : null }}">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p class="text-capitalize">
                                            Quản lý kho
                                        </p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                @endif
                </li>
                @if (CheckPermissionAdmin($user->id, 'list_order', 'list_import_order'))
                    <li
                        class="nav-item {{ Route::current()->getName() === 'import_order.index' || Route::current()->getName() === 'order.index' ? 'menu-open' : null }}">
                        <a href="#"
                            class="nav-link {{ Route::current()->getName() === 'import_order.index' || Route::current()->getName() === 'order.index' ? 'active' : null }}">
                            <i class="nav-icon text-sm fas fa-layer-group"></i>
                            <p class="text-capitalize">
                                Group Đơn Hàng
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('order.index') }}"
                                    class="nav-link {{ Route::current()->getName() === 'order.index' ? 'active' : null }}">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p class="text-capitalize">
                                        Đơn hàng
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('import_order.index') }}"
                                    class="nav-link {{ Route::current()->getName() === 'import_order.index' ? 'active' : null }}">
                                    <i class="nav-icon text-sm fas fa-boxes"></i>
                                    <p class="text-capitalize">
                                        Đơn nhập
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                
                @if (CheckPermissionAdmin($user->id, 'list_user,list_role','list_member'))
                    <li
                        class="nav-item {{ Route::current()->getName() === 'users.index' || Route::current()->getName() === 'roles.index' || Route::current()->getName() === 'member.index' ? 'menu-open' : null }}">
                        <a href="#"
                            class="nav-link {{ Route::current()->getName() === 'users.index' || Route::current()->getName() === 'roles.index' ||  Route::current()->getName() === 'member.index' ? 'active' : null }}">
                            <i class="nav-icon text-sm fas fa-users"></i>
                            <p class="text-capitalize">
                                Group users
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if (CheckPermissionAdmin($user->id, 'list_user'))
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}"
                                        class="nav-link {{ Route::current()->getName() === 'users.index' ? 'active' : null }}">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p class="text-capitalize">
                                            Danh Sách Nhân Viên
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if (CheckPermissionAdmin($user->id, 'list_member'))
                                <li class="nav-item">
                                    <a href="{{ route('member.index') }}"
                                        class="nav-link {{ Route::current()->getName() === 'member.index' ? 'active' : null }}">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p class="text-capitalize">
                                            Danh Sách Người Dùng
                                        </p>
                                    </a>
                                </li>
                            @endif
                            @if (CheckPermissionAdmin($user->id, 'list_role'))
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}"
                                        class="nav-link {{ Route::current()->getName() === 'roles.index' ? 'active' : null }}">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p class="text-capitalize">
                                            Danh sách vai trò
                                        </p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                
                @if (CheckPermissionAdmin($user->id, 'list_slider'))
                    <li class="nav-item">
                        <a href="{{ route('slider.index') }}"
                            class="nav-link {{ Route::current()->getName() === 'slider.index' ? 'active' : null }}">
                            <i class="nav-icon far fa-image"></i>
                            <p class="text-capitalize">
                                Slider
                            </p>
                        </a>
                    </li>
                @endif
                @if (CheckPermissionAdmin($user->id, 'list_news'))
                    <li class="nav-item">
                        <a href="{{ route('news.index') }}"
                            class="nav-link {{ Route::current()->getName() === 'news.index' ? 'active' : null }}">
                            <i class="nav-icon fas fa-copy"></i>
                            <p class="text-capitalize">
                                Bài Viết tin tức
                            </p>
                        </a>
                    </li>
                @endif
                @if (CheckPermissionAdmin($user->id, 'list_setting'))
                    <li class="nav-item">
                        <a href="{{ route('setting.index') }}"
                            class="nav-link {{ Route::current()->getName() === 'setting.index' ? 'active' : null }}">
                            <i class="nav-icon text-sm fas fa-cogs"></i>
                            <p class="text-capitalize">
                                Cấu Hình Chung
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
