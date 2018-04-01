<header class="main-header">
    <a href="/admin/home" class="logo">
      <span class="logo-lg"><b>Exam System</b> Admin Page</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">{{ \Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                  {{ \Auth::user()->name }}
                  <small>{{ (\Auth::user()->id == 0) ? 'User' : 'Administrator' }}</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/admin/info" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <form method="POST" action="/logout">
                    @csrf
                    <input type="submit" value="Sign out" class="btn btn-default btn-flat">
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
</header>