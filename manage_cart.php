<?php
session_start();    
// session_destroy();
include('functions.php');

if (isset($_GET['prod_id'])) {

    add_to_fav($_GET['prod_id'],$_GET['prod_name'],$_GET['prod_img'],$_GET['price'],$_GET['page_name']);
    
}

  if (isset($_GET['add_to_cart'])) {

    $img      = $_GET['img_name'];
    $brand    = $_GET['brand_name'];
    $name     = $_GET['product_name'];
    $price    = $_GET['product_price'];
    $pro_id   = $_GET['pro_id'];
    $quantity = $_GET['quantity'];
    $page_name= $_GET['page_name'];

    add_to_cart($pro_id,$quantity,$price,$img,$brand,$name,$page_name);

  }
    


  
  if (isset($_POST['remove_product'])) {

    $page_name  =  $_POST['current_page'];

    foreach ($_SESSION['cart'] as $key => $value) {
    
     if ($value['productid'] == $_POST['product_id']) {

        unset($_SESSION['cart'][$key]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        echo "<script>
        alert('Product removed from the cart');
        window.location.href = '".current_url($page_name)."'
          </script>";        
    }

    }
}
  

   if (isset($_POST['remove_fav'])) {

    $id = $_POST['prod_id'];
    $page_name = $_POST['page_name'];
    remove_fav_product($id,$page_name);
    alert('product_removed');
    
      
   }
  



 
     



    if (isset($_POST['quantity_mod'])) {

        foreach ($_SESSION['cart'] as $key => $value) {
        

         if ($value['productid'] == $_POST['prod_id']) {
            
            $_SESSION['cart'][$key]['qty'] = $_POST['quantity_mod'];
            header('Location:checkout.php');
          
            
         }

        }
    }



    





?>




<!-- function product_exists($pid,$q,$p,$attributesValues)
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
} -->




