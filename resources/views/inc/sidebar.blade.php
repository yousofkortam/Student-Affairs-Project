<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
            <img src="{{ Vite::asset('resources/imgs/avatar.jpg') }}" >
        </div>
        <div class="user-info">
          <span class="user-name">{{ Auth()->user()->first_name }}
            <strong>{{ Auth()->user()->last_name }}</strong>
          </span>
          <span class="user-role"> {{Auth()->user()->role->role_name }} </span>
        </div>
      </div>
      <!-- sidebar-header  -->
      
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
            <i class="fa fa-book" aria-hidden="true"></i>
              <span>Courses</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="#">Courses</a>
                    </li>
                    <!-- Course Registeration for Student -->
                    <li>
                        <a href="#">Course Registeration</a>
                    </li>
                </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-file"></i>
              <span>Materials</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Upload Materials</a>
                </li>
              </ul>
            </div>
           
          </li>
         
           <li class="header-menu">
            <span>Extra</span>
           </li>

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-lock"></i>
              <span>Admin</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Add Student</a>
                </li>
                <li>
                  <a href="#">Add Doctor</a>
                </li>
                <li>
                  <a href="#">Add Course</a>
                </li>
                <li>
                    
                </li>
              </ul>
            </div>
          </li>

        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
   
  </nav>
</div>