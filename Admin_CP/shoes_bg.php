<?php
include('connect.php');


if (isset($_POST['add_bg'])) {



  $bg_img = date('ymdghsi').$_FILES['bg_name']['name'];
  $tempname    = $_FILES['bg_name']['tmp_name'];

  $dir         = "backgrounds";
  
  move_uploaded_file($tempname,$dir.'/'.$bg_img);

 


  $insertslider = "INSERT INTO shoes_bg SET
                              bg_name   ='".$dir."/".$bg_img."'
                            "  ;

  $runqry = mysqli_query($conn,$insertslider);

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


if (isset($_GET['action']) && $_GET['action']= 'delete_bg') {

   $bg_id = $_GET['bg_id'];
   

  $delqry = "DELETE FROM shoes_bg WHERE bg_id ='".$bg_id."'
  ";
  $rundel = mysqli_query($conn,$delqry);


  if ($rundel) {
    $okmsg =base64_encode("Background deleted successfully");
    header("Location:shoes_bg.php?okmsg=$okmsg");
    exit;
    }
    else {
      $errormsg = base64_encode("Background not deleted successfully");
      header("Location:shoes_bg.php?errormsg=$errormsg");
      exit;
    }

}

if (isset($_POST['update_bg'])) {

  $bg_id = $_POST['bg_id'];
  
  $bg_img = date('ymdghsi').$_FILES['bg_name']['name'];
  $tempname    = $_FILES['bg_name']['tmp_name'];

  $dir         = "backgrounds";
  
  move_uploaded_file($tempname,$dir.'/'.$bg_img);
 
    $update_bg = 'UPDATE shoes_bg SET
                              bg_name ="'.$dir."/".$bg_img.'"
                              WHERE bg_id = "'.$bg_id.'"
          ';
 

  $runqry = mysqli_query($conn,$update_bg);

  if($runqry){
    $okmsg=base64_encode('Background updated');
    header("Location:shoes_bg.php?okmsg=$okmsg");
    exit;
  }
  else {
    $errormsg=base64_encode('Background not updated');
    header("Location:shoes_bg.php?errormsg=$errormsg");
    exit;
  }






}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AdminLTE 3 | DataTables</title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="  plugins/fontawesome-free/css/all.min.css" />
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
                <h1>Shoes Category Background</h1>
              </div>
             

              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Shoes BG</li>
                </ol>
              </div>
            </div>
            <!-- add new product -->

            <!-- Button trigger modal -->
            <div class="row">
                <div class="col-md-12">
                <?php
                          
                          $selectingslider = "SELECT * FROM sliders";
                          $runsel          = mysqli_query($conn,$selectingslider);

                          if(mysqli_num_rows($runsel)<1){
                          
                          
              ?>

            <button
              type="button"
              class="btn btn-primary"
              data-toggle="modal"
              data-target="#modal-default"
              style="float:right;"

            >
            Add Shoes Background
            </button>

            <?php
                          }
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
                      <th class= "col-md-2 col-sm-2">Bg No:</th>
                      <th class="col-md-4 col-sm-4 ">BG image:</th>
                      <th class= "col-md-2 col-sm-2">Action:</th>
                    </thead>
                    <tbody>
                      
                        <?php
                          
                          $selectingslider = "SELECT * FROM shoes_bg";
                          $runsel          = mysqli_query($conn,$selectingslider);

                          if(!$runsel){
                          echo 'yeess';
                          }
                          $i =1;


                          while ( $getting_bg = mysqli_fetch_array($runsel) ) {
                            ?>
                          <tr>
                        <td><?php echo $i;?></td>
                        <td><img src="<?php echo $getting_bg['bg_name'];?>" width="50%" alt=""></td>

                        <td>
                          <a href="shoes_bg.php?bg_id=<?php echo $getting_bg['bg_id'];?>&amp;action=delete_bg"
                           class= "btn btn-danger btn-sm" name="delete_bg" onclick="javascript:return confirm('Are you sure?')">Delete</a>
                              <!-- Button trigger modal -->
                              <button
                              type="button"
                              class="btn btn-primary btn-sm"
                              data-toggle="modal"
                              data-target="#modal-update<?php echo $getting_bg['bg_id']?>"
                              >
                              Update
                              </button>

                        </td>

                        </tr>




                        <!-- update slider modal -->
                        <div class="modal fade" id="modal-update<?php echo $getting_bg['bg_id']?>">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title">Update Clothing Background</h4>
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
                                                  <label for="slider">Add Slider Images:</label>
                                                  <input type="file" class="form-group" name="bg_name" />
                                                </div>
                                                </div>

                                          
                                       

                                               
                                              
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                              <input type="reset" class="btn btn-default btn-sm" />
                                              <input
                                                type="submit"
                                                name="update_bg"
                                                id=""
                                                class="btn btn-primary btn-sm"
                                              />
                                              <input type="hidden" name="bg_id" value= "<?php echo $getting_bg['bg_id'];?>">
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
                        $i<=1;                        
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
                                        <h4 class="modal-title">Add Clothing Background</h4>
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
                                                  <label for="slider">Add Background Image:</label>
                                                  <input type="file" class="form-group" name="bg_name" />
                                                </div>
                                              </div>

                                         
                                       



                                            </div>
                                            <div class="modal-footer justify-content-between">
                                              <input type="reset" class="btn btn-default btn-sm" />
                                              <input
                                                type="submit"
                                                name="add_bg"
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
