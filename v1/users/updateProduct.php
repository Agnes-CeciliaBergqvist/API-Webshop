<?php

include("../../config/database_handler.php");
include("../../objects/user.php"); 

$product_id = "";
$product_name = ""; 
$product_description = ""; 
$product_price = ""; 



if (isset($_GET['productId'])) {
    $product_id = $_GET['productId']; 
} else {
    $error = new stdClass();
    $error->message = "ID not specified"; 
    $error->code = "400"; 
    echo json_encode($error); 
    die();  

}
if (isset($_GET['productName'])) {
    $product_name = $_GET['productName']; 
}
if (isset($_GET['description'])) {
    $product_description = $_GET['description']; 
}
if (isset($_GET['price'])) {
    $product_price = $_GET['price']; 
}


$product = new UserWebshop($pdo); 
echo print_r(json_encode($product->UpdateProduct($product_id, $product_name, $product_description, $product_price))); 




?>