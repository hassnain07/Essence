

<div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">

    <!-- Cart Button -->
    <div class="cart-button">
        <a href="#" id="rightSideFav"><img src="img/core-img/favourite.svg" alt=""> <span>

            <?php 
            
            if (isset($_SESSION['cart'])) {
                echo count($_SESSION['cart']);
            }
            
            ?>

        </span></a>
    </div>

    <div class="cart-content d-flex">
       
        <!-- Cart List Area -->
        <div class="cart-list">
      
        <?php 
        
        ?>

        

            <?php
            $total = 0;
            $delivery = 100;
            if (isset($_SESSION['cart'])) {
               foreach ($_SESSION['cart'] as $key => $value) {
                $total = $total + $value['price'];
            ?>

            <!-- Single Cart Item -->
            <div class="single-cart-item">

          
               
             
                <a href="" class="product-image" style="height:32vh; display : flex; align-items: center; overflow:hidden;">
               
                    <img src="<?php echo $value['img_name']?>" class="cart-thumb" alt="">
             
                    <!-- Cart Item Desc -->
                    <div class="cart-item-desc">
                      <span class="product-remove">
                        <form action="manage_cart.php" method="post">
                        <button name="remove_product" class="btn btn-sm">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                        <input type="hidden" name="product_id"  value = "<?php echo $value['productid']?>">
                        <input type="hidden" name="current_page"  value="<?php echo $_SERVER['REQUEST_URI']?>">
                        </form>
                      </span>
                        <span class="badge"><?php echo $value['brand_name']?></span>
                        <h6 style=""><?php echo $value['product_name']?></h6>
                     
                      
                        <p class="color">Quantity:<?php echo $value['qty']?> </p>
                        <p class="price">$<?php echo $value['price']?></p>
                    </div>
                </a>
            </div>

            
         <?php
           }
      
         }
         ?>



        </div>

       
    </div>
</div>