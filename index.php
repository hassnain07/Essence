<?php
include('connect.php');
include('functions.php');
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

    <?php
  
       
    ?>
       
      <!-- header start -->
      <?php
      include('header.php');

    
      ?>
      <!-- header end -->
    <?php 
    // include('favorite_area.php');
    ?>
    <!-- ##### Right Side Cart Area ##### -->
      <?php
            include('cart.php');


      ?>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Welcome Area Start ##### -->

    <?php 
    $sel_sliders  =   "SELECT * FROM sliders";
    $run_sel      =  mysqli_query($conn,$sel_sliders);
    $slider_arr   =  mysqli_fetch_array($run_sel);
    ?>
    <section class="welcome_area bg-img background-overlay img-responsive" style="background-image: url(Admin_CP/<?php echo $slider_arr['slider_name']?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>asoss</h6>
                        <h2><?php echo $slider_arr['slider_text']?></h2>
                        <a href="shop.php" class="btn essence-btn">view collection</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
        

            <div class="row justify-content-center ">
                <!-- Single Catagory -->
                <?php 
                $sel_cat = "SELECT * FROM categories";
                $run_sel  = mysqli_query($conn,$sel_cat);

                while (  $cat_arr   = mysqli_fetch_array($run_sel)) {
             
                ?>
                <div class="col-12 col-sm-6 col-md-4 mt-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(Admin_CP/<?php echo $cat_arr['category_background']?>);">
                        <div class="catagory-content">
                            <a href="shop.php?cat_name=<?php echo $cat_arr['category_name']?>"><?php echo $cat_arr['category_name']?></a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>


               


            </div>

            

            

            


        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
     <?php
     $sel_slider  = "SELECT * FROM sale_slider LIMIT 1";
     $run_sel     = mysqli_query($conn,$sel_slider);

     $slider_arr = mysqli_fetch_array($run_sel);

     ?>

    <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-img background-overlay" style="background-image: url(Admin_CP/<?php echo $slider_arr['slider_name']?>);">
                        <div class="h-100 d-flex align-items-center justify-content-end">
                            <div class="cta--text" style="padding-right:10px;">
                                <h6><?php echo $slider_arr['sale_percentage']?>%</h6>
                                <h2><?php echo $slider_arr['slider_text']?></h2>
                                <a href="sales.php" class="btn essence-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Popular Products</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">

                    <?php 
                    
                    $sel_products   = "SELECT * FROM products WHERE status = 1 LIMIT 6";
                    $run_sel        = mysqli_query($conn,$sel_products);

                    while ($prod_arr = mysqli_fetch_array($run_sel)) {
                  
                    ?>

                        <!-- Single Product -->

                        <form action="manage_cart.php" method="get">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->

                            <a href="single-product-details.php?prod_id=<?php echo $prod_arr['product_id']?>">
                            <div class="product-img" style="height:50vh; display:flex; align-items:center;">
                                <?php
                                $sel_images   = "SELECT * FROM product_images WHERE 
                                product_id = '".$prod_arr['product_id']."' LIMIT 1";
                                $run_sel_img  = mysqli_query($conn,$sel_images);

                                while ($img_arr = mysqli_fetch_array($run_sel_img)) {
                             
                                ?>

                                <img src="Admin_CP/product_images/<?php echo $img_arr['image_name']?>" alt="">
                                <input type="hidden" name="img_name" value="Admin_CP/product_images/<?php echo $img_arr['image_name']?>">

                                <?php 
                                }
                                ?>

                                <!-- Hover Thumb
                                <img class="hover-img" src="img/product-img/product-2.jpg" alt=""> -->
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <form action="manage_cart.php" method="post">

                                    <?php
                                $sel_images   = "SELECT * FROM product_images WHERE 
                                product_id = '".$prod_arr['product_id']."' LIMIT 1";
                                $run_sel_img  = mysqli_query($conn,$sel_images);

                                $img_arr = mysqli_fetch_array($run_sel_img); 
                             
                                ?>

                                        <a href="manage_cart.php?prod_id=<?php echo $prod_arr['product_id']?> &prod_name=<?php echo $prod_arr['product_name']?>&prod_img=Admin_CP/product_images/<?php echo $img_arr['image_name']?>&price=<?php echo $prod_arr['product_price']?>&page_name=<?php echo $_SERVER['REQUEST_URI']?>"
                                         onclick="" class="favme fa fa-heart" ></a>
                                    
                                    </form>
                                        
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span><?php echo $prod_arr['brand']?></span>
                                <input type="hidden" name="brand_name" value="<?php echo $prod_arr['brand']?>">
                                
                                    <h6><?php echo $prod_arr['product_name']?></h6>
                                    <input type="hidden" id="name" name="product_name" value="<?php echo $prod_arr['product_name']?>">
                                
                                <p class="product-price"  >$<?php echo $prod_arr['product_price']?></p>
                                <input type="hidden" id="price" name="product_price" value="<?php echo $prod_arr['product_price']?>">
                                <input type="hidden" name="pro_id" value="<?php echo $prod_arr['product_id']?>">
                                <input type="hidden" id= "quantity" name="quantity" value="1">
                            <input type="hidden" name="page_name" value="<?php echo $_SERVER['REQUEST_URI']?>">
                                
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <button type="submit" name= "add_to_cart"  class="btn essence-btn">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        </form>

                        <?php
                    }
                        ?>

               
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->

    <!-- ##### Brands Area Start ##### -->
    <div class="brands-area d-flex align-items-center justify-content-between">

        <?php
        $sel_brands  = "SELECT * FROM brands";
        $run_sel     = mysqli_query($conn,$sel_brands);

        while ($brands_arr= mysqli_fetch_array($run_sel)) {
     
        ?>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="Admin_CP/<?php echo $brands_arr['brand_logo']?>" alt="">
        </div>

        <?php
        }
        ?>
      
    </div>
    <!-- ##### Brands Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
       <?php
       include('footer.php');
       ?>
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


   



    <script>

        function add_to_fav(prod_id,price,img) {

            // console.log(prod_id,price,img);







            // var prod_name  = $(`#prod_name`);
            // var prod_img   = $('#prod_img');
            // var prod_price = $('#prod_price');

            // var dataString = "prod_name=" + prod_name + '&prod_img=' + prod_img + '&prod_price =' + prod_price;

            // $.ajax({

            // type:"POST",
            // url: 'manage_cart.php',
            // data: {action:'yess'},
            // success: function(response){
            //     window.location = "manage_cart.php";
            
            // }

            // });

            

        }



        function mycart(prod_id){

            var quantity  = $('#quantity');
            var price     = $('#price');


            let id = prod_id;

            console.log(id);

            var dataString = "pro_id=" +  + '&quantity=' + quantity + '&price =' + price;


       $.ajax({

        type:"GET",
        url: 'manage_cart.php',
        data: dataString,
        success: function(response){
            window.location = "manage_cart.php";

         
        }

       });


        }
    </script>


    

</body>

</html>