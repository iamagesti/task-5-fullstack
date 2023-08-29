<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard')?'active':'' }}" aria-current="page" href="/dashboard">
          <i class="bi bi-house"></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/posts*')?'active':'' }}" href="/dashboard/posts">
          <i class="bi bi-file-earmark-richtext"></i>
          My Posts
        </a>
    </ul>
    @can('admin')
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Administrator</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/categories*')?'active':'' }}" href="/dashboard/categories">
          <i class="bi bi-card-list"></i>
          Posts categories
        </a>
      </li>
    </ul>
    @endcan
  </div>
</nav>