<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="index.html"><img src="admin/assets/images/logo.svg" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="admin/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="admin/assets/images/faces/face15.jpg" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
              <span>Gold Member</span>
            </div>
          </div>
         
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ url('view_category') }}">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Add Category</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ url('add_product') }}">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Add Product</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ url('show_product') }}">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Show Product</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ url('orders') }}">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Orders</span>
        </a>
      </li>
      


    </ul>
  </nav>