<?php
    session_start();
    require "server.php";

    function validate($field){
        if(!isset($_POST[$field])){
            return false;
        }else{
            return htmlspecialchars(stripslashes($_POST[$field]));
        }
    }

    if(isset($_POST['change_password'])){
        $restaurant_email = strtolower(validate('restaurant_email'));
        $new_password = validate('new_password');
        $confirm_password = validate('confirm_password');

        /* update user password*/
        if(strlen($new_password) < 6){
            $_SESSION['error'] = "Error: Password too short!";
            header("Location: change_password.php");
        }elseif($new_password !== $confirm_password){
            $_SESSION['error'] = "Error: Password does not match!";
            header("Location: change_password.php");
        }else{
            $update_password = $connectdb->prepare("UPDATE eateries SET user_password = :user_password WHERE restaurant_email = :restaurant_email");
            $update_password->bindvalue('restaurant_email', $restaurant_email);
            $update_password->bindvalue('user_password', $new_password);
            $update_password->execute();

            if($update_password){
                $_SESSION['success'] = "Password changed succesfully";
                header("Location: index.php");
            }else{
                $_SESSION['error'] = "Failed to update password!";
                header("Location: change_password.php");
            }
        }

        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Foodies is an online platform made for the purpose of ordering food, snacks, cakes, etc from all kinds of restaurant in your neighbourhood from whereever you are through your mobile phone, tablet or pc">
    <meta name="keyword" content="food, ordering, order food, restaurant, eatery, ice cream, cakes, place order, online, fried reice, turkey, chicken">
    <title>Foodies - Change password</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-5.12.1-web/css/all.css">
    <link rel="icon" type="image/png" href="images/foodie.png" size="32X32">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="banner_img">
        <img src="images/food.jpg" alt="foodies baner">
    </div>
    
    <header>
        <h1 class="logo">
            <a href="index.php" title="home">
                <img src="images/foodies_logo.png" alt="foodies" class="img-fluid">
            </a>
        </h1>
        <div class="rms">
            <h2>Restaurant management System</h2>
            
        </div>
        
    </header>
    
    <main>
        <div class="success">
            <?php
                if(isset($_SESSION['success'])){
                    echo "<p>" .$_SESSION['success']. "</p>";
                    unset($_SESSION['success']);
                }
            ?>
        </div>
        <section id="login_reg">
            <div class="login_details">
                <div class="error">
                    <?php
                        if(isset($_SESSION['error'])){
                            echo "<p>". $_SESSION['error']. "</p>";
                            unset($_SESSION['error']);
                        }
                    ?>
                </div>
                <h2>Change your password</h2>
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                    <label for="login">Email</label><br>
                    <input type="email" name="restaurant_email" id="login" value="<?php if(isset($_SESSION['users'])){echo $_SESSION['users'];}?>"><br><br>
                    <label for="password">Password</label><br>
                    <input type="password" name="new_password" id="password" placeholder="Enter password"><br><br>
                    <label for="confirm_password">Confirm Password</label><br>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter password" required><br>
                    <button type="submit" name="change_password">Change Password</button>
                </form>
            </div>
                
            <!-- <div class="reg_details">
                <h2>Register for a new account</h2>
                <div class="error">
                    <?php
                        if(isset($_SESSION['error'])){
                            echo "<p>". $_SESSION['error']. "</p>";
                            unset($_SESSION['error']);
                        }
                    ?>
                </div>
                <form action="register.php" method="POST">
                    <div class="details">
                        <input type="text" name="first_name" placeholder="First Name">
                        <input type="text" name="last_name" placeholder="Last Name">
                    </div>
                    <div class="details">
                        <input type="email" name="email" placeholder="Email">
                        <input type="tel" name="phone_number" placeholder="Phone Number">
                    </div>
                    <div class="details">
                        <input type="password" name="user_password" placeholder="enter password">
                        <input type="password" name="confirm_password" placeholder="Confirm password">
                    </div>
                    <button type="submit" name="submit_reg">Register</button>
                </form>
            </div> -->
        </section>
    </main>
    
    <script src="bootstrap.min.js"></script>
    <script src="jquery.js"></script>
    <script src="script.js"></script>
</body>
</html>