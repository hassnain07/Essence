<?php
session_start();
include('connect.php');
// session_destroy(); 


if (isset($_SESSION['cart'])) {
    # code...
    // print_r($_SESSION['cart']);
    // exit;
}

?>   
   
   
   
   
   <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="index.php"><img src="img/core-img/logo.png" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="shop.php">Shop</a>
                          
                            </li>
                            <li><a href="#">Categories</a>
                                <ul class="dropdown">
                                    <?php 
                                    $sel_cat_names  = "SELECT * FROM categories";
                                    $run_sel        =  mysqli_query($conn,$sel_cat_names);

                                    while($cat_arr = mysqli_fetch_array($run_sel))
                                    {
                                    ?>  
                                    <li><a href="shop.php?cat_name=<?php echo $cat_arr['category_name']?>"><?php echo $cat_arr['category_name']?></a></li>
                                    <?php
                                    }
                                    ?>
                                    
                                </ul>
                            </li>
                            <li><a href="sales.php">Sales</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php ">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Button trigger modal -->


<!-- Modal -->
<!-- Button trigger modal -->


                    <!-- Nav End -->
                </div>
            </nav>

            

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="shop.php" method="post">
                        <input type="search" name="search_keyword" id="headerSearch" placeholder="Type for search">
                        <button type="submit" name="search_submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="cart-area">
                    <a href="#" type="button" class="" data-toggle="modal" data-target="#exampleModalLong" id="essenceFavBtn"><img src="img/core-img/heart.svg" alt=""> <span>
                        
                        <?php 

                        if (isset($_SESSION['favourites'])) {
                            echo count($_SESSION['favourites']);
                    
                        }
                      
                        ?>

                        
                    </span></a>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="#" id="essenceCartBtn"><img src="img/core-img/bag.svg"  alt=""><span>

                    <?php 
                        
                        if (isset($_SESSION['cart'])) {
                            echo count($_SESSION['cart']);
                        }
                      
                        
                        ?>
                    </span>

                
                </a>
                </div>
                <!-- User Login Info -->
              
                <!-- Cart Area -->
            </div>

        </div>
    </header>

    <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Your Favorite Items</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php if (isset($_SESSION['favourites'])) {
           
        ?>
       <?php if (count($_SESSION['favourites']) > 0) { 
       ?>

<?php 
         
         foreach ($_SESSION['favourites'] as $key => $value) {
           
        
        
        ?>
        <div class="row">
            <div class="col-md-12 bordered fav_items" style="background-color:#dddddd;">
               <div class="col-md-3" style="float:left;">
               <div class="img_box" style="box-sizing:border-box;">
                <img src="<?php echo  $value['product_img']?>" style="width:8vh; height:auto;" alt="not available">
                </div>
               </div>
               <div class="col-md-4" style="float:left;font-size:1.5em;"><p style="font-size:15px;color:black"><?php echo $value['product_name']?></p></div>
               <div class="col-md-4"style="float:left;"><h6>$ <?php echo $value['price']?></h5></div>

               <form action="manage_cart.php" method="post">
               <div class="col-md-1" style="float:left;"><button name="remove_fav" class="close">&times;</button></div>
               <input type="hidden" name="prod_id" value="<?php echo $value['product_id']?>">
               <input type="hidden"  name="page_name" value="<?php echo $_SERVER['REQUEST_URI']?>">

               </form>


            </div>
        </div>
        <?php 
         }
        ?>
        <?php }

        else {
            ?>
            <h6 style="margin:auto;color:grey;" class="text-center"> <b>No Favourites Yet!</b></h6>
            <?php

        }
        
        ?>
        <?php
        }
        else {
            ?>
            <h6 style="margin:auto;color:grey;" class="text-center"> <b>No Favourites Yet!</b></h6>
            <?php
        }

      ?>
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
    </script>
    <!-- ##### Header Area End ##### -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->