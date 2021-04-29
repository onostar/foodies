<?php
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Foodies is an online platform made for the purpose of ordering food, snacks, cakes, etc from all kinds of restaurant in your neighbourhood from whereever you are through your mobile phone, tablet or pc">
    <meta name="keyword" content="food, ordering, order food, restaurant, eatery, ice cream, cakes, place order, online, fried reice, turkey, chicken">
    <title>Foodies - Restaurant management</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-5.12.1-web/css/all.css">
    <link rel="icon" type="image/png" href="images/foodie.png" size="32X32">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="banner_img">
        <img src="images/restaurant.jpg" alt="foodies baner">
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
                <h2>Enter login details</h2>
                <form action="login.php" method="post">
                    <label for="login">Email</label><br>
                    <input type="email" name="restaurant_email" id="login" placeholder="Enter your email" required><br><br>
                    <label for="password">Password</label><br>
                    <input type="password" name="user_password" id="password" placeholder="Enter password" required><br>
                    <button type="submit" name="submit_login">Login</button>
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