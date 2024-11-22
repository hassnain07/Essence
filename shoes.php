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

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Shoes</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Categories</h6>

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#clothing">
                                        <a href="clothing.php">clothing</a>
                               
                                    </li>
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#shoes" class="collapsed">
                                        <a href="shoes.php">shoes</a>
                                   
                                    </li>
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#accessories" class="collapsed">
                                        <a href="accessories.php">accessories</a>
                                 
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                

                        <!-- ##### Single Widget ##### -->
                     

                        <!-- ##### Single Widget ##### -->
                        <div class="widget brands mb-50">
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Brands</p>
                            <div class="widget-desc">
                                <ul>
                                    <li><a href="#">Asos</a></li>
                                    <li><a href="#">Mango</a></li>
                                    <li><a href="#">River Island</a></li>
                                    <li><a href="#">Topshop</a></li>
                                    <li><a href="#">Zara</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <?php 

                                    $sel_products   = "SELECT * FROM products WHERE category = 'shoes'";
                                    $run_sel        = mysqli_query($conn,$sel_products);
                                    

                                    ?>

                                    
                                    <div class="total-products">
                                        <p><span><?php echo mysqli_num_rows($run_sel)?></span> products found</p>
                                    </div>
                                    <!-- Sorting -->
                                    <!-- <div class="product-sorting d-flex">
                                        <p>Sort by:</p>
                                        <form action="#" method="get">
                                            <select name="select" id="sortByselect">
                                                <option value="value">Highest Rated</option>
                                                <option value="value">Newest</option>
                                                <option value="value">Price: $$ - $</option>
                                                <option value="value">Price: $ - $$</option>
                                            </select>
                                            <input type="submit" class="d-none" value="">
                                        </form>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="row">

                        
                    <?php 
                    
                    $sel_products   = "SELECT * FROM products WHERE category = 'shoes'";
                    $run_sel        = mysqli_query($conn,$sel_products);

                    while ($prod_arr = mysqli_fetch_array($run_sel)) {
                  
                    ?>

                            <!-- Single Product -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <form action="manage_cart.php" method="get">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <a href="single-product-details.php?prod_id=<?php echo $prod_arr['product_id']?>">
                                    <div class="product-img" style="height:50vh; display:flex; align-items:center;">
                                        <?php 
                                        $sel_imgs    = "SELECT * FROM product_images WHERE product_id = '".$prod_arr['product_id']."' LIMIT 1";
                                        $run_sel_img = mysqli_query($conn,$sel_imgs);

                                        $img_arr     = mysqli_fetch_array($run_sel_img);
                    
                                        
                                        ?>
                                        <img src="Admin_CP/product_images/<?php echo $img_arr['image_name']?>" alt="">
                                        <input type="hidden" name="img_name" value="Admin_CP/product_images/<?php echo $img_arr['image_name']?>">
                                        <!-- Hover Thumb -->
                                        <!-- <img class="hover-img" src="img/product-img/product-2.jpg" alt=""> -->

                                        <!-- Product Badge -->
                                        <!-- <div class="product-badge offer-badge">
                                            <span>-30%</span>
                                        </div> -->
                                        <!-- Favourite -->
                                        <div class="product-favourite">
                                    <form action="manage_cart.php" method="post">

                                    <?php
                                $sel_images   = "SELECT * FROM product_images WHERE 
                                product_id = '".$prod_arr['product_id']."' LIMIT 1";
                                $run_sel_img  = mysqli_query($conn,$sel_images);

                                $img_arr = mysqli_fetch_array($run_sel_img) 
                             
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
                                            <input type="hidden" name="product_name" value="<?php echo $prod_arr['product_name']?>">
                                       
                                        <p class="product-price">$<?php echo $prod_arr['product_price']?></p>
                                        <input type="hidden" name="product_price" value="<?php echo $prod_arr['product_price']?>">
                                          <input type="hidden" name="pro_id" id="" value="<?php echo $prod_arr['product_id']?>">
                                          <input type="hidden" name="quantity" value="1">
                                          <input type="hidden" name="page_name" value="<?php echo $_SERVER['REQUEST_URI']?>">

                            
                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <input name="add_to_cart" class="btn essence-btn" value="Add to Cart" type="submit">
                                            </div>
                                        </div>
                                    </div>

                                     </a>
                                </div>
                              </form>
                            </div>

                            <?php
                            }
                            ?>

            

                        </div>
                    </div>
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        <ul class="pagination mt-50 mb-70">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">21</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

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

</body>

</html>