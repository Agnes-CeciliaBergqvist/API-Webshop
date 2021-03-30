<?php 

header('Content-type: application/json;charset=UTF-8');

$array = [
    "REST_API by: "=> "Agnes-Cecilia Bergqvist", 
    "Github" => "https://github.com/Agnes-CeciliaBergqvist",
    "Contact" => "agnes-cecilia.bergqvist@medieinstitutet.se"
]; 
echo (json_encode($array)); 

?> 