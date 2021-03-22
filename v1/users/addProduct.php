<?php

include("../../config/database_handler.php");
include("../../objects/user.php"); 


$user = new UserWebshop($pdo);
$user->AddProduct("Adidas", "3 stripes", "100"); 



?>