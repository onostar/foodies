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
            echo $view->first_name . " " . $view->last_name. " - Shopping cart";
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
    <section id="shoppingCart">
            <h2>My shopping cart</h2>
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
            <div class="shop_cart">
                
                <div class="cart_items">
                    <?php
                        $cart_items = $connectdb->prepare("SELECT menu.item_foto, menu.item_name, menu.restaurant_name, cart.cart_id, cart.item_name, cart.customer_email, menu.item_prize, cart.item_price, cart.quantity, cart.restaurant FROM menu, cart WHERE menu.item_name = cart.item_name AND menu.restaurant_name = cart.restaurant AND cart.customer_email = :customer_email");
                        $cart_items->bindvalue('customer_email', $user);
                        $cart_items->execute();

                        if($cart_items->rowCount() > 0){
                            $views = $cart_items->fetchAll();
                            foreach($views as $view):
                        

                        
                    ?>
                    <figure>
                        <img src="<?php echo 'items/'.$view->item_foto?>" alt="<?php echo $view->item_name?>">
                        <figcaption>
                            <p><strong><?php echo $view->item_name?></strong></p>
                            <p><?php echo $view->restaurant?></p>
                            <p>Qty: <span id="prizing"><?php echo $view->quantity?></span></p>
                            <p>Amount: ₦<span id="totalprice" class="totalprice"><?php echo $view->item_price?></span></p>
                            <div class="action">
                                <form action="update_quantity.php" method="POST">
                                    <input type="number" name="quantity" id="quantity" value="<?php echo $view->quantity?>">
                                    <input type="hidden" name="customer_email" value="<?php echo $user?>">
                                    <input type="hidden" name="item" value="<?php echo $view->item_name?>">
                                    <input type="hidden" name="item_prize" value="<?php echo $view->item_prize?>">
                                    <button type="submit" name="update_qty" title="update Quantity" id="update_qty">Update</button>
                                </form>
                                
                                <a onclick="removeCartItem('<?php echo $view->cart_id?>')" href="javascript:void(0);" title="Remove item" id="remove_item"><i class="fas fa-trash"></i></a>
                            </div>
                        </figcapiton>
                    </figure>
                    <?php
                        endforeach;
                        }else{
                            echo "<p class='empty'>Your cart is empty!</p>";
                        }    
                    ?>
                    
                </div>
                <div class="total">
                    <?php
                        if($cart_items->rowCount() > 0):
                    ?>
                    <h3>Amount Due</h3>
                    <p class="total_per_item">Total: <span class="itemsTotal" id="itemTotals">₦ <span id="itemTotal"><?php
                        $get_total = $connectdb->prepare("SELECT SUM(item_price) AS total_prize FROM cart WHERE customer_email = :customer_email");
                        $get_total->bindvalue('customer_email', $user);
                        $get_total->execute();

                        $totals = $get_total->fetchAll();
                        foreach($totals as $total){
                    echo $total->total_prize;}?>.00</span></span></p>
                   
                    <p class="total_per_item">Delivery fee: <span>₦ <span id="delivery">1000.00</span></span></p>
                    <p class="total_per_item">Discount: <span>- ₦ <span id="discount">0.00</span></span></p>
                    <hr style="width:100%; height:1px; color: rgba(68, 66, 66, .2); background:rgba(68, 66, 66, .1);">
                    <p class="total_per_item" style="font-weight:bold;">Grand Total:<span id="item_grand_total">₦<span id="grandTotal"></span></span></p>
                    <hr style="width:100%; height:1px; background:rgba(68, 66, 66, .1); color: rgba(68, 66, 66, .2); ">
                    <div class="order_or_clear">
                        <form action="order.php" method="POST" class="order_form">
                            <input type="hidden" name="customer" value="<?php echo $user?>">
                            <button type="submit" name="order" id="order">Confirm Order</button>
                        </form>
                        <form action="clear_cart.php" method="POST" class="clear_cart_form">
                            <input type="hidden" name="customer_email" value="<?php echo $user;?>">
                            <button type="submit" name="clear_cart" id="clear_cart">Clear Cart</button>
                        </form>
                    </div>
                </div>
                <?php endif;?>
            </div>
            
        </section>
        <!-- <section id="featured">
            
            <h2>Featured cuisines</h2>
            <div class="featured">
                <?php
                    /* $select_featured = $connectdb->prepare("SELECT * FROM menu WHERE featured_item = 1");
                    $select_featured->execute();
                    $rows = $select_featured->fetchAll();
                    foreach($rows as $row): */
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
                
                <?php //endforeach ?>
            </div>
            <button id="view_more">View more</button>
            <button id="show_less">Show less</button>
        </section>
        <section id="shop" class="row">
            
        </section> -->
        
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