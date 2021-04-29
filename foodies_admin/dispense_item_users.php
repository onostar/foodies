<?php
    include "server.php";
    session_start();

    if(isset($_GET['dispense'])){
        $item_id = $_GET['dispense'];
        $dispense_item = $connectdb->prepare("UPDATE orders SET order_status = 1, delivery_date = CURDATE() WHERE order_id = :order_id");
        $dispense_item->bindvalue('order_id', $item_id);
        $dispense_item->execute();

        if($dispense_item){
            /* echo "<script>alert('Item dispensed!');
            window.open('admin.php', '_parent');</script>"; */
            $_SESSION['success'] = "Item Dispensed!";
            header("Location: users.php");
        }else{
            $_SESSION['error'] = "failed to dispense";
            header("Location: users.php");
        }
    }