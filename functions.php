<?php


function alert($msg){
   echo "<script type ='text/javascript'>
   alert('".$msg."');
   </script>";

}




function add_to_cart($pid,$q,$p,$img,$brand,$name,$page_name){

   if($pid<1 or $q<1 ) return;
  
   if(isset($_SESSION['cart'])){

   if(product_exists($pid,$q,$p)) return;

   $max=count($_SESSION['cart']);

   $_SESSION['cart'][$max]['productid']     =$pid;
   $_SESSION['cart'][$max]['product_name']  =$name;
   $_SESSION['cart'][$max]['brand_name']    =$brand;
   $_SESSION['cart'][$max]['img_name']      =$img;
   $_SESSION['cart'][$max]['qty']           =$q;
   $_SESSION['cart'][$max]['price']         =$p;
   // $_SESSION['cart'][$max]['attributes']=$attributesValues; 

   }

   else{

   $_SESSION['cart']=array();
   $_SESSION['cart'][0]['productid']    =$pid;
   $_SESSION['cart'][0]['product_name'] =$name;
   $_SESSION['cart'][0]['brand_name']   =$brand;
   $_SESSION['cart'][0]['img_name']     =$img;
   $_SESSION['cart'][0]['qty']          =$q;
   $_SESSION['cart'][0]['price']        =$p;
   // $_SESSION['cart'][0]['attributes']=$attributesValues; 
   

   }

   // if (isset($_SESSION['cart'])) {
   //    print_r($_SESSION['cart']);
   //    exit;
   // }


   echo "<script>
   alert('Product added to cart');
   window.location.href = '".current_url($page_name)."'
     </script>";
   }
   

function product_exists($prod_id,$quantity,$price){

    $prod_id = intval($prod_id);
    $max     = count($_SESSION['cart']);
    $flag    = 0;

    for ($i=0 ;$i < $max ; $i++){

     if ($prod_id == $_SESSION['cart'][$i]['productid']) {

        $flag  = 1;
        $_SESSION['cart'][$i]['qty'] = $_SESSION['cart'][$i]['qty'] + $quantity;
        $myproducts   =  array_column($_SESSION['cart'], 'productid');
        if (in_array($_GET['pro_id'],$myproducts)) {
         echo "<script>
         alert('Product already added in cart. The quantity of product is increased');
         window.location.href = 'checkout.php'
           </script>";
       
        }
        break;

     }
    }

  
    return $flag;


}





   function current_url($page_name)
   {
     $url   =  "http://".$_SERVER['HTTP_HOST'].$page_name;
     $current_page  =  str_replace("&","&amp;",$url);
   //   header('Location:'.$url);
   return $url;

     
   }

   function add_to_fav($id,$name,$img,$price,$page_name){

      
      
      if (isset($_SESSION['favourites'])) {
         
         if (fav_exists($id,$page_name)) return;

      
        

        $max = count($_SESSION['favourites']);
        $_SESSION['favourites'][$max]['product_id'] = $id;
        $_SESSION['favourites'][$max]['product_name'] = $name;
        $_SESSION['favourites'][$max]['product_img'] = $img;
        $_SESSION['favourites'][$max]['price'] = $price;
        
      }
      else {
         $_SESSION['favourites']  = array();
         $_SESSION['favourites'][0]['product_id'] = $id;
         $_SESSION['favourites'][0]['product_name'] = $name;
         $_SESSION['favourites'][0]['product_img'] = $img;
         $_SESSION['favourites'][0]['price'] = $price;
         
      }

      
         

      echo "<script>
      alert('Product added to favourites');
      window.location.href = '".current_url($page_name)."'
        </script>";

      
      
   
   }

   function fav_exists($id,$page_name){

      $id = intval($id);
      $max = count($_SESSION['favourites']);
      $flag = 0;
      


      for ($i=0; $i < $max ; $i++) { 

         if ($id == $_SESSION['favourites'][$i]['product_id']) {

            $flag = 1;
            $fav_product = array_column($_SESSION['favourites'],'product_id');
            if (in_array($_GET['prod_id'],$fav_product)) {
               echo "<script>
               alert('Product already added in favourites');
               window.location.href = '".current_url($page_name)."'
                 </script>";
               
            }
            break;
            
         }
      }
      return $flag;
    
    
    
   }

   function remove_fav_product($id,$page_name){
      
     
    foreach ($_SESSION['favourites'] as $key => $value) {
    
      if ($value['product_id'] == $id) {
 
         unset($_SESSION['favourites'][$key]);
         $_SESSION['favourites'] = array_values($_SESSION['favourites']);
        
         
         
      }
   }
   // current_url($page_name);
   echo "<script>
   alert('Product  removed');
   window.location.href = '".current_url($page_name)."'
     </script>";
   
   }



 





   // function form_sub(){
   //    echo "<script>
   //      return this.form.submit();
   //      alert('form submitted');
   //    </script>";

   // }

   

  

// function addtocart($prod_id,$quantity,$price){




//  }
   




?>
