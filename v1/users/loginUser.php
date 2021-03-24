<?php

include("../../config/database_handler.php");
include("../../objects/user.php"); 

$username = $_GET['username']; 
$user_password = $_GET['password']; 

$user = new UserWebshop($pdo);
$return = new stdClass(); 
$return->token = $user->LoginUser($username, $user_password); 
print_r(json_encode($return)); 



?>