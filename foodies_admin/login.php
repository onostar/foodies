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
    $_SESSION['success'] = "";
    $_SESSION['error'] = "";
    if(isset($_POST['submit_login'])){
        $restaurant_email = strtolower(validate('restaurant_email'));
        $user_password = validate('user_password');

        /* check validity of user */
        $check_user = $connectdb->prepare("SELECT * FROM administrators WHERE restaurant_email = :restaurant_email AND user_password = :user_password");
        $check_user->bindvalue('restaurant_email', $restaurant_email);
        $check_user->bindvalue('user_password', $user_password);
        $check_user->execute();

        if($check_user->rowCount() > 0){
            $_SESSION['users'] = $restaurant_email;
            if($restaurant_email == "admin@foodies.com"){
                header("Location: admin.php");
            }else{
                if($user_password == 123){
                    header("Location: change_password.php");
                }else{
                    header("Location: users.php");
                }
            }
            
        }else{
            $_SESSION['error'] = "Invalid Username or Password!";
            header("Location: index.php");
        }
    }