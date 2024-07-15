<header class="header">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex align-items-center px-3 justify-content-between " style="background-color: #00000000;">
      <div class="navbar-header">
        <a href="/admin/dashboard" class="navbar-brand">
          <div class="brand-text brand-big visible text-uppercase">
            <strong class="heading">WoodLand</strong>
          </div>
          <div class="brand-text brand-sm"><strong class="heading"></strong>W<strong>L</strong></div>
        </a>
        <button class="sidebar-toggle"><i class="fa-solid fa-left-right"></i></button>
      </div>

      <div class="list-inline-item logout">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <input class="logbut" type="submit" value="Logout">
        </form>
      </div>
    </div>
    </div>
  </nav>
</header>