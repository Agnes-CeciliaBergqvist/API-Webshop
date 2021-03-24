<?php

include("../../config/database_handler.php");
include("../../objects/user.php"); 

$product = new UserWebshop($pdo); 

if ( !empty($_GET['id'])) {
    $productData = $product->DeleteProduct($_GET['id']);
    print_r(json_encode($productData));  

} else {
    $error = new stdClass(); 
    $error->message = "No ID specified, enter the ID that you want to delete"; 
    $error->code = "400"; 
    print_r(json_encode($error)); 
    die(); 

}




?>