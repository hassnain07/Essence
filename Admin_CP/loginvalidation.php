<?php 
include('connect.php');

if (isset($_POST['admin_login'])) {

  $email = $_POST['email'];
  $pass  = $_POST['password'];


  $sel_qry   =  "SELECT * FROM admin_info WHERE email = '".$email."' AND password = '".$pass."'";
  $run_sel   =  mysqli_query($conn,$sel_qry);

  $login_arr = mysqli_fetch_array($run_sel);

  $records   =  mysqli_num_rows($run_sel);

  if ($records > 0 ) {
    
    $_SESSION['admin_id']  = $login_arr['admin_id'];
   
    $okmsg  =  base64_encode('Logged In Successfully');
    header("Location:dashboard.php?okmsg=$okmsg");
    exit;
  }
  else {
    $errormsg  =  base64_encode('Email or password is Incorrect');
    header("Location:index.php?errormsg=$errormsg");
    exit;
  }
















}

?>