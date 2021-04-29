<?php include "server.php"; session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Foodies is an online platform made for the purpose of ordering food, snacks, cakes, etc from all kinds of restaurant in your neighbourhood from whereever you are through your mobile phone, tablet or pc">
    <meta name="keyword" content="food, ordering, order food, restaurant, eatery, ice cream, cakes, place order, online, fried reice, turkey, chicken">
    <title>Foodies - Home to all things food</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css"> -->
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
            <a href="javascript:void(0);" onclick="loginFirst();" title="view cart"><i class="fas fa-shopping-cart"></i> Cart <span id="cart_value">0</span></a>
        </div>
    </header>
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
    <section id="bannerContents">
        <aside id="asideLeft">
            <nav id="index_nav">
                <ul>
                    <li><a href="javascript:void(0);"><i class="fas fa-ice-cream"></i>Ice cream</a> </li>
                    <li><a href="javascript:void(0);"><i class="fas fa-hamburger"></i>Snacks</a> </li>
                    <li><a href="javascript:void(0);"><i class="fas fa-utensils"></i>Grains</a></li>
                    <li><a href="javascript:void(0);"><i class="fas fa-drumstick-bite"></i>Chicken & Turkey</a></li>
                    <li><a href="javascript:void(0);"><i class="fas fa-concierge-bell"></i>Swallow</a></li>
                    <li><a href="javascript:void(0);"><i class="fas fa-cheese"></i>Small Chops</a></li>
                    <li><a href="javascript:void(0);"><i class="fas fa-birthday-cake"></i>Cakes</a></li>
                    <li><a href="javascript:void(0);"><i class="fas fa-pizza-slice"></i>Other Categories</a></li>
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
                <i class="fas fa-coins"></i>
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
                <p>Our Restaurants</p>
            </a>
        </div>
    </section>
    <main>
        <section id="featured">
            <h2>Featured Items</h2>
            <div class="featured">
                <?php
                    $select_featured = $connectdb->prepare("SELECT * FROM menu WHERE featured_item = 1");
                    $select_featured->execute();
                    $rows = $select_featured->fetchAll();
                    foreach($rows as $row):
                ?>
                <figure>
                    <a href="javascript:void(0);" onclick="loginFirst();">
                        <img src="<?php echo 'items/'.$row->item_foto;?>" alt="featured item">
                        <figcaption>
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <span>₦ <?php echo $row->item_prize?></span>
                            </div>
                            <!-- <button title="add to cart" class="add_cart"><i class="fas fa-shopping-cart"></i></button> -->
                        </figcaption>
                    </a>
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
                    <a href="javascript:void(0);" onclick="loginFirst();">
                        <img src="<?php echo 'items/'.$row->item_foto;?>" alt="featured item">
                        <figcaption>
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <span>₦ <?php echo $row->item_prize?></span>
                            </div>
                            <button title="add to cart" class="add_cart"><i class="fas fa-shopping-cart"></i></button>
                        </figcaption>
                    </a>
                </figure>
                
                <?php endforeach ?>
                
            </div>
            <button id="more">View more</button>
            <button id="less">Show less</button>
        </section>
    </main>
    <div id="loginPrompt">
        <p>Kindly Login to View Item!</p>
        <div class="log">
            <a href="registration.php" title="Login here">Login</a>
            <a href="javascript:void();" id="closeBox" title="Close box">Close</a>
        </div>
    </div>
    <script src="bootstrap.min.js"></script>
    <script src="jquery.js"></script>
    <script src="script.js"></script>
</body>
</html>