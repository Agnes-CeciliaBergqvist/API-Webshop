<?php

include("../../config/database_handler.php");
include("../../objects/user.php"); 

$product = new UserWebshop($pdo); 
$products = $product->GetAllProducts();
print_r(json_encode($products)); 


?>