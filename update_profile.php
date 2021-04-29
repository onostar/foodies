<?php
    include "server.php";
    session_start();

    if(isset($_POST['update_profile'])){
        $email = htmlspecialchars(stripslashes($_POST['email']));
        $firstname = htmlspecialchars(stripslashes($_POST['firstName']));
        $lastname = htmlspecialchars(stripslashes($_POST['lastName']));
        $address = htmlspecialchars(stripslashes($_POST['address']));
        $phone = htmlspecialchars(stripslashes($_POST['phone']));
        $city = htmlspecialchars(stripslashes($_POST['city']));

        $update_profile = $connectdb->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, phone_number = :phone_number, address = :address, city = :city WHERE email = :email");
        $update_profile->bindvalue('first_name', $firstname);
        $update_profile->bindvalue('last_name', $lastname);
        $update_profile->bindvalue('phone_number', $phone);
        $update_profile->bindvalue('address', $address);
        $update_profile->bindvalue('city', $city);
        $update_profile->bindvalue('email', $email);
        $update_profile->execute();

        if($update_profile){
            $_SESSION['success'] = "Your Profile has been updated!";
            header("Location: account.php");
        }else{
            $_SESSION['error'] = "Update failed!";
            header("Location: account.php");
        }
    }
?>