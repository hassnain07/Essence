<?php
include('connect.php');

if (isset($_POST['addproduct'])) {

  $brand                 = $_POST['brand_name'];
  $product_name          = $_POST['product_name'];
  $old_price             = $_POST['old_price'];
  $new_price             = $_POST['new_price'];
  $product_description   = $_POST['product_description'];
  $sale_percentage       = $_POST['sale_percentage'];


  
  

  $insertionQry = "INSERT INTO sale_items SET
                          
                          brand                = '".$brand."',
                          product_name         = '".$product_name."',
                          old_price            = '".$old_price."',
                          new_price            = '".$new_price."',
                          product_description  = '".$product_description."',
                          sale_percentage      = '".$sale_percentage."'
  ";

  $runinsertion = mysqli_query($conn,$insertionQry);

    $product_id   =  mysqli_insert_id($conn);


   foreach ($_FILES['product_img']['tmp_name']as $key => $value) {


     $filename = date('ymdghsi').$_FILES['product_img']['name'][$key];
     $tmp_name = $_FILES['product_img']['tmp_name'][$key];

     $dir = 'product_images';
     $upload = move_uploaded_file($tmp_name,$dir."/".$filename);

       
     $inserpics = mysqli_query($conn,"INSERT INTO product_images SET
                             
                             product_id = '".$product_id."',
                             image_name = '".$filename."'
     ");


    
  }



 




}


if (isset($_GET['action']) && $_GET['action']= 'deleteproduct') {

  $prodid = $_GET['prodid'];   


  $delqry    = 'DELETE FROM sale_items WHERE product_id ="'.$prodid.'"';
  $rundelqry = mysqli_query($conn,$delqry);


  if (!$rundelqry) {
    echo "cannot delete";
  }
  else {
  }

}


if (isset($_POST['updateproduct'])) {

  
  $prodid                = $_POST['product_id'];   
  $brand                 = $_POST['brand_name'];
  $product_name          = $_POST['product_name'];
  $old_price             = $_POST['old_price'];
  $new_price             = $_POST['new_price'];
  $product_description   = $_POST['product_description'];
  $sale_percentage       = $_POST['sale_percentage'];


  if(!empty($_FILES['product_img'])){

    $delqry =  mysqli_query($conn,"DELETE FROM product_images WHERE product_id = '".$prodid."'");
  
     
     foreach ($_FILES['product_img']['tmp_name'] as $key => $value) {
       
    
       $filename = date('ymdghsi').$_FILES['product_img']['name'][$key];
       $tmp_name = $_FILES['product_img']['tmp_name'][$key];
    
       $dir = 'product_images';
       $upload = move_uploaded_file($tmp_name,$dir."/".$filename);
    
       $inserpics = mysqli_query($conn,"INSERT INTO product_images SET
                               
                               image_name       = '".$filename."',
                               product_id       = '".$prodid."'                            
       ");
  
       $updateqry = "UPDATE sale_items SET
                          
                          brand                = '".$brand."',
                          product_name         = '".$product_name."',
                          old_price            = '".$old_price."',
                          new_price            = '".$new_price."',
                          product_description  = '".$product_description."',
                          sale_percentage      = '".$sale_percentage."'
                          WHERE  product_id    = '".$prodid."'
                      ";

                $runupdate = mysqli_query($conn,$updateqry);
  
  
   }
     
   }
   else {
  
          $updateqry = "UPDATE sale_items SET
                                      
                brand                = '".$brand."',
                product_name         = '".$product_name."',
                old_price            = '".$old_price."',
                new_price            = '".$new_price."',
                product_description  = '".$product_description."',
                sale_percentage      = '".$sale_percentage."'
                WHERE  product_id    = '".$prodid."'
            ";

            $runupdate = mysqli_query($conn,$updateqry);
   }

 



  if ($runupdate) {
    // echo "success";
  }
  else {
    die('not updated');
  }

  



  foreach ($_FILES['product_img']['tmp_name'] as $key => $value) {


    $filename = date('ymdghsi').$_FILES['product_img']['name'][$key];
    $tmp_name = $_FILES['product_img']['tmp_name'][$key];

    $dir = 'product_images';
    $upload = move_uploaded_file($tmp_name,$dir."/".$filename);

    $inserpics = mysqli_query($conn,"UPDATE product_images SET
                            
                            image_name       = '".$filename."'
                            WHERE product_id = '".$prodid."'
                            
    ");


   
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
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Products Table</h1>
              </div>

              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">sale items</li>
                </ol>
              </div>
            </div>
            <!-- add new product -->

            <!-- Button trigger modal -->
            <div class="row">
              <div class="col-md-12">

             
            <button
              type="button"
              class="btn btn-primary"
              data-toggle="modal"
              data-target="#modal-default"
              style="float:right;"

            >
              Add New Product
            </button>
            </div>
            </div>

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
                    <h3 class="card-title">Sale items are shown here</h3>
                  </div>

                  <!-- /.card-header -->
                  <div class="card-body">
                    <table
                      id="example1"
                      class="table table-bordered table-striped"
                    >
                      <thead>
                        <th>Brand Name:</th>
                        <th>Product Name:</th>
                        <th>Product Image:</th>
                        <th>Product Description:</th>
                        <th>Sale Percentage:</th>
                        <th>Old Price:</th>
                        <th>New Price:</th>
                        <th>Action:</th>
                      </thead>
                      <tbody>
                        <?php 
                         $selqry = "SELECT * FROM sale_items WHERE status = '1'";
                         $runsel = mysqli_query($conn,$selqry);

                          while ($getproddata = mysqli_fetch_array($runsel)) {
                            ?>

                        <tr>
                          <td><?php echo $getproddata['brand'];?></td>
                          <td><?php echo $getproddata['product_name'];?></td>
                          <td>
                          <?php
                          $product_id            = $getproddata['product_id'];
                          $selecting_images      =  "SELECT * FROM product_images WHERE product_id = '".$product_id."' LIMIT 1";
                          $run_sele_imgs         = mysqli_query($conn,$selecting_images);

                          while ($img_arr= mysqli_fetch_array($run_sele_imgs)) {
     
                          ?>


                          <img src="product_images/<?php echo $img_arr['image_name']?>" alt="" width="50%">

                          <?php
                          }
                          ?>
                          </td>

                          <td><?php echo $getproddata['product_description'];?></td>
                          <td><?php echo $getproddata['sale_percentage'];?></td>
                          <td><?php echo $getproddata['old_price'];?></td>
                          <td><?php echo $getproddata['new_price'];?></td>
                          <td>
                            <a
                             href="sale_items.php?prodid=<?php
                             echo $getproddata['product_id']?>&amp;action=deleteproduct"
                              name="deleteproduct"
                              value="Delete"
                              class="btn btn-danger btn-sm"
                              onclick="javascript:return confirm('Are you sure?')"
                            >Delete</a>
                            <br><br>
                            <a type="button" class="btn btn-info btn-sm" data-toggle="modal" 
                            data-target="#modal-update<?php echo $getproddata['product_id'];?>">
                             Update
                           </a>
                          </td>
                        </tr>
                           <!-- Update modal -->
    <div class="modal fade" id="modal-update<?php echo $getproddata['product_id'];?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update Product</h4>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <label for="brand_name">Brand Name:</label>
                  <input type="text" name="brand_name" class="form-control" value="<?php echo $getproddata['brand']?>" />
                </div>
                <div class="col-md-6">
                  <label for="product_name">Product Name:</label>
                  <input type="text" name="product_name" class="form-control"   value="<?php echo $getproddata['product_name']?>" />
                </div>
                <div class="col-md-6">
                  <label for="product_price">Old Price:</label>
                  <input
                    type="text"
                    name="old_price"
                    class="form-control"
                    value="<?php echo $getproddata['old_price']?>"
                  />
                </div>
                <div class="col-md-6">
                  <label for="product_price">New Price:</label>
                  <input
                    type="text"
                    name="new_price"
                    class="form-control"
                    value="<?php echo $getproddata['new_price']?>"
                  />
                </div>
              </div>
              <br />

              <div class="row">
                <div class="col-md-6">
                  <label for="product_img">Add product Images:</label>
                  <input type="file" class="form-group" name="product_img[]" multiple/>
                </div>
                <div class="col-md-6">
                  <label for="product_img">Add Sale Percentage:</label>
                  <input type="number" name="sale_percentage" id="" class="form-control"  value="<?php echo $getproddata['sale_percentage']?>">
                </div>
                <div class="col-md-12">
                  <label for="product_description">Describe your Product</label>
                  <textarea
                    name="product_description"
                    id=""
                    cols="30"
                    rows="5"
                    class="form-control"
                    value=""
                  ><?php echo $getproddata['product_description']?></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <input type="reset" class="btn btn-default btn-sm" />
              <input
                type="submit"
                name="updateproduct"
                id=""
                class="btn btn-primary btn-sm"
              />
              <input type="hidden" name="product_id" id="" value="<?php echo $getproddata['product_id']?>">
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- Update modal end -->
                        <?php 
                          }
                          ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <!-- <footer class="main-footer">
        <div class="float-right d-none d-sm-block"><b>Version</b> 3.1.0</div>
        <strong
          >Copyright &copy; 2014-2021
          <a href="https://adminlte.io">AdminLTE.io</a>.</strong
        >
        All rights reserved.
      </footer> -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

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
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add Product</h4>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <label for="brand_name">Brand Name:</label>
                  <input type="text" name="brand_name" class="form-control" />
                </div>
                <div class="col-md-6">
                  <label for="product_name">Product Name:</label>
                  <input type="text" name="product_name" class="form-control" />
                </div>
                <div class="col-md-6">
                  <label for="product_price">Old Price:</label>
                  <input
                    type="text"
                    name="old_price"
                    class="form-control"
                  />
                </div>
                <div class="col-md-6">
                  <label for="product_price">New Price:</label>
                  <input
                    type="text"
                    name="new_price"
                    class="form-control"
                  />
                </div>
              </div>
              <br />

              <div class="row">
                <div class="col-md-6">
                  <label for="product_img">Add product Images:</label>
                  <input type="file" class="form-group" name="product_img[]" multiple/>
                </div>
                <div class="col-md-6">
                  <label for="product_img">Add Sale Percentage:</label>
                  <input type="number" name="sale_percentage" id="" class="form-control">
                </div>
                <div class="col-md-12">
                  <label for="product_description">Describe your Product</label>
                  <textarea
                    name="product_description"
                    id=""
                    cols="30"
                    rows="5"
                    class="form-control"
                  ></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <input type="reset" class="btn btn-default btn-sm" />
              <input
                type="submit"
                name="addproduct"
                id=""
                class="btn btn-primary btn-sm"
              />
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


<!--  
    <script>
      $(function () {
        $("#example1")
          .buttons()
          .container()
          .appendTo("#example1_wrapper .col-md-6:eq(0)");
        $("#example2").DataTable({
          paging: true,
          lengthChange: false,
          searching: false,
          ordering: true,
          info: true,
          autoWidth: false,
          responsive: true,
        });
      });
    </script> -->
  </body>
</html>
