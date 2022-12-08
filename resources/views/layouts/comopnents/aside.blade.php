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
        <li><a class="app-menu__item" href="{{ route('dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="{{ route('users.index') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Customers</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admins.index') }}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">administrators</span></a></li>
        <li><a class="app-menu__item" href="{{ route('products.index') }}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Products</span></a></li>
        <li><a class="app-menu__item" href="{{ route('categories.index') }}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Categories</span></a></li>
        <li><a class="app-menu__item" href="{{ route('brands.index') }}"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Brands</span></a></li>
        <li><a class="app-menu__item" href="{{ route('attributes.index') }}"><i class="app-menu__icon fa fa-th"></i><span class="app-menu__label">Attributes</span></a></li>
        <li><a class="app-menu__item" href="{{ route('settings.index') }}"><i class="app-menu__icon fa fa-gears"></i><span class="app-menu__label">Settings</span></a></li>
      </ul>
    </aside>