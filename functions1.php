<?php


 

function get_product_name($pid){
$result="select * from products where id=$pid";
$run_qry = mysqli_query($link,$result);
//$row = $db->Execute($result);
$row=mysqli_fetch_array($run_qry);
//$row->fields['pname']
return $row['name'];
}


function get_cat_name($catid){
$result=mysqli_query($link,"select * from products where id=$catid"); 
//$row = $db->Execute($result);
$row=mysql_fetch_array($result);
//$row->fields['pname']
return $row['catname'];
}



function get_price($pid){
global $link;
$result="select * from products where id=$pid";
$run_qry = mysqli_query($link,$result);
//$row = $db->Execute($result);
$row=mysqli_fetch_array($run_qry);
return $row['sale_price'];
}


function remove_product($pid){
$pid=intval($pid);
$max=count($_SESSION['cart']);
for($i=0;$i<$max;$i++){
if($pid==$_SESSION['cart'][$i]['productid']){
unset($_SESSION['cart'][$i]);
break;
}
}
$_SESSION['cart']=array_values($_SESSION['cart']);
}




function get_order_total(){
$max=count($_SESSION['cart']);
$sum=0;
for($i=0;$i<$max;$i++){
$pid=$_SESSION['cart'][$i]['productid'];
$q=$_SESSION['cart'][$i]['qty'];
$price=$_SESSION['cart'][$i]['price'];

$price = (int) $price;
$q = (int) $q;

$sum+=$price*$q;
}
return $sum;
}





function addtocart($pid,$q,$p,$attributesValues){

if($pid<1 or $q<1 ) return;

if(is_array($_SESSION['cart'])){
if(product_exists($pid,$q,$p,$attributesValues)) return;
$max=count($_SESSION['cart']);
$_SESSION['cart'][$max]['productid']=$pid;
$_SESSION['cart'][$max]['qty']=$q;
$_SESSION['cart'][$max]['price']=$p;
$_SESSION['cart'][$max]['attributes']=$attributesValues; 

}
else{
$_SESSION['cart']=array();
$_SESSION['cart'][0]['productid']=$pid;
$_SESSION['cart'][0]['qty']=$q;
$_SESSION['cart'][0]['price']=$p;
$_SESSION['cart'][0]['attributes']=$attributesValues; 


}
}










function product_exists($pid,$q,$p,$attributesValues)
{
$pid=intval($pid);
$max=count($_SESSION['cart']);
$flag=0;
for($i=0;$i<$max;$i++){
if($pid==$_SESSION['cart'][$i]['productid'] && empty(array_diff_assoc($attributesValues, $_SESSION['cart'][$i]['attributes'])))
{
$flag=1;
$_SESSION['cart'][$i]['qty'] = $_SESSION['cart'][$i]['qty']+$q;
break;
}
}
return $flag;
}






////////////////////////////////////////// my functions //////////////////////////////



function get_product_qty(){
$max=count($_SESSION['cart']);
$q=0;
for($i=0;$i<$max;$i++){
$pid=$_SESSION['cart'][$i]['productid'];
$q+=$_SESSION['cart'][$i]['qty'];
}
return $q;
}

?>

<?php
include("adminCP/config/connection.php");
include("function.php");
 
 
if($_REQUEST['command']=='delete')
{
remove_product($_REQUEST['pid']);
}
else if($_REQUEST['command']=='clear')
{
unset($_SESSION['cart']);
}
else if($_REQUEST['command']=='update'){
$max=count($_SESSION['cart']);
for($i=0;$i<$max;$i++){
$pid=$_SESSION['cart'][$i]['productid']; 
$q=intval($REQUEST['product'.$pid."".$i]);

$attributes = json_decode($_REQUEST['arr_attributes' . $pid], true);


if($q>0 && $q<=999){
$_SESSION['cart'][$i]['qty']=$q;
}
else{
$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
}
}

}
 
  if(isset($_SESSION['cart']))
  {
  $max=count($_SESSION['cart']);
  $total = get_order_total();
 
  }
  else
  {
  $max= 0;
  $total = 0.00;
  }
  ?>



<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title><?php include('body/title.php')?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/custom.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
  
    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <?php include('body/mobileMenu.php');?>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <?php include('body/header.php');?>
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="index.php">Home</a>
                            <a href="shop.php">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <!-- Shopping Cart Section Begin -->
        <section class="shopping-cart spad">

        <div class="container">
        <?php
        if(isset($_SESSION['cart']))
        {
        ?>
        <form name="form1" method="post">
        <input type="hidden" name="pid" />
        <input type="hidden" name="command"/>  

        <div class="row">
        <div class="col-lg-8">

   

        <div class="shopping_cart_table">
        <table>
        <thead>
        <tr>
        <th>Product</th> 
        <th>Quantity</th>
        <th>Total</th>
        <th width="1%"></th>
        </tr>
        </thead>
        <tbody>

 
 

        <?php 
        $i = 0;
        $alltotal = 0;
        $total_card=0;
        $max=count($_SESSION['cart']);
        for($i=0;$i<$max;$i++){
        $pid=$_SESSION['cart'][$i]['productid'];
        $q=$_SESSION['cart'][$i]['qty'];
        $price=$_SESSION['cart'][$i]['price'];
        $attributes=$_SESSION['cart'][$i]['attributes']; 

        $selec_pro = mysqli_query($link,"select * from products where id='".$pid."'");
        $get_prod_detail = mysqli_fetch_array($selec_pro);

        $total_amount = (int) $q * (int) $price;
        $total_card += $total_amount;
        ?>

        <tr>
        <td class="product_cart_item">
        <div class="product_cartitem_pic">
 
        </div>
        <div class="product_cartitem_text">
        <h6><?php echo $get_prod_detail['prod_name'];?>
            <br>
            <?php 
            foreach ($attributes as $key => $value) {
                echo strtoupper($key)." :".$value."<br>";
            }
             

            ?>
        </h6>

         

        </div>
        </td> 
        <td class="quantity__item">
        <div class="quantity">
        <div class="pro-qty-2">
        <input type="text" value="<?php echo $q;?>" name="product<?php echo $pid."_".$i;?>">
        </div>
        </div>
        </td>
        <td class="cart__price"><?php echo $total_amount;?></td>
        <td class="cart__close">
            <button class="btn" onClick="del('<?php echo $pid;?>')"><i class="fa fa-close"></i></button> 
          </td>
        </tr>

        <?php
        }
        ?>           
                            
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="allshop.php">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="continue_btn update_btn">
                    <input type="submit" value="Update Cart" onClick="update_wish()">   
                    
                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
    
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                             
                            <li>Total <span>Rs <?php echo $total_card;?></span></li>
                        </ul>
                        <a href="checkout.php" class="primary-btn" style="background: #ff7f00; color: black;">Proceed to checkout</a>
                        
                       
                    </div>
                </div>
            </div>
        </form>
        <?php
        }
        ?>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
         <?php include('body/footer.php');?>
    </footer>

    <!-- Search Begin -->
<?php include('body/search_model.php');?>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script language="javascript">

function del(pid){ 
 
if(confirm('Do you really mean to delete this item')){
document.form1.pid.value=pid;
document.form1.command.value='delete';
document.form1.submit();
}
}
function clear_wish(){
if(confirm('This will empty your shopping wish, continue?')){
document.form1.command.value='clear';
document.form1.submit();

}
}

function update_wish(){
document.form1.command.value='update';
document.form1.submit();
}


</script>

</body>

</html>













<?php
// include("config/connection.php");
include("function.php");
 
session_start();


 $pro_id=$_GET['pro_id'];
 $myquantity=$_GET['myquantity'];
 $price=$_GET['price'];
 $attributesValues = json_decode($_GET['attributesValues'], true);
 
 
addtocart($pro_id, $myquantity,$price,$attributesValues);
echo $cart = count($_SESSION['cart']);
?>







var myquantity= $('#qty').val();
var price = $('#priceValue').val();

 

var attributesValuesString = JSON.stringify(attributesValues);

var dataString = 'pro_id=' + pro_id + '&myquantity=' + myquantity + '&price=' + price + '&attributesValues=' + attributesValuesString;

$.ajax({
  type: "GET",
  url: "addtocart.php",
  data: dataString,
  cache: false,
  success: function(response) {
   window.location = "shopping-cart.php";
  }
});
