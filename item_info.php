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
            echo $view->first_name . " " . $view->last_name. " - Foodies - Item info";
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
    <section id="itemContent">
        
        <div class="itemInfo">
            <?php
                if(isset($_GET['item'])){
                    $item_id = $_GET['item'];
                

                    $view_item = $connectdb->prepare("SELECT menu.item_name, menu.item_prize, menu.item_category, menu.item_foto, menu.item_description, menu.restaurant_name, restaurants.restaurant_name, restaurants.restaurant_address, restaurants.restaurant_location, restaurants.restaurant_logo FROM menu, restaurants WHERE menu.restaurant_name = restaurants.restaurant_name AND item_id = :item_id");
                    $view_item->bindvalue('item_id', $item_id);
                    $view_item->execute();

                    $items = $view_item->fetchAll();
                    foreach($items as $item):
                
                
            ?>
            <figure class="item_details"> 
                
                    <img src="<?php echo "items/".$item->item_foto?>" alt="item">
                <form action="cart.php" method="POST">
                    <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $item->item_name?>">
                    <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $item->item_prize?>">
                    <input type="hidden" name="cart_item_restaurant" id="cart_item_restaurant" value="<?php echo $item->restaurant_name?>">
                    <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                    <figcaption>
                        <div class="menu_logo">
                            <img src="<?php echo "logos/".$item->restaurant_logo;?>" alt="restaurant">
                        </div>
                        <div class="clear"></div>
                        <p><span>Name:</span> <?php echo $item->item_name?></p>
                        <p><span>Category:</span> <?php echo $item->item_category?></p>
                        <p><span>Amount:</span> ₦<?php echo $item->item_prize?></p>
                        <p><span>Restaurant:</span> <?php echo $item->restaurant_name?></p>
                        <p><span>Restaurant Location:</span> <?php echo $item->restaurant_location?></p>
                        <input type="number" id="quantity" name="quantity" required placeholder="Select Quantity">
                        <button type="submit" name="add_to_cart" id="add_to_cart" title="add to cart" class="add_cart">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                    </figcaption>
                </form>
            </figure>
            <div class="item_descriptions">
                <hr>
                <h3>Item Descriptions</h3>
                <p><?php echo $item->item_description;?></p>
            </div>
            <?php endforeach; }?>
        </div>
    </section>
    
    <main>
        <!-- <section id="featured">
            
            <h2>Featured cuisines</h2>
            <div class="featured">
                <?php
                    $select_featured = $connectdb->prepare("SELECT * FROM menu WHERE featured_item = 1");
                    $select_featured->execute();
                    $rows = $select_featured->fetchAll();
                    foreach($rows as $row):
                ?>
                <figure>
                    <a href="javascript:void(0);" onclick="showItems('<?php echo $row->item_id?>')">
                        <img src="<?php echo 'items/'.$row->item_foto;?>" alt="featured item">
                        <figcaption>
                            <p><?php echo $row->item_name?></p>
                            <span>₦ <?php echo $row->item_prize?></span>
                        </figcaption>
                    </a>
                </figure>
                
                <?php endforeach ?>
            </div>
            <button id="view_more">View more</button>
            <button id="show_less">Show less</button>
        </section>
        <section id="shop" class="row">
            
        </section> -->
        
    </main>
    <?php
        /* if(isset($_SESSION['error_box'])){
            echo "<div class='error_box'><p>" . $_SESSION['error_box'] . "</p>
            <button id='close_error'>Ok</button></div>";
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