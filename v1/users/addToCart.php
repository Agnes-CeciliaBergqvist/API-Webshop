<?php

include("../../config/database_handler.php");
include("../../objects/user.php");


if(isset($_GET["productId"])) {
    if(!isset($_GET["token"])) {
        $token = md5(time()); 
        $cart = new UserWebshop($pdo); 
        $cart->AddProductToCart2($_GET["productId"], $token); 
    } else {
        
        $cart = new UserWebshop($pdo); 
        $cart->AddProductToCart2($_GET["productId"], $_GET["token"]); 
    }

} else {
    echo "Please specify a product";
}
    
?>