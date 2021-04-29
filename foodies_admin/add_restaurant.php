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
    if(isset($_POST['add_restaurant'])){
        $restaurant_name = ucwords(validate('restaurantName'));
        $restaurant_address = validate('restaurantAddress');
        $restaurant_location = ucwords(validate('restaurantLocation'));
        $restaurant_logo = $_FILES['restaurantLogo']['name'];
        $logo = "../logos/".$restaurant_logo;

        /* check user availability */
        $check_user = $connectdb->prepare("SELECT * FROM restaurants WHERE restaurant_name = :restaurant_name");
        
        $check_user->bindvalue('restaurant_name', $restaurant_name);
        $check_user->execute();

        if($check_user->rowCount() > 0){
            $_SESSION['error'] = "$restaurant_name already Exists!";
            header("Location: admin.php");
            /* echo "<p class='exist'><span>". $restaurant_name . "</span> already Exists!</p>"; */

        }else{
            if(move_uploaded_file($_FILES['restaurantLogo']['tmp_name'], $logo)){
                $add_restaurant = $connectdb->prepare("INSERT INTO restaurants (restaurant_name, restaurant_address, restaurant_location, restaurant_logo) VALUES (:restaurant_name, :restaurant_address, :restaurant_location, :restaurant_logo)");
                $add_restaurant->bindvalue('restaurant_name', $restaurant_name);
                $add_restaurant->bindvalue('restaurant_address', $restaurant_address);
                $add_restaurant->bindvalue('restaurant_location', $restaurant_location);
                $add_restaurant->bindvalue('restaurant_logo', $restaurant_logo);
                $add_restaurant->execute();

                if($add_restaurant){
                    $_SESSION['success'] = "$restaurant_name addedd Successfully!";
                    header("Location: admin.php");
                    /* echo "<p><span>" . $restaurant . "</span> created successfully!"; */
                }else{
                    $_SESSION['error'] = "$restaurant_name not created!";
                    header("Location: admin.php");
                    /* echo "<p>restaurant not created!</p>"; */

                }
            }else{
                /* echo "<p class='exist'>failed to upload logo!</p>"; */
                $_SESSION['error'] = "Logo upload failed!";
                    header("Location: admin.php");
            }
            
        }
    }
?>