<header class="site-header">
  <a href="#" class="brand-main website_name">
    SAM K'S ADMINISTRATION
  </a>
  <a href="#" class="nav-toggle">
    <div class="hamburger hamburger--htla">
      <span>toggle menu</span>
    </div>
  </a>

    <ul class="action-list">
      <li>
        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="icon-fa icon-fa-cog"></i></a>
        <div class="dropdown-menu dropdown-menu-right notification-dropdown">
          <a class="dropdown-item" href="/admin/users/{{Auth::user()->slug}}"><i class="icon-fa icon-fa-user"></i> Profil</a>
          <a class="dropdown-item" href="/logout"><i class="icon-fa icon-fa-sign-out"></i> Logout</a>
        </div>
      </li>
    </ul>
</header>
