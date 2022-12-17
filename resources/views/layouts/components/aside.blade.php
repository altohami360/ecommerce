<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div style="margin-top: -1rem;margin-bottom: 0rem" class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{ auth()->user()->avatar }}" alt="User Image"> 
        <div>
          <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
          <p class="app-sidebar__user-designation">{{ auth()->user()->email }}</p>
        </div>
      </div>
      <ul class="app-menu">
        <hr style="margin: 0">
        <li class="card-body" style="text-align: center;"><a class="btn btn-outline-primary btn-sm" href="{{ route('home') }}" target="_blank"><i class="app-menu__icon fa fa-external-link"></i>Visit Store</a></li>
        <li><a class="app-menu__item" href="{{ route('dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="{{ route('users.index') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Customers</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admins.index') }}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">administrators</span></a></li>
        <li><a class="app-menu__item" href="{{ route('products.index') }}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Products</span></a></li>
        <li><a class="app-menu__item" href="{{ route('orders.index') }}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Orders</span></a></li>
        <li><a class="app-menu__item" href="{{ route('categories.index') }}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Categories</span></a></li>
        <li><a class="app-menu__item" href="{{ route('brands.index') }}"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Brands</span></a></li>
        <li><a class="app-menu__item" href="{{ route('attributes.index') }}"><i class="app-menu__icon fa fa-th"></i><span class="app-menu__label">Attributes</span></a></li>
        <li><a class="app-menu__item" href="{{ route('settings.index') }}"><i class="app-menu__icon fa fa-gears"></i><span class="app-menu__label">Settings</span></a></li>
      </ul>
    </aside>