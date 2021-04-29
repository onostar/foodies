<?php
    include "server.php";
    session_start();

    
    if(isset($_POST['order'])){
        $customer = htmlspecialchars(stripslashes($_POST['customer']));
        $today_date = date("Y-m-d");
        $order_time = date("Y-m-d h:i:s");
        $status = 0;
        $ran_number = rand(1, 1000);
        $order_dt = date("Ymdhis");
        $order_num = $ran_number . $order_dt;
        $confirm_order = $connectdb->prepare("INSERT INTO orders (customer_email, item_name, quantity, item_price, restaurant) SELECT customer_email, item_name, quantity, item_price, restaurant FROM cart WHERE customer_email = :customer_email");
        $confirm_order->bindvalue('customer_email', $customer);
        $confirm_order->execute();

        if($confirm_order){
            /* insert transaction date and number */
            $insert_date = $connectdb->prepare("UPDATE  orders SET order_date = :order_date, order_number = :order_number WHERE customer_email = :customer_email AND order_time = CURTIME()");
            $insert_date->bindvalue('order_date', $today_date);
            $insert_date->bindvalue('order_number', $order_num);
            $insert_date->bindvalue('customer_email', $customer);
            // $insert_date->bindvalue('order_time', $order_time);
            
            
            $insert_date->execute();


            /* delete from cart */
            $delete_cart = $connectdb->prepare("DELETE FROM cart WHERE customer_email = :customer_email");
            $delete_cart->bindvalue('customer_email', $customer);
            $delete_cart->execute();

            $_SESSION['success'] = "You have placed your order. Thank You!";
            header("Location: shopping_cart.php");
        }else{
            $_SESSION['error'] = "Failed to place order!";
            header("Location: shopping_cart.php");
        }
    }
?>