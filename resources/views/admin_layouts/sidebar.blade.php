<nav class="sidebar">
    <div class="sidebar-header">
      <a href="{{route('admin.dashboard')}}" class="sidebar-brand">
        Estate<span>Agency</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item nav-category">Customers</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#customers" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="user"></i>
            <span class="link-title">Customers</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="customers">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('customers.index')}}" class="nav-link">Index</a>
              </li>
              <li class="nav-item">
                <a href="{{route('customers.create')}}" class="nav-link">Create</a>
              </li>

            </ul>
          </div>
        </li>

          <li class="nav-item nav-category">Users</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button" aria-expanded="false" aria-controls="general-pages">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Users</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('users.index')}}" class="nav-link">Index</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('users.create')}}" class="nav-link">Create</a>
                </li>

              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Properties</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button" aria-expanded="false" aria-controls="general-pages">
              <i class="link-icon" data-feather="book"></i>
              <span class="link-title">Properties</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('properties.index')}}" class="nav-link">Index</a>
                </li>
                <li class="nav-item">
                  <a href="{{route('properties.create')}}" class="nav-link">Create</a>
                </li>

              </ul>
            </div>
          </li>
      </ul>
    </div>
  </nav>
