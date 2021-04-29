<?php
    require "server.php";
    session_start();
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Foodies is an online platform made for the purpose of ordering food, snacks, cakes, etc from all kinds of restaurant in your neighbourhood from whereever you are through your mobile phone, tablet or pc">
    <meta name="keyword" content="food, ordering, order food, restaurant, eatery, ice cream, cakes, place order, online, fried reice, turkey, chicken">
    <title>
        <?php
            $user_info = $connectdb->prepare("SELECT * FROM users WHERE email = :email");
            $user_info->bindvalue('email', $user);
            $user_info->execute();
            $view = $user_info->fetch();
            echo $view->first_name . " " . $view->last_name. " - Profile";
        ?>
    </title>
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
            <a href="main.php" title="home">
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
            <button id="loginDiv"><i class="far fa-user"></i> 
                <?php 
                    $statement = $connectdb->prepare("SELECT * FROM users WHERE email = :email");
                    $statement->bindvalue('email', $user);
                    $statement->execute();
                    $infos = $statement->fetchAll();
                    foreach($infos as $info){
                        echo "Hello $info->first_name";
                    }
                      
                ?> 
                <i class="fas fa-chevron-down"></i></button>
            <div class="login_option" id="account">
                <div>
                    <a href="account.php" class="signupBtn">My Account</a>
                    <a href="order_history.php" class="signupBtn">My orders</a>
                    <button id="logoutBtn"><a href="logout.php">Logout</a></button>
                    
                </div>
            </div>
        </div>
        <div class="cart">
            <a href="shopping_cart.php" title="view cart"><i class="fas fa-shopping-cart"></i> Cart <span id="cart_value">
            <span id="cart_value">
                <?php
                    $cart_num = $connectdb->prepare("SELECT * FROM cart WHERE customer_email = :customer_email");
                    $cart_num->bindvalue('customer_email', $user);
                    $cart_num->execute();

                    if($cart_num->rowCount() > 0){
                        echo $cart_num->rowCount();
                    }else{
                        echo "0";
                    }
                ?>
            </span></a>
        </div>
    </header>
    
    <main>
    <section id="account">
            
            <hr>
            <p class="successful">
                <?php
                    if(isset($_SESSION['success'])){
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    }
                ?>
                <?php
                    if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                ?>
            </p>
            <div class="profile_details">
                <div class="userss" id="user_details">
                <h3>Account Details</h3>
                    <?php 
                        $show_details = $connectdb->prepare("SELECT * FROM users WHERE email = :email");
                        $show_details->bindvalue('email', $user);
                        $show_details->execute();

                        $views = $show_details->fetchAll();
                        foreach($views as $view):
                    ?>
                    <h4><?php echo $view->first_name . " " . $view->last_name; ?></h4>
                    <p><?php echo $view->email;?></p>
                    <?php endforeach;?>
                </div>
                <div class="userss" id="user_address">
                    <h3>Address Book</h3>
                    <div class="add">
                        <div class="address">
                            <h4>Your delivery address:</h4>
                            <?php 
                                $show_details = $connectdb->prepare("SELECT * FROM users WHERE email = :email");
                                $show_details->bindvalue('email', $user);
                                $show_details->execute();

                                $views = $show_details->fetchAll();
                                foreach($views as $view):
                            ?>
                            <p><?php echo $view->first_name . " " . $view->last_name; ?></p>
                            <p><?php echo $view->phone_number;?></p>
                            <p><?php echo $view->address;?></p>
                            <p style="text-transform:uppercase;"><?php echo $view->city;?></p>
                            <?php endforeach;?>
                        </div>
                        <div id="edit">
                            <a href="javascript:void(0);" title="Edit details" id="editDetails"><i class="fas fa-pen"></i></a>
                        </div>
                    </div>
                    
                </div>
                <div class="userss" id="change_password">
                    <a href="javascript:void(0);" title="Change your password" id="changePasword">Change password</a>
                </div>
            </div>
            <div class="update_details" id="update">
                <?php
                    $user_details = $connectdb->prepare("SELECT * FROM users WHERE email = :email");
                    $user_details->bindvalue('email', $user);
                    $user_details->execute();

                    $details = $user_details->fetchAll();
                    foreach($details as $detail):
                ?>
                <a href="javascript:void(0)" title="close section" id="close_update"><i class="fas fa-window-close"></i></a>
                <form action="update_profile.php" method="POST">
                    <div class="update">
                        <input type="hidden" name="email" value="<?php $get_user = $connectdb->prepare("SELECT * FROM users WHERE email = :email");
                        $get_user->bindvalue('email', $user);
                        $get_user->execute();
                        $gets = $get_user->fetchAll();
                        foreach($gets as $get){
                            echo $get->email;
                        }
                        ?>">
                        <div class="update_data">
                            <label for="firstName">First Name</label><br>
                            <input type="text" name="firstName" id="firstName" value="<?php echo $detail->first_name;?>">
                        </div>
                        <div class="update_data">
                            <label for="lastName">Last Name</label><br>
                            <input type="text" name="lastName" id="lastName" value="<?php echo $detail->last_name;?>">
                        </div>
                    </div>
                    <div class="update">
                        <div class="update_data">
                            <label for="phone">Phone Number</label><br>
                            <input type="tel" name="phone" id="phone" value="<?php echo $detail->phone_number;?>">
                        </div>
                        <div class="update_data">
                            <label for="address">Address</label><br>
                            <input type="text" name="address" id="address" value="<?php echo $detail->address;?>">
                        </div>
                    </div>
                    <div class="update">
                        <div class="update_data">
                            <label for="city">City</label><br>
                            <select name="city" id="city">
                                <option selected value="<?php echo $detail->city;?>"><?php echo $detail->city;?></option>
                                <option value="Benin">Benin</option>
                                <option value="Asaba">Asaba</option>
                                <option value="Warri">Warri</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" id="update_profile" name="update_profile">Update Details</button>
                </form>
                <?php endforeach;?>
            </div>
            <!-- change password -->
            <div class="change_password">
                
                <form action="change_password.php" method="POST">
                    <h3>Change your password</h3>
                    <input type="hidden" name="email" value="<?php $get_user = $connectdb->prepare("SELECT * FROM users WHERE email = :email");
                    $get_user->bindvalue('email', $user);
                    $get_user->execute();
                    $gets = $get_user->fetchAll();
                    foreach($gets as $get){
                        echo $get->email;
                    }
                    ?>">
                    <label for="currPwd">Current password</label><br>
                    <input type="password" name="current_password" id="current_password" required><br>
                    <label for="newPwd">New Password</label><br>
                    <input type="password" name="new_password" id="new_password" required><br>
                    <label for="rePwd">Retype Password</label><br>
                    <input type="password" name="retype_password" id="retype_password" required><br>
                    <button type="submit" name="change_password" id="change_password">Save</button>
                </form>
            </div>
        </section>
        
        
    </main>

    
    
    <script src="bootstrap.min.js"></script>
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    
</body>
</html>

<?php
    }else{
        header("Location: index.php");
    }
?> 