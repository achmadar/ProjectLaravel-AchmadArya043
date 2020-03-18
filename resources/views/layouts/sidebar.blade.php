<div class="sidebar" data-color="orange" {{ $hidden ?? '' }}>
  <!--
  Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
  <div class="logo">
    <a href="/home" class="simple-text logo-mini">
      <img src="{{ asset('img/logo.png') }}">
    </a>
    <a href="/home" class="simple-text logo-normal">
      {{ config('app.name', 'Laravel') }}
    </a>
  </div>

  <div class="sidebar-wrapper" id="sidebar-wrapper">

    <ul class="nav">

      <li class="@if ($activePage == 'home') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons shopping_shop"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      <li>
        <a data-toggle="collapse" href="#submenu" aria-expanded="false">
          <i class="fab fa-laravel"></i>
          <p>
            {{ __("User Management") }}
            <b class="caret"></b>
          </p>
        </a>

        <div class="collapse @if ($activePage == 'profile' || $activePage == 'users') show @endif " id="submenu">
          <ul class="nav">

            <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('users.profile', ['id'=>Auth::user()->id ]) }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("User Profile") }} </p>
              </a>
            </li>

            <li class="@if ($activePage == 'users') active @endif">
              <a href="{{ route('users.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("Manage Users") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="@if ($activePage == 'category') active @endif">
        <a href="{{ route('category.index') }}">
          <i class="now-ui-icons shopping_tag-content"></i>
          <p>{{ __('Category Item') }}</p>
        </a>
      </li>

      <li class="@if ($activePage == 'product') active @endif">
        <a href="{{ route('products.index') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Product List') }}</p>
        </a>
      </li>

    </ul>

  </div>

</div>