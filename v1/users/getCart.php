<?php

include("../../config/database_handler.php");
include("../../objects/user.php"); 

$cart = new UserWebshop($pdo); 
$carts = $cart->GetCart();
print_r(json_encode($carts)); 


?>