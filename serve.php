<?php
//  system("php -S localhost:8080 -t public ");
// echo PHP_OS;
$port = rand(8000,9999);
 if(strtoupper(substr(PHP_OS,0,3))==="WIN"){
    system("cd public && php -S localhost:$port");

 }else{
    system("cd public; php -S localhost:$port");
 }