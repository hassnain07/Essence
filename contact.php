<?php
include('connect.php');

if (isset($_POST['send_message'])) {
    
    $name      = $_POST['name'];
    $email     = $_POST['email'];
    $phone_no  = $_POST['phone_no'];
    $message   = $_POST['message'];
    $status    = 1;
    $date      = date('y-m-d');

    $inser_msg    = "INSERT INTO messages  SET
                       name     = '".$name."',
                       email    = '".$email."',
                       phone_no = '".$phone_no."',
                       message  = '".$message."',
                       status   = '".$status."',
                       add_date = '".$date."'
                       
     ";
    $sending_msg  = mysqli_query($conn,$inser_msg);

    if ($sending_msg) {
        echo "<script>
        alert('Message sent successfully!')
        </script>";
    }
    else {
        echo "<script>
        alert('Oops!! Error sending your message')
        </script>";
    }
    

   
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Essence - Fashion Ecommerce Template</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <?php 
   include('header.php');
   ?>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <?php 
   include('cart.php');
   ?>
    <!-- ##### Right Side Cart End ##### -->


    <div class="contact-area d-flex align-items-center">

        <div class="google-map">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 align="center">Contact Us</h1>
                        <br>
                        <form action="" method="post">
                            <div class="col-md-8 offset-2">
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" style="line-height:2rem;" required>
                            <br>
                            </div>
                            <div class="col-md-8 offset-2">
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" style="line-height:2rem;" required>
                            </div>
                            <br>
                            <div class="col-md-8 offset-2">
                            <input type="text" name="phone_no" class="form-control" placeholder="Phone Number" style="line-height:2rem;" required>
                            </div>
                            <br>
                            <div class="col-md-8 offset-2">
                            <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Type your message here...." required></textarea>
                            </div>
                            <br>
                            
                            <center><input type="submit" name="send_message" id=""  value="Send Message" class="btn btn-primary"></center>
                        </form>

                    </div>
                </div>
            </div>

        </div>

        <div class="contact-info">
            <h2>How to Find Us</h2>
            <p>Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus velit id urna vehicula, nec maximus est sollicitudin.</p>

            <div class="contact-address mt-50">
                <p><span>address:</span> 10 Suffolk st Soho, London, UK</p>
                <p><span>telephone:</span> +12 34 567 890</p>
                <p><a href="mailto:contact@essence.com">contact@essence.com</a></p>
            </div>
        </div>

    </div>

    <!-- ##### Footer Area Start ##### -->
  <?php include('footer.php')?>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script>
    <script src="js/map-active.js"></script>

</body>

</html>