<?php

session_start();
include_once "../database/env.php";


$name = $_REQUEST['username'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$terms = $_REQUEST['terms'] ?? false;
$errors = [];



if (empty($name) || strlen($name)<=3){
   $errors['name_error'] = "Input UserName more than 3 character";
  
};

if (empty($email)) {
    $errors['email_error'] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // filter_var is the standard PHP way to check if an email is valid
    $errors['email_error'] = "Invalid email format.";
}else if($email){
    $query = "SELECT * FROM `users` WHERE email='$email' ";
    $user = mysqli_query($db, $query);

    if(mysqli_num_rows($user) > 0){
    $errors['email_error'] = "This email is already exist.";

    }
}



// 3. Password Validation
if (empty($password)) {
    $errors['password_error'] = "Password is required.";
} elseif (strlen($password) < 8) {
    // Standard security practice is at least 8 characters
    $errors['password_error'] = "Password must be at least 8 characters long.";
}


if (!$terms){
   $errors['terms_error'] = " Please accept terms and conditions.";

}


//errors

if(count($errors) > 0){
  //redirection == Headers
  $_SESSION['form_errors'] = $errors;
  header("Location: ../register.php");
}else{
    

    $encPassword= password_hash($password, PASSWORD_BCRYPT);
    $query= "INSERT INTO `users`( `name`, `email`, `password`) VALUES ('$name','$email','$encPassword')";

    $res = mysqli_query($db, $query);

    if($res){
        header("Location: ../login.php");
    }
}