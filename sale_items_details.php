<?php
$prod_id = $_GET['prod_id'];
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

    <style>
        .number-control {
  display: flex;
  align-items: center;
  
}






.number-quantity {
  padding: 0.25rem;
  width: 12vh;
  /* -moz-appearance: textfield; */
  position:relative;
  left:2vh;
  right:5vh;
  height:7vh;
  font-size:1.3rem;
  display: flex;
  align-items: center;


  
}



       .fav_items{
        height:12vh;
        border-bottom:1px solid #9f9f9f;
        display:flex;
        align-items:center;
        
        
    }

    .widget .catagories-menu li > a {
        COLOR: #7a7a7e;
        
    }

</style>

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

    <!-- ##### Single Product Details Area Start ##### -->
    <?php
    $sel_products     =  "SELECT * FROM sale_items WHERE product_id = '".$prod_id."'";
    $run_sel          =  mysqli_query($conn,$sel_products);

    $prod_arr         = mysqli_fetch_array($run_sel);
     

    ?>
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel" style="height:60vh; width:40vw; overflow:hidden; display:flex;
             align-items:center; margin:auto">

        <?php
              
              $sel_img     =  "SELECT * FROM product_images WHERE product_id = '".$prod_id."'";

              

              $run_sel_img =  mysqli_query($conn,$sel_img);
              
              
              while ($img_arr = mysqli_fetch_array($run_sel_img)) {

                
              
              ?>


              
                <img src="Admin_CP/product_images/<?php echo $img_arr['image_name']?>" alt="" 
                style="width:auto; height:50vh; margin:auto" >
                

                <?php
                  }
                  ?>
                  </div>
        </div>

        <!-- Single Product Description -->


        <div class="single_product_desc clearfix">

            <form class="cart-form clearfix" method="get" action="manage_cart.php">
            

            <span><?php echo $prod_arr['brand']?></span>
            <input type="hidden" value="<?php echo $prod_arr['brand']?>" name="brand_name">
            <input type="hidden" value="<?php echo $prod_arr['product_id']?>" name="pro_id">
            <input type="hidden" value="<?php echo $_SERVER['REQUEST_URI']?>" name="page_name">
            <?php
                
                $sel_img     =  "SELECT * FROM product_images WHERE product_id = '".$prod_id."'";
                $run_sel_img =  mysqli_query($conn,$sel_img);  
                
              $img_arr =    mysqli_fetch_array($run_sel_img);
             
              
            ?>
            <input type="hidden" value="Admin_CP/product_images/<?php echo $img_arr['image_name']?>" name="img_name">
            <a href="cart.php">
                <h2><?php echo $prod_arr['product_name']?></h2>
                <input type="hidden" value="<?php echo $prod_arr['product_name']?>" name="product_name">
            </a>
            <p class="product-price"><span class="old-price">$<?php echo $prod_arr['old_price']?></span>$<?php echo $prod_arr['new_price']?></p>

            <input type="hidden" value="<?php echo $prod_arr['new_price']?>" name="product_price">

            <p class="product-desc"><?php echo $prod_arr['product_description']?></p>

            <!-- Form -->
                <!-- Select Box -->
                <div class="select-box d-flex mt-50 mb-30">
                    <!-- <select name="select" id="productSize" class="mr-5 form-control">
                        <option value="XL">Size: XL</option>
                        <option value="X">Size: X</option>
                        <option value="M">Size: M</option>
                        <option value="S">Size: S</option>
                    </select>
                    <select name="select" id="productColor" class="form-control">
                        <option value="Black">Color: Black</option>
                        <option value="White">Color: White</option>
                        <option value="Red">Color: Red</option>
                        <option value="Purple">Color: Purple</option>
                    </select> -->

                </div>
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <button type="submit" name="add_to_cart" value="5" class="btn essence-btn">Add to cart</button>
                    <input type="number" name="quantity"  class="number-quantity iquantity mr-2 ml-2" min="1" value="1" max="10">
                    <!-- buy now -->
            
                    <!-- Favourite -->
                   
                </div>
            </form><br>

        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->

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

</body>

</html>