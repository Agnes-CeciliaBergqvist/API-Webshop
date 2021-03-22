<?php

include("../../config/database_handler.php");
include("../../objects/user.php"); 


$user = new UserWebshop($pdo);
$user->AddProduct("Nike", "White and grey shoes", "100"); 



?>