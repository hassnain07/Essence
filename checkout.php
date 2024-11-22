<?php
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
        .number-control {
  display: flex;
  align-items: center;
}

@media screen and (min-width:768px) {
    .essence-btn{
        margin-bottom : 10px;
    }
}

@media screen and (min-width:425px) {
    .essence-btn{
        margin-bottom : 10px;
    }
}

@media screen and (min-width:375px) {
    .essence-btn{
        margin-bottom : 10px;
    }
}

@media screen and (min-width:320px) {
    .essence-btn{
        margin-bottom : 10px;
    }
}






.number-quantity {
  padding: 0.25rem;
  width: 50px;
  /* -moz-appearance: textfield; */
  position:relative;
  right:5vh;
  height:4vh;

  
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
    
/* .number-left:hover::before,
.number-right:hover::after {
  background-color: #666666;
}  */

      
    </style>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<?php 

$sel_cart_prods = "SELECT * FROM products WHERE product_id = "

?>

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
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Billing Details</h5>
                        </div>

                        <?php 
                        if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
                        ?>

                        <form action="manage_order.php" method="post">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="first_name">Full Name <span>*</span></label>
                                    <input type="text" class="form-control" name="f_name" id="first_name" value="" required>
                                </div>
                               
                             
                                <!-- <div class="col-12 mb-3">
                                    <label for="country">Country <span>*</span></label>
                                    <select class="w-100" id="country" name="country">
                                        <option value="usa">United States</option>
                                        <option value="uk">United Kingdom</option>
                                        <option value="ger">Germany</option>
                                        <option value="fra">France</option>
                                        <option value="ind">India</option>
                                        <option value="aus">Australia</option>
                                        <option value="bra">Brazil</option>
                                        <option value="cana">Canada</option>
                                    </select>
                                </div> -->

                                <div class="col-12 mb-3">
                                    <label for="address">Address <span>*</span></label>
                                    <textarea id="" cols="75" rows="10" name="address" class="form-group form-control"></textarea>
                                </div>
                             
                                
                               
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_no" min="0" value="">
                                </div> 
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" class="form-control" id="email_address" name="email" value="">
                                </div>

                                <div class="col-12">
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                                        <label class="custom-control-label" for="customCheck1">Terms and conitions</label>
                                        <p>*Refund after 7 days is not possible. <br>
                                           *If order is not delivered plz contact Us otherwise <br> after 2 days order will be canceled. <br>
                                           *You cannot check the order before payment.
                                           </p>
                                    </div>
                                    <input type="hidden" name="g_total" value="" id="g_total">

                         
                                    <br>

                                    <div class="  d-block mb-2">
                                        <button name="place_order" class="btn essence-btn">Place Order</button>
                                        <a href="shop.php" class="btn essence-btn btn-danger">Continue Shopping</a>
                                    </div>
                                   
                                    
                                </div>
                            </div>
                        </form>

                        <?php
                        }

                        else {
                            ?>

                           <h6
                           style="color:gray;
                            font-family: sans-serif; 
                            position: relative;
                            top:5vh;

                            ">
                           Your cart is empty</h6>

                             
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span><b>Product(s):</b></span> <span><b>Quantity:</b></span> <span><b>Total:</b></span></li>

                            <?php
                            if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
                                
                            
                            $total  = 0;
                            $delivery = 100;
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $total = $total + $value['price'];
                            ?>

                            <li><span><?php echo $value['product_name'] ?></span><span>	
                            
                                <div class="number-control">
                          <form action="manage_cart.php" method="post">
                          <input type="number" name="quantity_mod" class="number-quantity iquantity" min="1" onchange="this.form.submit()" max="10" value="<?php echo $value['qty']?>">
                          <input type="hidden" name="product_name" value="<?php echo $value['product_name']?>" class="">
                          <input type="hidden" name="prod_id" value="<?php echo $value['productid']?>">
                          </form>
                        </div>
                            </SPAN>
                        <span class="itotal" value=""></span>
                        <input type="hidden" value="<?php echo $value['price']?>" class="iprice">
                        </li>

                            <?php
                            }
                            ?>

                            <li><span>Subtotal</span> <span id="subtotal"></span></li>
                            <li><span>Shipping</span> <span>$<?php echo $delivery;?></span></li>
                            <li><span><h5>Grand Total :</h4></span>
                             <span>
                                <h5 id="grandtotal"></h5>
                                
                            </span>
                            </li>

                            <?php
                            }

                            else {
                                ?>
    
                               <h6
                               style="color:gray;
                                font-family: sans-serif; 
                                position: relative;
                                top:5vh;
    
                                ">
                               Your cart is empty</h6>
    
                                 
                                <?php
                            }
                            ?>
                        </ul>

                        <!-- <div id="accordion" role="tablist" class="mb-4">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h6 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-circle-o mr-3"></i>Paypal</a>
                                    </h6>
                                </div>

                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-circle-o mr-3"></i>cash on delievery</a>
                                    </h6>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quis in veritatis officia inventore, tempore provident dignissimos.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingThree">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fa fa-circle-o mr-3"></i>credit card</a>
                                    </h6>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse quo sint repudiandae suscipit ab soluta delectus voluptate, vero vitae</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingFour">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><i class="fa fa-circle-o mr-3"></i>direct bank transfer</a>
                                    </h6>
                                </div>
                                <div id="collapseFour" class="collapse show" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est cum autem eveniet saepe fugit, impedit magni.</p>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        
                    </div>
                </div>



                
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
 <?php include('footer.php')?>

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



     <!-- ##### Footer Area End ##### -->


    <script>
        
        var sb         =  0;
        var delivery   =  100;
        var sub        =  document.getElementById('subtotal');
        var grandtotal =  document.getElementById('grandtotal');
        var g_total    =  document.getElementById('g_total');
        var iprice     =  document.getElementsByClassName('iprice');
        var iquantity  =  document.getElementsByClassName('iquantity');
        var itotal     =  document.getElementsByClassName('itotal');
        
        function quantityTotal() {
            
            sb  = 0

            for ( i=0 ; i < iprice.length ; i++)
            {
                itotal[i].innerText = "$"+ (iprice[i].value)*(iquantity[i].value);
                sb                  =  (iprice[i].value)*(iquantity[i].value) + sb;
            }

             
            sub.innerText            = "$" + sb;
            grandtotal.innerText     = "$" + (sb + delivery);
            g_total.value            = "$" + (sb + delivery);


               
    }


    

      quantityTotal();
        


    </script>
    

</body>

</html>