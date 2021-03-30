<?php

include("../../config/database_handler.php");
include("../../objects/user.php"); 

$cart = new UserWebshop($pdo); 

if ( !empty($_GET['id'])) {
    $cartData = $cart->DeleteProductInCart($_GET['id']);
    print_r(json_encode($cartData));  

} else {
    $error = new stdClass(); 
    $error->message = "No ID specified, enter the ID that you want to delete from cart"; 
    $error->code = "400"; 
    print_r(json_encode($error)); 
    die(); 

}
print_r(json_encode($cart)); 


?>