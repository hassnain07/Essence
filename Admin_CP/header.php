<?php

if (isset($_SESSION['admin_id'])) {
   
  $okmsg  =  base64_encode('Welcome Back');
  //  echo "<script>
  //     // window.location.href = 'dashboard.php'
        
  //      </script>";

}

else {
   $errormsg  = base64_encode('Please Login first');
   header("Location:index.php?errormsg=$errormsg");
   exit;
}



?>


<!-- Navbar -->
<!-- <div class="pb-5"></div> -->
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img
      src="dist/img/AdminLTELogo.png"
      alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3"
      style="opacity: 0.8"
    />
    <span class="brand-text font-weight-light">Hassnain hafeez</span>
  </a>
  <br>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->


    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input
          class="form-control form-control-sidebar"
          type="search"
          placeholder="Search"
          aria-label="Search"
        />
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul
        class="nav nav-pills nav-sidebar flex-column"
        data-widget="treeview"
        role="menu"
        data-accordion="false"
      >
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="dashboard.php" class="nav-link header_Elements" id="mydiv" >
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="categories.php" class="nav-link header_Elements" >
            <i class="nav-icon fa fa-bars"></i>
            <p> Categories</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="latestproducts.php" class="nav-link header_Elements" >
            <i class="nav-icon fa fa-barcode"></i>
            <p> Products</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="brands.php" class="nav-link header_Elements" >
            <i class="nav-icon fa fa-bold"></i>
            <p>Brands</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="sliders.php" class="nav-link header_Elements" >
            <i class="nav-icon fa fa-arrows-alt"></i>
            <p>Sliders</p>
          </a>
        </li>
        
        <!-- <li class="nav-item">
          <a href="clothing_bg.php" class="nav-link header_Elements" >
            <i class="nav-icon fas fa-th"></i>
            <p>Clothing BG</p>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a href="shoes_bg.php" class="nav-link header_Elements" >
            <i class="nav-icon fas fa-th"></i>
            <p>Shoes BG</p>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a href="accessories_bg.php" class="nav-link header_Elements" >
            <i class="nav-icon fas fa-th"></i>
            <p>Accessories BG</p>
          </a>
        </li> -->
        <li class="nav-item">
          <a href="sale_slider.php" class="nav-link header_Elements" >
            <i class="nav-icon fa fa-arrows-alt"></i>
            <p>Sale Slider</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="sale_items.php" class="nav-link header_Elements" >
            <i class="nav-icon fas fa-th"></i>
            <p>Sale Items</p>
          </a>
        </li>
      
        <li class="nav-item">
          <a href="messages.php" class="nav-link header_Elements" >
            <i class="nav-icon fas fa-envelope"></i>
            <p>Messages</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="replied_msgs.php" class="nav-link header_Elements" >
            <i class="nav-icon fas fa-envelope-square"></i>
            <p>Replied Messages</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="orders.php" class="nav-link header_Elements" >
            <i class="nav-icon 	fa fa-bar-chart"></i>
            <p>Orders</p>
          </a>
        </li>
      
        <li class="nav-item">
          <a href="delivered_orders.php" class="nav-link header_Elements" >
            <i class="nav-icon fa fa-bar-chart"></i>
            <p>Delivered Orders</p>
          </a>
        </li>
      
        <li class="nav-item">
          <a href="logout.php" class="nav-link header_Elements" onclick="javascript:return confirm('Do you want to Logout?')" >
            <i class="nav-icon 	fa fa-external-link"></i>
            <p>Logout</p>
          </a>
        </li>

        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

   <!-- jQuery -->
   <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

<script>

 const activePage = window.location;
 const navlinks   = document.querySelectorAll('nav a').forEach(link => {
  if(link.href.includes(`${activePage}`))
  {
    link.classList.add('active');
  }
 });




</script>
