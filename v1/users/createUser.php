<?php

include("../../config/database_handler.php");
include("../../objects/user.php"); 

$user = new UserWebshop($pdo);
$user->CreateUser("agge", "agge@hotmail.com", "hej"); 

?>
