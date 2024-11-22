<?php
include('connect.php');
session_start();

if ($_SERVER['REQUEST_METHOD']== 'POST') {
    
    if (isset($_POST['place_order'])) {


        // Billing details.

        $name            = $_POST['f_name'];
        $address         = $_POST['address'];
        $phone_no        = $_POST['phone_no'];
        $email           = $_POST['email'];
        $g_total         = $_POST['g_total'];

      
    

        $insert_customer_details  =  "INSERT INTO billing_details SET

                            name        =   '".$name."',
                            address     =   '".$address."',
                            phone_no    =   '".$phone_no."',
                            email       =   '".$email."'
        ";

        $run_insertion   = mysqli_query($conn,$insert_customer_details);

        if ($run_insertion) 
        {
           $order_id   =  mysqli_insert_id($conn);

           $insert_order_details  = "INSERT INTO order_details SET

                                order_id      =  ?,
                                product_img   =  ?,
                                brand_name    =  ?,
                                product_name  =  ?,
                                quantity      =  ?,
                                product_price =  ?,
                                total_price   =  ?
           ";
          
           $stmt  =  mysqli_prepare($conn,$insert_order_details);

           if ($stmt)
            {

                mysqli_stmt_bind_param($stmt,"isssiis",$order_id,$product_img,$brand_name,$product_name,$quantity,$product_price,$total_price);
                
                foreach ($_SESSION['cart'] as $key => $value) {

                    $product_img   = $value['img_name'];
                    $brand_name    = $value['brand_name'];
                    $product_name  = $value['product_name'];
                    $product_price = $value['price'];
                    $quantity      = $value['qty'];
                    $total_price   = $g_total;
                    
                    mysqli_stmt_execute($stmt);
                    
                }
                
                session_destroy();
                echo "<script>
                alert('order placed');
                window.location.href = 'thanks.php';
                  </script>";

              
           }
           else
            {
                echo "<script>
                alert('Unable to insert order data')
                  </script>";
           }
        }
        else {
            echo "<script>
            alert('Unable to insert data')
              </script>";
        }







        // Order details.
        
        // $product_img     = $_POST['product_img'];
        // $brand_name      = $_POST['brand_name'];
        // $product_name    = $_POST['product_name'];
        // $product_price   = $_POST['product_price'];


       
    }
 




}


?>