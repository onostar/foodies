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
            echo $view->first_name . " " . $view->last_name. " - Foodies - All things food";
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
    <section id="bannerContents">
        <aside id="asideLeft">
            <nav>
                <ul>
                <li>
                        <form action="categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="ice cream">
                            <i class="fas fa-ice-cream"></i> <input type="submit" value="Ice cream" name="check_category">
                        </form> 
                    </li>
                    <li>
                        <form action="categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="snacks">
                            <i class="fas fa-hamburger"></i> <input type="submit" value="Snacks" name="check_category">
                        </form> 
                    </li>
                    <li>
                        <form action="categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="grains">
                            <i class="fas fa-utensils"></i> <input type="submit" value="Rice and Beans" name="check_category">
                        </form>
                    </li>
                    <li>
                        <form action="categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="chicken turkey">
                            <i class="fas fa-drumstick-bite"></i> <input type="submit" value="Chicken & Turkey" name="check_category">
                        </form>
                    </li>
                    <li>
                        <form action="categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="swallow">
                            <i class="fas fa-concierge-bell"></i> <input type="submit" value="Swallow" name="check_category">
                        </form>
                    </li>
                    <li>
                        <form action="categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="small chops">
                            <i class="fas fa-cheese"></i> <input type="submit" value="Small Chops" name="check_category">
                        </form>
                    </li>
                    <li>
                        <form action="categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="Cakes">
                            <i class="fas fa-birthday-cake"></i> <input type="submit" value="Cakes" name="check_category">
                        </form>
                    </li>
                    <li>
                        <form action="categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="others">
                            <i class="fas fa-pizza-slice"></i> <input type="submit" value="Other categories" name="check_category">
                        </form>
                    </li>
                    <!-- <li><a href="javascript:void(0);"><i class="fas fa-pizza-slice"></i>special cuisines</a></li> -->
                    
                </ul>
            </nav>
        </aside>
        <section id="banner">
            <div class="slide">
                <div class="slides">
                    <div class="slide_img">
                        <img src="images/healthy-food-banner.jpg" alt="foodies compilation">
                    </div>
                    <div class="description">
                        <a href="javascript:void(0);">Learn more</a>
                    </div>
                </div>
                <div class="slides">
                    <div class="slide_img">
                        <img src="images/Jollof-Rice-scaled-1170x635.jpeg" alt="foodies compilation">
                    </div>
                    <div class="description">
                        <a href="javascript:void(0);"><i class="fas fa-shopping-cart"></i> Shop now</a>
                    </div>
                </div>
                <div class="slides">
                    <div class="slide_img">
                        <img src="images/eat.png" alt="foodies compilation">
                    </div>
                    <div class="description">
                        <a href="javascript:void(0);"><i class="fas fa-shopping-cart"></i> Shop now</a>
                    </div>
                </div>
                <div class="slides">
                    <div class="slide_img">
                        <img src="images/snacks.jpg" alt="foodies compilation">
                    </div>
                    <div class="description">
                        <a href="javascript:void(0);">Learn more</a>
                    </div>
                </div>
            </div>
        </section>
        <aside id="asideRight">
            <nav id="help">
                <ul>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="far fa-question-circle"></i>
                            <div class="note">
                                <h3>Help center</h3>
                                <p>Ask foodies</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="fas fa-street-view"></i>
                            <div class="note">
                                <h3>About us</h3>
                                <p>Who we are</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="fas fa-hand-holding-usd"></i>
                            <div class="note">
                                <h3>Refunds</h3>
                                <p>Money back guarantee</p>
                            </div>
                        </a>
                    </li>                          
                </ul>
            </nav>
            <div id="adds">
                <img src="images/food_add1.png" alt="food add">
            </div>
        </aside>
    </section>
    <section id="links">
        <div class="link_tags">
            <a href="javscript:void(0);">
                <i class="fas fa-users"></i>
                <p>Our partners</p>
            </a>
        </div>
        <div class="link_tags">
            <a href="javscript:void(0);">
                <i class="fas fa-circle"></i>
                <p>Top deals</p>
            </a>
        </div>
        <div class="link_tags">
            <a href="javscript:void(0);">
                <i class="fas fa-cookie"></i>
                <p>Top deals</p>
            </a>
        </div>
        <div class="link_tags">
            <a href="javscript:void(0);">    
                <i class="fas fa-home"></i>
                <p>Top Restaurants</p>
            </a>
        </div>
    </section>
    <main>
        <section id="featured">
            
            <h2>Featured cuisines</h2>
            <div class="featured">
                <?php
                    $select_featured = $connectdb->prepare("SELECT * FROM menu WHERE featured_item = 1");
                    $select_featured->execute();
                    $rows = $select_featured->fetchAll();
                    foreach($rows as $row):
                ?>
                <figure>
                    <form method="POST" action="cart.php">
                        <a href="javascript:void(0);" onclick="showItems('<?php echo $row->item_id?>')">
                        <img src="<?php echo 'items/'.$row->item_foto;?>" alt="featured item">
                        </a>
                        <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $row->item_name?>">
                        <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $row->item_prize?>">
                        <input type="hidden" name="cart_item_restaurant" id="cart_item_restaurant" value="<?php echo $row->restaurant_name?>">
                        <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                        <input type="hidden" id="quantity" name="quantity" value="1">
                        <figcaption>
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <span>₦ <?php echo $row->item_prize?></span>
                            </div>
                           <!--  <button type="submit" name="add_to_cart" id="add_to_cart" title="add to cart" class="add_cart"><i class="fas fa-shopping-cart"></i></button> -->
                        </figcaption>
                    </form>
                </figure>
                
                <?php endforeach ?>
            </div>
            <button id="view_more">View more</button>
            <button id="show_less">Show less</button>
        </section>
        <section id="all_items">
        <h2>Our food Shop</h2>
            <div class="all_items">
                <?php
                    $select_all = $connectdb->prepare("SELECT * FROM menu");
                    $select_all->execute();
                    $rows = $select_all->fetchAll();
                    foreach($rows as $row):
                ?>
                <figure>
                    <form action="cart.php" method="POST">
                        <a href="javascript:void(0);" onclick="showItems('<?php echo $row->item_id?>')">
                            <img src="<?php echo 'items/'.$row->item_foto;?>" alt="featured item">
                        </a>
                        <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $row->item_name?>">
                        <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $row->item_prize?>">
                        <input type="hidden" name="cart_item_restaurant" id="cart_item_restaurant" value="<?php echo $row->restaurant_name?>">
                        <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                        <input type="hidden" id="quantity" name="quantity" value="1">
                        <figcaption>
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <span>₦ <?php echo $row->item_prize?></span>
                            </div>
                            <button type="submit" name="add_to_cart" id="add_to_cart" title="add to cart" class="add_cart"><i class="fas fa-shopping-cart"></i></button>
                        </figcaption>
                    </form>
                </figure>
                
                <?php endforeach ?>
                
            </div>
            <button id="more">View more</button>
            <button id="less">Show less</button>
        </section>
        <section id="recommendedItems">
        <h2>Recommended for you</h2>
            <div class="all_items">
                <?php
                    $select_all = $connectdb->prepare("SELECT orders.customer_email, orders.item_name, orders.restaurant, menu.item_id, menu.item_category, menu.item_name, menu.item_prize, menu.item_foto, menu.restaurant_name, menu.item_description FROM orders, menu WHERE orders.customer_email = :customer_email AND menu.item_name = orders.item_name AND menu.restaurant_name = orders.restaurant");
                    $select_all->bindvalue('customer_email', $user);
                    $select_all->execute();
                    $rows = $select_all->fetchAll();
                    foreach($rows as $row):
                ?>
                <figure>
                    <form action="cart.php" method="POST">
                        <a href="javascript:void(0);" onclick="showItems('<?php echo $row->item_id?>')">
                            <img src="<?php echo 'items/'.$row->item_foto;?>" alt="featured item">
                        </a>
                        <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $row->item_name?>">
                        <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $row->item_prize?>">
                        <input type="hidden" name="cart_item_restaurant" id="cart_item_restaurant" value="<?php echo $row->restaurant_name?>">
                        <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                        <input type="hidden" id="quantity" name="quantity" value="1">
                        <figcaption>
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <p><?php echo $row->restaurant?></p>
                                <span>₦ <?php echo $row->item_prize?></span>
                            </div>
                            <button type="submit" name="add_to_cart" id="add_to_cart" title="add to cart" class="add_cart"><i class="fas fa-shopping-cart"></i></button>
                        </figcaption>
                    </form>
                </figure>
                
                <?php endforeach ?>
                
            </div>
        </section>
        
    </main>
    <?php
        /* if(isset($_SESSION['error_box'])){
            echo "<div class='error_box'><p>" . $_SESSION['error_box'] . "</p>
            <a id='close_error'>Ok</button></a>";
            unset($_SESSION['error_box']);
        } */
    ?>
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