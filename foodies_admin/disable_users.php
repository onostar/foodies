<?php
    include "server.php";
    session_start();

    /* function validate($field){
        if(!isset($_POST[$field])){
            return false;
        }else{
            return htmlspecialchars(stripcslashes($_POST[$field]));
        }
    } */
    
    $_SESSION['success'] = "";
    $_SESSION['error'] = "";
    // if(isset($_POST['disable'])){
        $user = $_POST['user_name'];
        $disable = $connectdb->prepare("DELETE FROM  administrators WHERE contact_person = :contact_person");
        $disable->bindvalue('contact_person', $user);
        $disable->execute();

        if($disable){
            /* $_SESSION['success'] = "$user Disabled!";
            header("Location: admin.php"); */
            echo "<p class='exist'><span>" . $user . "</span> disabled!</p>";
        }else{
            /* $_SESSION['error'] = "$user could not be disabled!";
            header("Location: admin.php"); */
            echo "<p class='exist'>Failed to disable user</p>";

        }
    // }
?>