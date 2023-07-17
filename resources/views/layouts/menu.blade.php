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
