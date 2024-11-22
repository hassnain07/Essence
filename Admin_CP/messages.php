<?php
include('connect.php');




if (isset($_GET['action']) && $_GET['action'] == 'deletemessage') {

   $msg_id = $_GET['msg_id'];
 

  $delqry = "DELETE FROM messages WHERE msg_id ='".$msg_id."'";
  $rundel = mysqli_query($conn,$delqry);


  if ($rundel) {
   
    $okmsg =base64_encode("Message deleted successfully");
    header("Location:messages.php?okmsg=$okmsg");
    exit;
    }
    else {
      $errormsg = base64_encode("Message not deleted successfully");
      header("Location:messages.php?errormsg=$errormsg");
      exit;
    }

}




if (isset($_GET['action']) && $_GET['action'] == 'markreplied') {

    $msg_id = $_GET['msg_id2'];
 
 
   $updatestatus = "UPDATE messages SET
               
                       status       = '2'
                       WHERE msg_id ='".$msg_id."'";
   $runupdate = mysqli_query($conn,$updatestatus);
 
 
   if ($runupdate) {
     $okmsg =base64_encode("Message replied successfully");
     header("Location:messages.php?okmsg=$okmsg");
     exit;
     }
     else {
       $errormsg = base64_encode("Message not replied successfully");
       header("Location:messages.php?errormsg=$errormsg");
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
                <h1>Messages</h1>
              </div>
             

              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">DataTables</li>
                </ol>
              </div>
            </div>
          
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
                    <h3 class="card-title"></h3>
                  </div>

                  <!-- /.card-header -->
                  <div class="card-body">
                    <table
                    id="example1"
                    class="table table-bordered table-striped"
                     >
                    <thead>
                      <th class= "col-md-1 col-sm-2">Sr No:</th>
                      <th class="col-md-2 col-sm-4 ">Name:</th>
                      <th class="col-md-2 col-sm-4 ">Email:</th>
                      <th class="col-md-2 col-sm-4 ">Phone Number:</th>
                      <th class="col-md-3 col-sm-4 ">Message</th>
                      <th class="col-md-1 col-sm-4 ">Date</th>
                      <th class= "col-md-1 col-sm-2">Action:</th>
                    </thead>
                    <tbody>
                      
                        <?php
                          
                          $selectingmsg = "SELECT * FROM messages WHERE status = 1";
                          $runsel          = mysqli_query($conn,$selectingmsg);

                          if(!$runsel){
                          echo 'yeess';
                          }
                          $i =1;


                          while ( $gettingmessage = mysqli_fetch_array($runsel) ) {
                            ?>
                          <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $gettingmessage['name'];?></td>
                        <td><?php echo $gettingmessage['email'];?></td>
                        <td><?php echo $gettingmessage['phone_no'];?></td>
                        <td><?php echo $gettingmessage['message'];?></td>
                        <td><?php echo $gettingmessage['add_date'];?></td>

                        <td>
                          <a href="messages.php?msg_id=<?php echo $gettingmessage['msg_id'];?>&amp;action=deletemessage"
                           class= "btn btn-danger btn-sm" onclick="javascript:return confirm('Are you sure?')">Delete</a><br><br>
                              

                              <a href="messages.php?msg_id2=<?php echo $gettingmessage['msg_id'];?>&amp;action=markreplied"
                           class= "btn btn-primary btn-sm" >Mark <br>Replied</a>
                            

                        </td>

                        </tr>
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
