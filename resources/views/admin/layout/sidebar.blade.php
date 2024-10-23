<?php
use App\Http\Controllers\HomeController; 
?> 
<aside class="main-sidebar sidebar-light-primary elevation-4"> 
    <a class="brand-link text-center">
        <span class="brand-text font-weight-bold ">TP Store</span>
    </a> 
    <div class="sidebar">   
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.dashboard') }}"
                    class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p class="text-capitalize">Thống kê</p>
                </a>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href=""
                                class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p class="text-capitalize">Thống kê</p>
                            </a>
                        </li>
                    </ul> --}}
                </li>

                <li
                    class="nav-item">
                    <a href=""
                        class="nav-link">
                        <i class="nav-icon text-sm fas fa-layer-group"></i>
                        <p class="text-capitalize">
                            Group Sản Phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('productList.index') }}"
                                class="nav-link">
                                <i class="nav-icon text-sm fas fa-boxes"></i>
                                <p class="text-capitalize">
                                    Danh Mục Sản Phẩm
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('publisher.index') }}"
                                class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p class="text-capitalize">
                                    Nhà Xuất Bản
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product.index') }}"
                                class="nav-link ">
                                <i class="nav-icon fas fa-th"></i>
                                <p class="text-capitalize">
                                    Danh Sách sản phẩm
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('warehouse.index') }}"
                                class="nav-link ">
                                <i class="nav-icon fas fa-th"></i>
                                <p class="text-capitalize">
                                    Quản lý kho
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item ">
                    <a href="#"
                        class="nav-link">
                        <i class="nav-icon text-sm fas fa-layer-group"></i>
                        <p class="text-capitalize">
                            Group Đơn Hàng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href=""
                                class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p class="text-capitalize">
                                    Đơn hàng
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link">
                                <i class="nav-icon text-sm fas fa-boxes"></i>
                                <p class="text-capitalize">
                                    Đơn nhập
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li
                    class="nav-item ">
                    <a href="#"
                        class="nav-link">
                        <i class="nav-icon text-sm fas fa-users"></i>
                        <p class="text-capitalize">
                            Group users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p class="text-capitalize">
                                    Danh Sách Nhân Viên
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p class="text-capitalize">
                                    Danh Sách Người Dùng
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p class="text-capitalize">
                                    Danh sách vai trò
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#"
                        class="nav-link ">
                        <i class="nav-icon far fa-image"></i>
                        <p class="text-capitalize">
                           Photo
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p class="text-capitalize">
                            Bài Viết tin tức
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link">
                        <i class="nav-icon text-sm fas fa-cogs"></i>
                        <p class="text-capitalize">
                            Cấu Hình Chung
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
