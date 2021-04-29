<?php
    include "server.php";
    session_start();

    if(isset($_GET['cart_item'])){
        $cart_id = $_GET['cart_item'];
        $delete_item = $connectdb->prepare("DELETE FROM cart WHERE cart_id = :cart_id");
        $delete_item->bindvalue('cart_id', $cart_id);
        $delete_item->execute();

        if($delete_item){
            $_SESSION['success'] = "item Removed from cart!";
            header("Location: shopping_cart.php");
        }else{
            $_SESSION['error'] = "failed to remove";
            header("Location: shopping_cart.php");
        }
    }