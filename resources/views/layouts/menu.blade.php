<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ request()->route()->named('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.nutritions.index') }}" class="nav-link {{ request()->route()->named('admin.nutritions.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>{{ __('nutrition_menu') }}</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.cates.index') }}" class="nav-link {{ request()->route()->named('admin.cates.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>{{ __('cate_menu') }}</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.ingredients.index') }}" class="nav-link {{ request()->route()->named('admin.ingredients.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>{{ __('ingredient_menu') }}</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.foods.index') }}" class="nav-link {{ request()->route()->named('admin.foods.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>{{ __('food_menu') }}</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.menus.index') }}" class="nav-link {{ request()->route()->named('admin.menus.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>{{ __('menu_menu') }}</p>
    </a>
</li>
<li class="nav-item {{ request()->route()->named('admin.cala.*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->route()->named('admin.cala.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-shopping-cart"></i>
        <p>
            MeCaLa
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.cala.products.index') }}" class="nav-link {{ request()->route()->named('admin.cala.products.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>{{ __('product_menu') }}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.cala.transporters.index') }}" class="nav-link {{ request()->route()->named('admin.cala.transporters.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>{{ __('transporter_menu') }}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.cala.customers.index') }}" class="nav-link {{ request()->route()->named('admin.cala.customers.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>{{ __('customer_menu') }}</p>
            </a>
        </li>
    </ul>
</li>
