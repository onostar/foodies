<?php
    include "server.php";
    session_start();

    if(isset($_GET['remove'])){
        $id = $_GET['remove'];
        $delete_featured = $connectdb->prepare("UPDATE menu SET featured_item = 0 WHERE item_id = :item_id");
        $delete_featured->bindvalue('item_id', $id);
        $delete_featured->execute();

        if($delete_featured){
            $_SESSION['success'] = "item Removed from featured";
            header("Location: admin.php");
        }else{
            $_SESSION['error'] = "failed to remove";
            header("Location: admin.php");
        }
    }