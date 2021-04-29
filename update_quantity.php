<?php
    include "server.php";
    session_start();

    if(isset($_POST['update_qty'])){
        $new_qty = htmlspecialchars(stripslashes($_POST['quantity']));
        $customer = htmlspecialchars(stripslashes($_POST['customer_email']));
        $item = htmlspecialchars(stripslashes($_POST['item']));
        $item_prize = htmlspecialchars(stripslashes($_POST['item_prize']));
        $new_price = $new_qty * $item_prize;

        $update_qty = $connectdb->prepare("UPDATE cart SET quantity = :quantity, item_price = :item_price WHERE customer_email = :customer_email AND item_name = :item_name");

        $update_qty->bindvalue('quantity', $new_qty);
        $update_qty->bindvalue('item_price', $new_price);
        $update_qty->bindvalue('customer_email', $customer);
        $update_qty->bindvalue('item_name', $item);
        $update_qty->execute();

        if($update_qty){
            header("Location: shopping_cart.php");
        }
        else{
            echo "update failed!";
        }
    }
?>