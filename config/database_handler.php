<?php 
header('Content-type: application/json;charset=UTF-8');

$dsn = "mysql:host=localhost;dbname=Webshop"; 
$user = "root"; 
$password = ""; 


$pdo = new PDO($dsn, $user, $password); 


?> 