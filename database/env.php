<?php

$hostName = "localhost";
$dbUser = "root";
$dbpsk = "";
$dbName = "portfolio-website";



try{
   $db = mysqli_connect($hostName, $dbUser, $dbpsk,$dbName);
} catch(\Exception $error){
   
  echo $error->getMessage();
  exit();

}


















?>