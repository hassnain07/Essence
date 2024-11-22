<?php
include('connect.php');






if (isset($_GET['action']) && $_GET['action']= 'delete_order') {

   $order_id = $_GET['order_id'];
   

  $delqry = "DELETE FROM billing_details WHERE order_id ='".$order_id."'
  ";
  $rundel = mysqli_query($conn,$delqry);

  $delqry = "DELETE FROM order_details WHERE order_id ='".$order_id."'
  ";
  $rundel = mysqli_query($conn,$delqry);


  if ($rundel) {
    $okmsg =base64_encode("order deleted successfully");
    header("Location:delivered_orders.php?okmsg=$okmsg");
    exit;
    }
    else {
      $errormsg = base64_encode("order not deleted successfully");
      header("Location:delivered_orders.php?errormsg=$errormsg");
      exit;
    }

}

if (isset($_POST['update_status'])) {

    $order_id  = $_POST['order_id'];


  $update_order_status = 'UPDATE order_details SET
                          status = 2
                          WHERE order_id = "'.$order_id.'"
                              ';

    $update_order_status2 = 'UPDATE billing_details SET
    status = 2
    WHERE order_id = "'.$order_id.'"
        ';


  $runqry = mysqli_query($conn,$update_order_status);
  $runqry = mysqli_query($conn,$update_order_status2);

  if($runqry){
    $okmsg=base64_encode('Order status updated');
    header("Location:orders.php?okmsg=$okmsg");
    exit;
  }
  else {
    $errormsg=base64_encode('Brand not updated');
    header("Location:orders.php?errormsg=$errormsg");
    exit;
  }






}

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
    <link rel="stylesheet" href="  plugins/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- DataTables -->
    <link
      rel="stylesheet"
      href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"
    />
    <link
      rel="stylesheet"
      href="  plugins/datatables-responsive/css/responsive.bootstrap4.min.css"
    />
    <link
      rel="stylesheet"
      href="  plugins/datatables-buttons/css/buttons.bootstrap4.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="  dist/css/adminlte.min.css" />
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- headerfile contents -->
      <?php include('header.php')?>
      <!-- headerfile contents end-->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
            <?php include('msgs.php')?>
            </div>

            </div>
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Delivered Orders</h1>
              </div>
             

              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Delivered Orders</li>
                </ol>
              </div>
            </div>
            <!-- add new product -->

            <!-- Button trigger modal -->
         

            <!-- add new product end-->
          </div>

          <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <!-- /.card -->

                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Delivered orders are shown here</h3>
                  </div>

                  <!-- /.card-header -->
                  <div class="card-body">
                    <table
                    id="example1"
                    class="table table-bordered table-striped"
                  >
                    <thead>
                      <th class= "col-md-1 col-sm-2">Order Id:</th>
                      <th class="col-md-2 col-sm-4 ">Customer Name:</th>
                      <th class="col-md-2 col-sm-4 ">Customer Contact No.:</th>
                      <th class=" col-md-2 col-sm-4 ">Customer Address.:</th>
                      <th class=" col-md-4 col-sm-4 ">Orders:</th>
                      <th class= "col-md-1 col-sm-2">Action:</th>
                    </thead>
                    <tbody>

                    <?php
                    $sel_orders = "SELECT * FROM billing_details WHERE status = 2";
                    $run_sel    = mysqli_query($conn,$sel_orders);

                    while ($order_arr = mysqli_fetch_array($run_sel)) {
                       
                  
                    ?>
                    <tr>

                    <td><?php echo $order_arr['order_id'] ?></td>
                    <td><?php echo $order_arr['name'] ?></td>
                    <td><?php echo $order_arr['phone_no'] ?></td>
                    <td><?php echo $order_arr['address'] ?></td>


                    <td>

                    <table>


                        <?php
                        $sel_ordered_products  =  "SELECT * FROM order_details WHERE order_id = '".$order_arr['order_id']."'&& status = 2";
                        $run_sel_prods         = mysqli_query($conn,$sel_ordered_products);
                            
                        ?>

                        <thead>
                            <th>Product Name:</th>
                            <th>Product Price:</th>
                            <th>Product img:</th>
                            <th>Quantity:</th>
                        </thead>
                        <tbody>
                            <?php
                           while ($ordered_prods_arr = mysqli_fetch_array($run_sel_prods)) {
                            
                            ?>
                           <tr>
                            <td><?php echo $ordered_prods_arr['product_name']?></td>
                            <td><?php echo $ordered_prods_arr['product_price']?></td>
                            <td><img src="../<?php echo $ordered_prods_arr['product_img']?>" alt="" width="100%"></td>
                            <td><?php echo $ordered_prods_arr['quantity'] ?></td>
                           
                           
                           </tr>

                           <tr>
                            <td colspan=4>

                            <b>Total Price : </b><?php echo $ordered_prods_arr['total_price']?>


                            </td>
                           </tr>



                           <?php
                           }
                           ?>


                        </tbody>
                    </table>

                    </td>



                    <td>

                        <a href="delivered_orders.php?order_id=<?php echo $order_arr['order_id']?>&amp;action=delete_order" class="btn btn-danger btn-sm">Delete</a>
                        <br><br>
                    
                      
                    </td>
                   
                    </tr>

                     <?php
                       }
                     ?>
                   </tbody>
                    </table>





                  </div>
                </div>
              </div>
             </div>
          </div>        
        </section>


     
       </div>
     <?php include('footer.php')?>
    </div>





    
    <!-- /wrapper -->

    <!-- jQuery -->  
    <script src="  plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="  plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="  plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="  plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="  plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="  plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="  plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="  plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="  plugins/jszip/jszip.min.js"></script>
    <script src="  plugins/pdfmake/pdfmake.min.js"></script>
    <script src="  plugins/pdfmake/vfs_fonts.js"></script>
    <script src="  plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="  plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="  plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="  dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="  dist/js/demo.js"></script>

    <!-- Page specific script -->
  


 
  
  </body>
</html>
