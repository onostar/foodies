<?php
    session_start();
    require "server.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Foodies is an online platform made for the purpose of ordering food, snacks, cakes, etc from all kinds of restaurant in your neighbourhood from whereever you are through your mobile phone, tablet or pc">
    <meta name="keyword" content="food, ordering, order food, restaurant, eatery, ice cream, cakes, place order, online, fried reice, turkey, chicken">
    <title>Foodies - Home to all things food</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="images/foodie.png" size="32X32">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <section class="top_head" id="topHeader">
        <div class="social_media">
            <a href="javascript:void(0);" target="_blank" title="Follow us on facebook"><i class="fab fa-facebook"></i></a>   
            <a href="javascript:void(0);" target="_blank" title="Follow us on twitter"><i class="fab fa-twitter"></i></a>   
            <a href="javascript:void(0);" target="_blank" title="Follow us on instagram"><i class="fab fa-instagram"></i></a>   
            <a href="javascript:void(0);" target="_blank" title="Follow us on linkedin"><i class="fab fa-linkedin"></i></a>   
            <a href="javascript:void(0);" target="_blank" title="Follow us on whatsapp"><i class="fab fa-whatsapp"></i></a>   
        </div>
        <div class="contact_phone">
            <p class="text-right"><i class="fas fa-phone-square-alt"></i> Call us: +2347068897068, +2347057456881</p>
        </div>
    </section>
    <header>
        <h1 class="logo">
            <a href="index.php" title="home">
                <img src="images/foodies_logo.png" alt="foodies" class="img-fluid">
            </a>
        </h1>
        <div class="search">
            <form class="form-inline" action="search_result.php" method="POST">
                <input type="search" name="search_items" placeholder="search food, restaurant, items">
                <button type="submit" name="search">Search</button>
            </form>
            
        </div>
        <div class="login">
            <button id="loginDiv"><i class="far fa-user"></i> Login <i class="fas fa-chevron-down"></i></button>
            <div class="login_option">
                <div>
                    <button id="loginBtn"><a href="registration.php">Login</a></button>
                    <h3>OR</h3>
                    <a href="registration.php" id="signupBtn">Create an account</a>
                </div>
            </div>
        </div>
        <div class="cart">
            <a href="javascript:void(0);"><i class="fas fa-shopping-cart"></i> Cart</a>
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
                    <input type="email" name="email" id="login" placeholder="Enter your email" required><br><br>
                    <label for="password">Password</label><br>
                    <input type="password" name="user_password" id="password" placeholder="Enter password" required><br>
                    <button type="submit" name="submit_login">Login</button>
                </form>
            </div>
                
            <div class="reg_details">
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
            </div>
        </section>
    </main>
    
    <script src="bootstrap.min.js"></script>
    <script src="jquery.js"></script>
    <script src="script.js"></script>
</body>
</html>