<?php

include("../../config/database_handler.php");
include("../../objects/user.php");

$cart = new UserWebshop($pdo); 

$cart->AddProductToCart("1", "1"); 

?>