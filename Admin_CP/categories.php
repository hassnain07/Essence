<?php
include('connect.php');


if (isset($_POST['add_category'])) {


    $category_name  = $_POST['category_name'];
    $category_bg    = date('ymdghsi').$_FILES['category_bg']['name'];
    $tempname       = $_FILES['category_bg']['tmp_name'];
  
    $dir         = "category_backgrounds";
    
    move_uploaded_file($tempname,$dir . "/" .$category_bg);

  $insert_category = "INSERT INTO categories SET
                              category_background  ='".$dir."/".$category_bg."',
                              category_name        = '".$category_name."'
                            "  ;

  $runqry = mysqli_query($conn,$insert_category);


  if($runqry){
    $okmsg=base64_encode('Category added');
    header("Location:categories.php?okmsg=$okmsg");
    exit;
  }
  else {
    $errormsg=base64_encode('Category not added');
    header("Location:categories.php?errormsg=$errormsg");
    exit;
  }


}

// // if (isset($_POST['addslider'])) {

  

//   // active slider:

//   $active_slider_img = date('ymdghsi').$_FILES['active_slider']['slider_name'];
//   $tempname    = $_FILES['active_slider']['tmp_name'];

//   $dir_2       = "sliders/active_sliders";
  
//   move_uploaded_file($tempname,$dir_2.'/'.$active_slider_img);


//   $insertslider = 'INSERT INTO sliders SET
//   active_slider ="'.$dir_2."/".$active_slider_img.'"
//   ';

//   $runqry = mysqli_query($conn,$insertslider);

//     // active slider end.


// }


if (isset($_GET['action']) && $_GET['action']= 'delete_category') {

   $brand_id = $_GET['brand_id'];
   

  $delqry = "DELETE FROM categories WHERE category_id ='".$brand_id."'
  ";
  $rundel = mysqli_query($conn,$delqry);


  if ($rundel) {
    $okmsg =base64_encode("Category deleted successfully");
    header("Location:categories.php?okmsg=$okmsg");
    exit;
    }
    else {
      $errormsg = base64_encode("Category not deleted successfully");
      header("Location:categories.php?errormsg=$errormsg");
      exit;
    }

}

if (isset($_POST['update_category'])) {

    $category_id  = $_POST['category_id'];
    $category     = $_POST['category'];


    if (!empty($_FILES['cat_bg']['name'])) {

        $cat_bg      = date('ymdghsi').$_FILES['cat_bg']['name'];
        $tempname    = $_FILES['cat_bg']['tmp_name'];
      
        $dir         = "category_backgrounds";
        
        move_uploaded_file($tempname,$dir."/".$cat_bg);
    
      $update_category = 'UPDATE categories SET

                                  category_background  ="'.$dir."/".$cat_bg.'",
                                  category_name        ="'.$category.'"
                                  WHERE category_id    = "'.$category_id.'"
                                  ';
       
    }
    else {
        $update_category = 'UPDATE categories SET

                        category_name        ="'.$category.'"
                        WHERE category_id    = "'.$category_id.'"
                        ';
        
    }
   

 

  $runqry = mysqli_query($conn,$update_category);

  if($runqry){
    $okmsg=base64_encode('category updated');
    header("Location:categories.php?okmsg=$okmsg");
    exit;
  }
  else {
    $errormsg=base64_encode('category not updated');
    header("Location:categories.php?errormsg=$errormsg");
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
                <h1>Categories</h1>
              </div>
             

              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Brands</li>
                </ol>
              </div>
            </div>
            <!-- add new product -->

            <!-- Button trigger modal -->
            <div class="row">
              <div class="col-md-12">

              <?php
              $selecting_category = "SELECT * FROM categories";
              $runsel          = mysqli_query($conn,$selecting_category);

             
              ?>
            <button
              type="button"
              class="btn btn-primary"
              data-toggle="modal"
              data-target="#modal-default"
              style="float:right;"

            >
              Add New Category
            </button>
            <?php
         
            ?>
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
                

                  <!-- /.card-header -->
                  <div class="card-body">
                    <table
                    id="example1"
                    class="table table-bordered table-striped"
                  >
                    <thead>
                      <th class= "col-md-2 col-sm-2">Category No:</th>
                      <th class="col-md-4 col-sm-4 ">Category Name:</th>
                      <th class="col-md-4 col-sm-4 ">Category Background:</th>
                      <th class="col-md-4 col-sm-4 ">Total Category items:</th>
                      <th class= "col-md-2 col-sm-2">Action:</th>
                    </thead>
                    <tbody>
                      
                        <?php
                          
                          $selecting_category = "SELECT * FROM categories";
                          $runsele          = mysqli_query($conn,$selecting_category);

                          if(!$runsele){
                          echo 'yeess';
                          }
                          $i =1;


                          while ( $getting_category = mysqli_fetch_array($runsele) ) {
                            ?>
                          <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $getting_category['category_name']?></td>
                        <td><img src="<?php echo $getting_category['category_background']?>" width="100%" alt=""></td>
                        <?php
                         $cat_name      = $getting_category['category_name'];
                         $sel_cat_items = mysqli_query($conn,"SELECT * FROM products WHERE category = '".$cat_name."' ");
                         $item_no       = mysqli_num_rows($sel_cat_items);
                         ?>
                        <td><?php echo $item_no;?></td>

                        <td>
                          <!--  -->
                              <!-- Button trigger modal -->
                              <button
                              type="button"
                              class="btn btn-primary btn-sm"
                              data-toggle="modal"
                              data-target="#modal-update<?php echo $getting_category['category_id']?>"
                              >
                              Update
                              </button>

                        </td>

                        </tr>




                        <!-- update slider modal -->
                        <div class="modal fade" id="modal-update<?php echo $getting_category['category_id']?>">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title">Update Category</h4>
                                        <button
                                        type="button"
                                        class="close"
                                        data-dismiss="modal"
                                        aria-label="Close"
                                        >
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <hr>
                                        <div class="modal_body">
                                          <form method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                              
                                              
                                
                                              <div class="row">
                                                <div class="col-md-6">
                                                  <label for="slider">Add Category Background:</label>
                                                  <input type="file" class="form-group" name="cat_bg" />
                                                </div>
                                                
                                                    <div class="col-md-6">

                                                    <label for="slider">Add Category Name:</label>
                                                    <?php
                                                     $selecting_category = "SELECT * FROM categories";
                                                     $runselect          = mysqli_query($conn,$selecting_category);
                                                     $getting_category   = mysqli_fetch_array($runselect);

                                
                                                    ?>
                                                    <select name="category" id="" value="" class="form-control">
                                                        <option value="<?php echo $getting_category['category_name']?>" class='form-control' selected >Select a Category</option>
                                                <?php 
                                                  $selecting_category = "SELECT * FROM categories";
                                                  $runsel          = mysqli_query($conn,$selecting_category);
                                                while ($getting_options = mysqli_fetch_array($runsel)) {
                                                    ?>

                                                <option value="<?php echo $getting_options['category_name']?>"><?php echo $getting_options['category_name']?></option>

                                                    <?php
                                                }
                                                ?>
                                            </select>
                                                    </div>
                                                </div>
                                                

                                           

                                               
                                              
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                              <input type="reset" class="btn btn-default btn-sm" />
                                              <input
                                                type="submit"
                                                name="update_category"
                                                id=""
                                                class="btn btn-primary btn-sm"
                                              />
                                              <input type="hidden" name="category_id" value= "<?php echo $getting_category['category_id'];?>">
                                            </div>
                                          </form>
                                      </div>
  
                                        </div>
                                        <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                        </div>
  
                                        <!-- update slider modal end -->








                        <?php
                        $i++;                        
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


                                      <!-- add product modal -->
                                      <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title">Add Category</h4>
                                        <button
                                        type="button"
                                        class="close"
                                        data-dismiss="modal"
                                        aria-label="Close"
                                        >
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <hr>
                                        <div class="modal_body">
                                          <form method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                              
                                                
                                                <div class="row">
                                                  <div class="col-md-6">
                                                    <label for="slider">Add Category Name:</label>
                                                    <input type="text" class="form-control" name="category_name" />
                                                  </div>
                                                </div><br>
                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                    <label for="slider">Add Category Background:</label>
                                                    <input type="file" class="form-group" name="category_bg" />
                                                    </div>
                                                </div>
                                              

                                          
                                       



                                            </div>
                                            <div class="modal-footer justify-content-between">
                                              <input type="reset" class="btn btn-default btn-sm" />
                                              <input
                                                type="submit"
                                                name="add_category"
                                                id=""
                                                class="btn btn-primary btn-sm"
                                              />
                                            </div>
                                          </form>
                                      </div>
  
                                        </div>
                                        <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                        </div>
  
                                        <!-- add product modal end -->
                   
   

    
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
