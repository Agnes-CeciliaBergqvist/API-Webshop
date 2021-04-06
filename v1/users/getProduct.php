<?php

include("../../config/database_handler.php");
include("../../objects/user.php"); 


$product = new UserWebshop($pdo); 

if ( !empty($_GET['id'])) {
    $productData = $product->GetProduct($_GET['id']); 
    print_r(json_encode($productData)); 
} else {
    $error = new stdClass(); 
    $error->message = "No ID specified, enter the ID on the product you want to see"; 
    $error->code = "400"; 
    print_r(json_encode($error)); 
    die(); 
}


?> 