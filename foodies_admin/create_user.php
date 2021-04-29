<?php
    include "server.php";
    session_start();

    function validate($field){
        if(!isset($_POST[$field])){
            return false;
        }else{
            return htmlspecialchars(stripcslashes($_POST[$field]));
        }
    }
    
    $_SESSION['success'] = "";
    $_SESSION['error'] = "";
    // if(isset($_POST['create_user'])){
        $restaurant_name = ucwords(validate('userRestaurant'));
        $restaurant_email = validate('restaurantEmail');
        $contact_person = ucwords(validate('contactPerson'));
        $contact_phone = validate('contactPhone');
        $user_password = 12345;

        /* check user availability */
        $check_user = $connectdb->prepare("SELECT * FROM administrators WHERE restaurant_email = :restaurant_email");
        
        $check_user->bindvalue('restaurant_email', $restaurant_email);
        $check_user->execute();

        if($check_user->rowCount() > 0){
            /* $_SESSION['error'] = "$contact_person already Exists!";
            header("Location: admin.php"); */
            echo "<p class='exist'><span>" .$contact_person . "</span> already Exists!</p>";

        }else{
            $create_user = $connectdb->prepare("INSERT INTO administrators (restaurant_name, restaurant_email, user_password, contact_person, contact_phone) VALUES (:restaurant_name, :restaurant_email, :user_password, :contact_person, :contact_phone)");
            $create_user->bindvalue('restaurant_name', $restaurant_name);
            $create_user->bindvalue('restaurant_email', $restaurant_email);
            $create_user->bindvalue('user_password', $user_password);
            $create_user->bindvalue('contact_person', $contact_person);
            $create_user->bindvalue('contact_phone', $contact_phone);
            $create_user->execute();

            if($create_user){
                /* $_SESSION['success'] = "$contact_person created Successfully!";
                header("Location: admin.php"); */
                echo "<p><span>" . $contact_person . " </span>created successfully!</p>";
            }else{
                /* $_SESSION['error'] = "$contact_name not created!";
                header("Location: admin.php"); */
                echo "User not created!";
            }
        }
    // }
?>