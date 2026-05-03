<?php


$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

include_once "../database/env.php";


$query = "SELECT * FROM users WHERE email = '$email' ";
$res = mysqli_query($db,$query);

print_r($res);