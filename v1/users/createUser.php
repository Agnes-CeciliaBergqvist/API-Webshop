<?php

include("../../config/database_handler.php");
include("../../objects/user.php"); 

$user = new UserWebshop($pdo);
$user->CreateUser("Agnes Bergqvist", "agnes.bergqvist@hotmail.com", "hejdå123"); 

?>
