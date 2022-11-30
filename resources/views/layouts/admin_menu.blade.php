<?php
$menuData = [
    [
        'name' => 'Dashboard',
        'route' => 'admin.admin.dashboard',
        'className' => 'nav-icon fas fa-tachometer-alt'
    ],
    [
        'name' => 'Quản lý dự án',
        'route' => '',
        'className' => 'nav-icon fas fa-chart-pie',
        'subMenu' => [
            [
                'name' => 'Danh sách dự án',
                'route' => 'admin.product.index'
            ],
            [
                'name' => 'Danh sách danh mục',
                'route' => 'admin.product_category.index'
            ]
        ]
    ],
    [
        'name' => 'Quản lý liên hệ',
        'route' => 'admin.contact.index',
        'className' => 'nav-icon far fa-envelope'
    ],
    [
        'name' => 'Quản lý bài viết',
        'route' => '',
        'className' => 'nav-icon fas fa-book',
        'subMenu' => [
            [
                'name' => 'Danh sách bài viết',
                'route' => 'admin.post.index'
            ],
            [
                'name' => 'Danh sách danh mục',
                'route' => 'admin.category.index'
            ]
        ]
    ],
    [
        'name' => 'Cấu hình website',
        'route' => 'admin.setting.index',
        'className' => 'nav-icon fas fa-th'
    ],
];
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="#" onclick="event.preventDefault(); document.getElementById('js-logoutForm').submit();">Logout</a>
            <form action="{{ route('admin.admin.logout') }}" method="POST" id="js-logoutForm">@csrf</form>
        </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/') }}" target="_blank" class="brand-link text-center">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/images/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach ($menuData as $menu)
                @if (empty($menu['subMenu']))
                <li class="nav-item">
                    <a href="{{ !empty($menu['route']) ? route($menu['route']) : '#' }}" class="nav-link {{ $routeName == $menu['route'] ? 'active' : '' }}">
                        <i class="{{ $menu['className'] }}"></i>
                        <p>{{ $menu['name'] }}</p>
                    </a>
                </li>
                @else
                <?php
                $subRoutes = [];
                foreach ($menu['subMenu'] as $v) {
                    if (!empty($v['route'])) {
                        $subRoutes[] = $v['route'];
                    }
                }
                ?>
                <li class="nav-item {{ in_array($routeName, $subRoutes) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ in_array($routeName, $subRoutes) ? 'active' : '' }}">
                        <i class="{{ $menu['className'] }}"></i>
                        <p>
                            {{ $menu['name'] }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach($menu['subMenu'] as $subMenu)
                        <li class="nav-item">
                            <a href="{{ !empty($subMenu['route']) ? route($subMenu['route']) : '#' }}" class="nav-link {{ $routeName == $subMenu['route'] ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ $subMenu['name'] }}</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endif
                @endforeach
            </ul>
        </nav>
    </div>
</aside>
