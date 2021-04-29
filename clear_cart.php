<?php
    include "server.php";
    session_start();

    if(isset($_POST['clear_cart'])){
        $customer = $_POST['customer_email'];
        $delete_cart = $connectdb->prepare("DELETE FROM cart WHERE customer_email = :customer_email");
        $delete_cart->bindvalue('customer_email', $customer);
        $delete_cart->execute();

        if($delete_cart){
            // $_SESSION['success'] = "item Removed from cart!";
            
            header("Location: shopping_cart.php");
        }else{
            $_SESSION['error'] = "failed to remove";
            header("Location: shopping_cart.php");
        }
    }