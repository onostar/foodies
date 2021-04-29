<?php
    include "server.php";
    session_start();

    if(isset($_GET['cancel'])){
        $item_id = $_GET['cancel'];
        $cancel_order = $connectdb->prepare("UPDATE orders SET order_status = -1, delivery_date = CURDATE() WHERE order_id = :order_id");
        $cancel_order->bindvalue('order_id', $item_id);
        $cancel_order->execute();

        if($cancel_order){
           /*  echo "<script>alert('Order cancelled!');
            window.open('admin.php', '_parent');</script>"; */
            $_SESSION['error'] = "Order Cancelled!";
            header("Location: users.php");
        }else{
            $_SESSION['error'] = "failed to cancel";
            header("Location: users.php");
        }
    }