<?php
    include "server.php";
    session_start();

    if(isset($_POST['change_password'])){
        $email = htmlspecialchars(stripslashes($_POST['email']));
        $curPwd = htmlspecialchars(stripslashes($_POST['current_password']));
        $newPwd = htmlspecialchars(stripslashes($_POST['new_password']));
        $rePwd = htmlspecialchars(stripslashes($_POST['retype_password']));
        
        /* check password */
        $check_password = $connectdb->prepare("SELECT * FROM users WHERE email = :email AND user_password = :user_password");
        $check_password->bindvalue('email', $email);
        $check_password->bindvalue('user_password', $curPwd);
        $check_password->execute();

        if($check_password->rowCount() > 0){
            if(strlen($newPwd) >= 6){
                if($rePwd === $newPwd){
                    $update_password = $connectdb->prepare("UPDATE users SET user_password = :user_password WHERE email = :email");
                    $update_password->bindvalue('user_password', $newPwd);
                    $update_password->bindvalue('email', $email);
                    $update_password->execute();

                    if($update_password){
                        $_SESSION['success'] = "Password Changed Suuccessfully!";
                        header("Location: index.php");
                        session_unset();
                        session_destroy();
                    }else{
                        $_SESSION['error'] = "Failed to change password!";
                        header("Location: account.php");
                    }
                }else{
                    $_SESSION['error'] = "Passwords doesn't Match!";
                        header("Location: account.php");
                    /* echo "<script>Alert('Passwords doesn't Match');
                    window.open('account.php', '_parent')</script>"; */
                }
            }else{
                $_SESSION['error'] = "Password too short!";
                header("Location: account.php");
            }
        }else{
            $_SESSION['error'] = "Current password is incorrect";
                    header("Location: account.php");
           /*  echo "<script>Alert('Current password is incorrect!');
                window.open('account.php', '_parent')</script>"; */
        }

        
    }
?>