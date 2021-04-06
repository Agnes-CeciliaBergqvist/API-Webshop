<?php

include("../../config/database_handler.php");
include("../../objects/user.php"); 


$user = new UserWebshop($pdo);
$user->AddProduct("Marlene Birger", "Blue jeans with the perfect fit", "2995"); 



?>