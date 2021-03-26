<?php

include("../../config/database_handler.php");
include("../../objects/user.php"); 

$user = new UserWebshop($pdo);
$user->CreateUser("pelle1", "pell1e@hotmail.com", "hej1"); 

?>
