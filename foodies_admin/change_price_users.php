<?php
    include "server.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";

    if(isset($_POST['change_prize'])){
        $new_prize = htmlspecialchars(stripslashes($_POST['item_prize']));
        $item_id = $_POST['item_id'];

        $update_price = $connectdb->prepare("UPDATE menu SET item_prize = :item_prize WHERE item_id = :item_id");
        $update_price->bindvalue('item_prize', $new_prize);
        $update_price->bindvalue('item_id', $item_id);
        $update_price->execute();

        if($update_price){
            // echo $new_prize;
            $_SESSION['success'] = "Price changed successfully!";
            header("Location: users.php");
        }else{
            $_SESSION['error'] = "Failed to change price!";
            header("Location: users.php");
        }
    }