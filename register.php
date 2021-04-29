<?php
    session_start();
    require "server.php";

    function validate($field){
        if(!isset($_POST[$field])){
            return false;
        }else{
            return htmlspecialchars(stripslashes($_POST[$field]));
        }
    }
    $_SESSION['user_email'] = "";
    $_SESSION['error'] = "";
    $_SESSION['success'] = "";
    if(isset($_POST['submit_reg'])){
        
        $first_name = ucwords(validate('first_name'));
        $last_name = ucwords(validate('last_name'));
        $email = strtolower(validate('email'));
        $phone_number = validate('phone_number');
        $user_password = validate('user_password');
        $confirm_password = validate('confirm_password');
        /* check user existence */
        $check_user = $connectdb->prepare("SELECT * FROM users WHERE email = :email");
        $check_user->bindvalue('email', $email);
        $check_user->execute();
        if($check_user->rowCount() > 0){
            $_SESSION['error'] = "User already Exists!";
            header ("Location: registration.php");
        }elseif(strlen($user_password) < 6){
            $_SESSION['error'] = "Error: Password too short!";
            header("Location: registration.php");
        }elseif($user_password !== $confirm_password){
            $_SESSION['error'] = "Error: Password does not match!";
            header("Location: registration.php");
        }else{
            $statement = $connectdb->prepare("INSERT INTO users (first_name, last_name, email, phone_number, user_password) VALUES (:first_name, :last_name, :email, :phone_number, :user_password)");

            $statement->bindvalue('first_name', $first_name);
            $statement->bindvalue('last_name', $last_name);
            $statement->bindvalue('email', $email);
            $statement->bindvalue('phone_number', $phone_number);
            $statement->bindvalue('user_password', $user_password);
            $statement->execute();

            $_SESSION['success'] = "Registration successful! Please Login";
            header("Location: registration.php");
        }
    }

