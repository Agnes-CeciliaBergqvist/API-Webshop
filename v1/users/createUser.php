<?php

include("../../config/database_handler.php");
include("../../objects/user.php"); 

$user = new UserWebshop($pdo);
$user->CreateUser("Patrick", "patrik48@gmail.com", "password123"); 

?>
