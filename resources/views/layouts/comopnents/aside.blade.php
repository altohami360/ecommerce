<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ auth()->user()->avatar }}" alt="User Image"> 
        {{-- https://via.placeholder.com/40.png/aaa --}}
        <div>
          <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
          <p class="app-sidebar__user-designation">Admin</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Users</span></a></li>
        <li><a class="app-menu__item {{ request()->is('admins*') ? 'active' : '' }}" href="{{ route('admins.index') }}"><i class="app-menu__icon fa-light fa-users"></i><span class="app-menu__label">Admins</span></a></li>
        <li><a class="app-menu__item {{ request()->is('admins*') ? 'active' : '' }}" href="{{ route('products.index') }}"><i class="app-menu__icon fa-light fa-product"></i><span class="app-menu__label">Products</span></a></li>
        <li><a class="app-menu__item {{ request()->is('categories*') ? 'active' : '' }}" href="{{ route('categories.index') }}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Categories</span></a></li>
        <li><a class="app-menu__item {{ request()->is('categories*') ? 'active' : '' }}" href="{{ route('brands.index') }}"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Brands</span></a></li>
        <li><a class="app-menu__item {{ request()->is('attributes*') ? 'active' : '' }}" href="{{ route('attributes.index') }}"><i class="app-menu__icon fa fa-th"></i><span class="app-menu__label">Attributes</span></a></li>
        <li><a class="app-menu__item {{ request()->is('sittings*') ? 'active' : '' }}" href="{{ route('settings.index') }}"><i class="app-menu__icon fa fa-gears"></i><span class="app-menu__label">Settings</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item py-2 px-4" href=""><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
            <li><a class="treeview-item py-2 px-4" href=""><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
          </ul>
        </li>
      </ul>
    </aside>