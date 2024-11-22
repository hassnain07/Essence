<?php
include('connect.php');
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php
    include('title.php');
    ?>
    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- Tempusdominus Bootstrap 4 -->
    <link
      rel="stylesheet"
      href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"
    />
    <!-- iCheck -->
    <link
      rel="stylesheet"
      href="plugins/icheck-bootstrap/icheck-bootstrap.min.css"
    />
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
    <link
      rel="stylesheet"
      href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css"
    />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css" />
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

    
      <!-- headerfile contents -->
      <?php include('header.php')?>
          <!-- headerfile contents end-->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12">
        <?php include('msgs.php')?>
        </div>
          </div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Admin Dashboard</li>
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                  <?php 
              $sel_orders = "SELECT * FROM order_details WHERE status = 1";
              $run_sel  = mysqli_query($conn,$sel_orders);

              
              ?>


                    <h3><?php echo mysqli_num_rows($run_sel)?></h3>

                    <p>Pending Orders</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="orders.php" class="small-box-footer"
                    >More info <i class="fas fa-arrow-circle-right"></i
                  ></a>
                </div>
              </div>
              <!-- ./col -->

              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                  <?php 
              $sel_orders = "SELECT * FROM order_details WHERE status = 2";
              $run_sel  = mysqli_query($conn,$sel_orders);

              
              ?>


                    <h3><?php echo mysqli_num_rows($run_sel)?></h3>

                    <p>Delivered Orders</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="delivered_orders.php" class="small-box-footer"
                    >More info <i class="fas fa-arrow-circle-right"></i
                  ></a>
                </div>
              </div>
              <?php 
              $sel_msgs = "SELECT * FROM messages WHERE status = 1";
              $run_sel  = mysqli_query($conn,$sel_msgs);

              
              ?>
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3><?php echo mysqli_num_rows($run_sel);?><sup style="font-size: 20px"></sup></h3>

                    <p>New Messages</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <a href="messages.php" class="small-box-footer"
                    >More info <i class="fas fa-arrow-circle-right"></i
                  ></a>
                </div>
              </div>


              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                  <?php 
              $sel_orders = "SELECT * FROM products WHERE status = 1";
              $run_sel  = mysqli_query($conn,$sel_orders);

              
              ?>


                    <h3><?php echo mysqli_num_rows($run_sel)?></h3>

                    <p>Total Products</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-th"></i>
                  </div>
                  <a href="latestproducts.php" class="small-box-footer"
                    >More info <i class="fas fa-arrow-circle-right"></i
                  ></a>
                </div>
              </div>


              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                  <?php 
              $sel_orders = "SELECT * FROM sale_items WHERE status = 1";
              $run_sel  = mysqli_query($conn,$sel_orders);

              
              ?>


                    <h3><?php echo mysqli_num_rows($run_sel)?></h3>

                    <p>Sale Products</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-th"></i>
                  </div>
                  <a href="sale_items.php" class="small-box-footer"
                    >More info <i class="fas fa-arrow-circle-right"></i
                  ></a>
                </div>
              </div>


              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                  <?php 
              $sel_orders = "SELECT * FROM sale_items WHERE status = 1";
              $run_sel  = mysqli_query($conn,$sel_orders);

              
              ?>


                    <h3><?php echo mysqli_num_rows($run_sel)?></h3>

                    <p>Total Categories</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-bars"></i>
                  </div>
                  <a href="categories.php" class="small-box-footer"
                    >More info <i class="fas fa-arrow-circle-right"></i
                  ></a>
                </div>
              </div>


              <?php 

              $sel_cats= "SELECT * FROM categories WHERE status = 1";
              $run_sel  = mysqli_query($conn,$sel_cats);


               while ($cats_arr = mysqli_fetch_array($run_sel)) {
               ?>


               <div class="col-lg-3 col-6" >
                <!-- small box -->
                <div class="small-box bg-warning" style="box-sizing:border-box">
                  <div class="inner">
                  <?php 
              $sel_cat_items = "SELECT * FROM products WHERE category = '".$cats_arr['category_name']."'";
              $runsel  = mysqli_query($conn,$sel_cat_items);

              
              ?>


                    <h3><?php echo mysqli_num_rows($runsel)?></h3>

                    <p>Total Items In <br><?php echo $cats_arr['category_name']?></p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-bars"></i>
                  </div>
                  <a href="categories.php" class="small-box-footer"
                    >More info <i class="fas fa-arrow-circle-right"></i
                  ></a>
                </div>
              </div>



               <?php

               }
              
              
              ?>




              
         
         
            </div>
            <!-- /.row -->
            <!-- Main row -->
      
            <!-- /.row (main row) -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
       <?php include('footer.php')?>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
  </body>
</html>
