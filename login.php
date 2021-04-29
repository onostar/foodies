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

    if(isset($_POST['submit_login'])){
        $email = strtolower(validate('email'));
        $user_password = validate('user_password');

        /* check validity of user */
        $check_user = $connectdb->prepare("SELECT * FROM users WHERE email = :email AND user_password = :user_password");
        $check_user->bindvalue('email', $email);
        $check_user->bindvalue('user_password', $user_password);
        $check_user->execute();

        if($check_user->rowCount() > 0){
            $_SESSION['user'] = $email;
            header("Location: main.php");
        }else{
            $_SESSION['error'] = "Invalid Username or Password!";
            header("Location: registration.php");
        }
    }