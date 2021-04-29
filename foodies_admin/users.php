<?php
    require "server.php";
    session_start();
    if(isset($_SESSION['users'])){
        $user = $_SESSION['users'];
    
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
    $get_username = $connectdb->prepare("SELECT * FROM administrators WHERE restaurant_email = :restaurant_email");
    $get_username->bindvalue('restaurant_email', $user);
    $get_username->execute();

    $rows = $get_username->fetchAll();
    foreach($rows as $row):
?>
<?php $my_restaurant = $row->restaurant_name;
    $_SESSION['my_restaurant'] = $my_restaurant;
?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Foodies is an online platform made for the purpose of ordering food, snacks, cakes, etc from all kinds of restaurant in your neighbourhood from whereever you are through your mobile phone, tablet or pc">
    <meta name="keyword" content="food, ordering, order food, restaurant, eatery, ice cream, cakes, place order, online, fried reice, turkey, chicken">
    <title>Foodies - <?php echo $row->restaurant_name;?></title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="images/foodie.png" size="32X32">
    <link rel="stylesheet" href="style.css">
    
</head>
<body id="mainBody">
    <header class="admin_header">
        <h1 class="logo">
            <a href="users.php" title="home">
                <img src="images/foodies_logo.png" alt="foodies" class="img-fluid">
            </a>
        </h1>
        <div class="rms">
            <h2><?php echo $row->restaurant_name;?>' KITCHEN</h2>
            
        </div>
        <div class="login">
            <button id="loginDiv"><i class="far fa-user"></i> 
                <?php 
                    /* $statement = $connectdb->prepare("SELECT * FROM users WHERE email = :email");
                    $statement->bindvalue('email', $user);
                    $statement->execute();
                    $infos = $statement->fetchAll();
                    foreach($infos as $info){
                        echo "Hello $info->first_name";
                    }
                       */
                    echo "Hello, " . $row->contact_person;
                ?> 
                <i class="fas fa-chevron-down"></i></button>
            <div class="login_option" id="account">
                <div>
                    <a href="javascript:void(0);" class="signupBtn">Profile</a>
                    <!-- <a href="javascript:void(0);" class="signupBtn">My orders</a> -->
                    <button id="logoutBtn"><a href="logout.php">Logout</a></button>
        <?php endforeach;?>
                    
                </div>
            </div>
        </div>
    </header>
    <main class="admin_main">
        <aside id="user_aside">
            <nav>
                <div class="user_menu">
                    <?php
                        $user_rest = $connectdb->prepare("SELECT administrators.contact_person, administrators.restaurant_name, administrators.restaurant_email, restaurants.restaurant_name, restaurants.restaurant_logo FROM administrators, restaurants WHERE administrators.restaurant_email = :restaurant_email AND administrators.restaurant_name = restaurants.restaurant_name");
                        $user_rest->bindvalue('restaurant_email', $user);
                        $user_rest->execute();
                        $rowss = $user_rest->fetchAll();
                        foreach($rowss as $rows):
                    ?>
                    <h3><?php echo $rows->restaurant_name;?></h3>
                    <img src="<?php echo '../logos/'.$rows->restaurant_logo;?>" alt="Restaurant logo">

                    <?php endforeach;?>
                </div>

                <ul>
                    <li><a href="javascript:void(0);" id="nav1">Menus <i class="fas fa-plus"></i></a>
                        <ul id="nav1Menu" class="navs">
                            <!-- <li><a href="javascript:void(0);" id="addStore">Add Restaurant</a></li>
                            <li><a href="javascript:void(0);" id="addUser">Create Users</a></li>
                            <li><a href="javascript:void(0);" id="addCat" title="Add item categories">Add Category</a></li> -->
                            <li><a href="javascript:void(0);" id="addMenu" title="Add restaurant menu">Add Item</a></li>
                            <li><a href="javascript:void(0);" id="deleteItem" title="Delete restaurant Items">Delete Item</a></li>
                            <!-- <li><a href="javascript:void(0);" id="disableUser">Disable Users</a></li> -->
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" id="nav2">My Restaurant <i class="fas fa-plus"></i></a>
                        <ul id="nav2Menu" class="navs">
                            <!-- <li><a id="showRestaurants"  href="javascript:void(0);">Restaurant List</a></li> -->
                            <li><a id="showMenus" href="javascript:void(0);">Menu List</a></li>
                            <!-- <li><a id="showUsers" href="javascript:void(0);">User List</a></li> -->
                            <li><a id="customerList"  href="javascript:void(0);">Customer List</a></li>
                            <li><a id="modifyPrice" href="javascript:void(0);">Modify Item Price</a></li>
                            <!-- <li><a id="featured" href="javascript:void(0);">Featured items</a></li> -->
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" id="nav3">Manage Orders <i class="fas fa-plus"></i></a>
                        <ul id="nav3Menu" class="navs">
                            
                            <li><a id="orders"  href="javascript:void(0);">Pending Orders</a></li>
                            
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" id="nav4">Reports <i class="fas fa-plus"></i></a>
                        <ul id="nav4Menu">
                            <li><a id="deliveries"  href="javascript:void(0);">Successful Deliveries</a></li>
                            <li><a id="cancelled"  href="javascript:void(0);">Cancelled orders</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>
        <section id="contents">
            <div class="success_message">
                <p>
                    <?php
                        if(isset($_SESSION['success'])){
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        }
                    ?>
                </p>
            </div>
            <div class="error_message">
                <p>
                    <?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                    ?>
                </p>
            </div>
            <div id="dashboard">
                <!-- <div id="userSummary">
                    <figure>
                        <div id="user_img">
                            <img src="images/admin.png" alt="restuarant logo">
                        </div>
                        <figcaption>
                            <h3>Foodies</h3>
                            <h3>Onostar Media</h3>
                            <h3>Super Admin</h3>
                        </figcaption>
                    </figure>
                </div> --> 
                <div class="cards" id="card1">
                    <a href="javascript:void(0)">
                        <p>Pending Order(s)</p>
                        <div class="infos">
                            <i class="fas fa-cart-arrow-down"></i>
                            <p>
                                <?php
                                    $orders = $connectdb->prepare("SELECT * FROM orders WHERE restaurant = :restaurant AND order_status = 0");
                                    $orders->bindvalue('restaurant', $my_restaurant);
                                    $orders->execute();
                                    echo $orders->rowCount();
                                ?>
                            </p>
                        </div>
                    </a>
                </div> 
                <div class="cards" id="card0">
                    <a href="javascript:void(0)">
                        <p>Daily sales</p>
                        <div class="infos">
                            <i class="fas fa-coins"></i>
                            <p>
                                <?php
                                    
                                    $sales = $connectdb->prepare("SELECT SUM(item_price) AS today_sales  FROM orders WHERE restaurant = :restaurant AND order_status = 1 AND delivery_date = CURDATE()");
                                    $sales->bindvalue('restaurant', $my_restaurant);
                                    $sales->execute();
                                    
                                    $totals = $sales->fetchAll();
                                    foreach($totals as $total){
                                        echo "₦ " . $total->today_sales;
                                    }
                                ?>
                            </p>
                        </div>
                    </a>
                </div> 
                <div class="cards cust_cards" id="card2">
                    <a href="javascript:void(0)">
                        <p>Customers</p>
                        <div class="infos">
                            <i class="fas fa-store"></i>
                            <p>
                                <?php
                                    $users = $connectdb->prepare("SELECT * FROM orders WHERE restaurant = :restaurant GROUP BY customer_email");
                                    $users->bindvalue('restaurant', $my_restaurant);
                                    $users->execute();
                                    echo $users->rowCount();
                                ?>
                            </p>
                        </div>
                    </a>
                </div> 
                <div class="cards" id="card3">
                    <a href="javascript:void(0)">
                        <p>Declined order(s)</p>
                        <div class="infos">
                            <i class="fas fa-users"></i>
                            <p>
                                <?php
                                    $users = $connectdb->prepare("SELECT * FROM orders WHERE restaurant = :restaurant AND order_status = -1");
                                    $users->bindvalue('restaurant', $my_restaurant);
                                    $users->execute();
                                    echo $users->rowCount();
                                ?>
                            </p>
                        </div>
                    </a>
                </div> 
            </div>
            <!-- create user -->
            <!-- <div id="createUser">    
                <div class="info"></div>
                <div class="add_user_form">
                    <h3>Create new user</h3>
                    <form method="POST" action="creat_user.php">
                        <div class="inputs">
                            <div class="data">
                                <label for="contactPerson">Contact person</label><br>
                                <input type="text" name="contactPerson" id="contactPerson" placeholder="James Ike" required>
                            </div>
                            <div class="data">
                                <label for="contact_phone">Contact phone</label><br>
                                <input type="tel" name="contactPhone" id="contactPhone" placeholder="+234701234567" required>
                            </div>
                        </div>
                        <div class="inputs">
                            <div class="data">
                                <label for="restaurantMail">Contact Email</label><br>
                                <input type="email" name="restaurantEmail" id="restaurantEmail" placeholder="mail@example.com" required>
                            </div>
                            <div class="data">
                                <label for="restaurant">Restaurant</label><br>
                                <select name="userRestaurant" id="userRestaurant" required>
                                    <option value="" selected>Select Restaurant</option>
                                    <?php
                                        $select_restaurant = $connectdb->prepare("SELECT restaurant_name from restaurants ORDER BY restaurant_name");
                                        $select_restaurant->execute();
                                        $rows = $select_restaurant->fetchAll();
                                        foreach($rows as $row):
                                    ?>
                                    <option value="<?php echo $row->restaurant_name;?>"><?php echo $row->restaurant_name;?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="create_user" id="create_user">Create User <i class="fas fa-flag"></i></button>
                    </form>
                </div>
            </div> -->
            <!-- create restaurant -->
            <!-- <div id="addRestaurant">
                <div class="info"></div>
                <div class="add_user_form">
                    <h3>Add new Restaurant</h3>
                    <form method="POST" action="add_restaurant.php" enctype="multipart/form-data">
                        <div class="inputs">
                            <div class="data">
                                <label for="restaurant">Restaurant name</label><br>
                                <input type="text" name="restaurantName" id="restaurantName" placeholder="xyz eateries">
                            </div>
                            <div class="data">
                                <label for="restaurantAddress">Address</label><br>
                                <input type="text" name="restaurantAddress" id="restaurantAddress" placeholder="23 James borson road, Benin city">
                            </div>
                        </div>
                        <div class="inputs">
                            <div class="data">
                                <label for="restaurantLocation">Location</label><br>
                                <input type="text" name="restaurantLocation" id="restaurantLocation">
                            </div>
                            <div class="data">
                                <label for="restaurantLogo">Upload logo</label><br>
                                <input type="file" name="restaurantLogo" id="restaurantLogo">
                            </div>
                        </div>
                        <button type="submit" name="add_restaurant" id="add_restaurant">Add Restaurant <i class="fas fa-flag"></i></button>
                        
                    </form>
                </div>
            </div> -->
            <!-- add categories -->
            <!-- <div id="addCategories">
                <div class="info"></div>
                <div class="add_user_form">
                    <h3>Add Item Category</h3>
                    <form method="POST"  id="addCatForm">
                        <div class="inputs">
                            <div class="data">
                                <input type="text" name="category" id="category" placeholder="Enter item category" required>
                            </div>
                            <button type="submit" id="add_categories" name="add_categories">Add Category <i class="fas fa-sink"></i></button>
                        </div>
                    </form>
                </div>
            </div> -->
            <!-- add items -->
            <div id="addItems">
                <div class="info"></div>
                <div class="add_user_form">
                    <h3>Add Restaurant Menus</h3>
                    <form method="POST" id="addItemForm" action="add_items_users.php" enctype="multipart/form-data">
                        <div class="inputs">
                            <div class="data">
                                <input type="hidden" name="menuRestaurant" id="menuRestaurant" value="<?php echo $my_restaurant;?>" required>
                                <label for="menu_category">Category</label><br>
                                <select name="item_category" id="item_category" required>
                                    <option value="" selected>Select Item Categroy</option>
                                    <?php
                                        $select_category = $connectdb->prepare("SELECT category from categories ORDER BY category");
                                        $select_category->execute();
                                        $rows = $select_category->fetchAll();
                                        foreach($rows as $row):
                                    ?>
                                    <option value="<?php echo $row->category;?>"><?php echo $row->category;?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <div class="data">
                                <label for="item_name">Item Name</label>
                                <input type="text" name="menu_item" id="menu_item" placeholder="Enter item Name" required>
                            </div>
                        </div>
                        <div class="inputs">
                            
                            <div class="data">
                                <label for="item_prize">Item Prize</label>
                                <input type="number" name="menu_prize" id="menu_prize" placeholder="Item prize" required>
                            </div> 
                            <div class="data">
                                <textarea name="item_description" id="item_description" placeholder="Item Description and notes"></textarea>
                            </div>  
                        </div>
                        <div class="inputs">
                            <div class="data">
                                <label for="item_foto">Upload Item Photo</label>
                                <input type="file" name="item_foto" id="item_foto" placeholder="Enter item Name" required>
                            </div>
                            <button type="submit" id="add_items" name="add_items">Add item <i class="fas fa-plus"></i></button>
                        </div>
                        
                    </form>
                </div>
            </div>
            <!-- disable users -->
            <!-- <div id="disableUsers">
                <div class="info"></div>
                <div class="add_user_form">
                    <h3>Disable User Data</h3>
                    <form method="POST" id="disableUserForm">
                        <div class="inputs">
                            <div class="data">
                                <label for="disable_users">Select User Name</label><br>
                                <select name="user_name" id="user_name" required>
                                    <option value="" selected>Select User</option>
                                    <?php
                                        $select_user = $connectdb->prepare("SELECT * from administrators WHERE restaurant_email != 'admin@foodies.com' ORDER BY contact_person ");
                                        $select_user->execute();
                                        $rows = $select_user->fetchAll();
                                        foreach($rows as $row):
                                    ?>
                                    <option value="<?php echo $row->contact_person;?>"><?php echo $row->contact_person;?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" id="disable" name="disable">Disable <i class="fas fa-sink"></i></button>
                    </form>
                </div>
            </div> -->
            <!-- delete items -->
            <div id="deleteItems">
                <div class="info"></div>
                <div class="add_user_form">
                    <h3>Delete Restaurant Items</h3>
                    <form method="POST" id="deleteItemForm">
                        <div class="inputs">
                            <div class="data">
                                <label for="restaurant">Restaurant</label><br>
                                <select name="restaurantToDelete" id="restaurantToDelete" required>
                                    <option value="" selected>Select Restaurant</option>
                                    <?php
                                        $select_restaurant = $connectdb->prepare("SELECT restaurant_name from restaurants WHERE restaurant_name = :restaurant_name ORDER BY restaurant_name ASC");
                                        $select_restaurant->bindvalue('restaurant_name', $my_restaurant);
                                        $select_restaurant->execute();
                                        $rows = $select_restaurant->fetchAll();
                                        foreach($rows as $row):
                                    ?>
                                    <option value="<?php echo $row->restaurant_name;?>"><?php echo $row->restaurant_name;?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <div class="data">
                                <label for="itemName">Select Item</label><br>
                                <select name="itemToDelete" id="itemToDelete" required>
                                    <option value="" selected>Select item</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" id="delete_item" name="delete_item">Delete <i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </div>
            <!-- resrtaurnt list -->
            <div id="restaurantList" class="management">
                <?php require_once "restaurant_list.php";?>
            </div>
            <div id="menuList" class="management">
                <h3>menu Items</h3>
                <hr>
                <div class="search">
                    <input type="search" id="searchMenus" placeholder="Enter keyword">
                </div>
                <table id="menuTable">
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Categories</td>
                            <td>Item name</td>
                            <td>Price</td>
                        </tr>
                    </thead>

                    <?php
                        $n = 1;
                        $select_restaurant = $connectdb->prepare("SELECT * FROM menu WHERE restaurant_name = :restaurant_name ORDER BY item_category");
                        $select_restaurant->bindvalue('restaurant_name', $my_restaurant);
                        $select_restaurant->execute();
                        
                        $rows = $select_restaurant->fetchAll();
                        foreach($rows as $row):
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $n?></td>
                            <td><?php echo $row->item_category?></td>
                            <td><?php echo $row->item_name?></td>
                            <td><?php echo $row->item_prize?></td>
                        </tr>
                    </tbody>

                    <?php $n++; endforeach;?>
                </table>
            </div>
            <!-- modify price list -->
            <div id="priceList" class="management">
                <h3>Modify Item Price</h3>
                <hr>
                <div class="info"></div>
                <div class="search">
                    <input type="search" id="searchPrice" placeholder="Enter keyword">
                </div>
                <table id="priceTable">
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>category</td>
                            <td>menu</td>
                            <td>Modify Price</td>
                        </tr>
                    </thead>

                    <?php
                        $n = 1;
                        $select_restaurant = $connectdb->prepare("SELECT * FROM menu WHERE restaurant_name = :restaurant_name ORDER BY ITEM_CATEGORY");
                        $select_restaurant->bindvalue('restaurant_name', $my_restaurant);
                        $select_restaurant->execute();
                        
                        $rows = $select_restaurant->fetchAll();
                        foreach($rows as $row):
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $n?></td>
                            <td><?php echo $row->item_category?></td>
                            <td><?php echo $row->item_name?></td>
                            <td class="prices">
                                <form method="POST" action="change_price_users.php">
                                    <input type="hidden" name="item_id" id="item_id" value="<?php echo $row->item_id?>">
                                    <input type="text" name="item_prize" id="item_prize" value="<?php echo $row->item_prize;?>"><button type="submit" name="change_prize" id="changePrizeUser"><i class="fas fa-check"></i></button>
                                </form>
                            </td>
                        </tr>
                    </tbody>

                    <?php $n++; endforeach;?>
                </table>
            </div>
            <!-- user list -->
            
            <!-- cutomer list -->
            <div id="customers" class="management emp_customers">
                <h3>List of Customers</h3>
                <hr>
                <div class="search">
                    <input type="search" id="searchCustomers" placeholder="Enter keyword">
                </div>
                <table id="customerTable">
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Customer Name</td>
                            <td>Customer Email</td>
                            <td>Customer Phone</td>
                            <td>Customer Address</td>
                            
                        </tr>
                    </thead>

                    <?php
                        $n = 1;
                        $select_customer = $connectdb->prepare("SELECT users.first_name, users.last_name, users.email, users.phone_number, users.address, users.city, orders.customer_email, orders.restaurant FROM users, orders WHERE orders.restaurant = :restaurant AND users.email = orders.customer_email GROUP BY orders.customer_email ORDER BY users.first_name");
                        $select_customer->bindvalue('restaurant', $my_restaurant);
                        $select_customer->execute();
                        
                        $rows = $select_customer->fetchAll();
                        foreach($rows as $row):
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $n?></td>
                            <td><?php echo $row->first_name . " " .$row->last_name?></td>
                            <td><?php echo $row->email?></td>
                            <td><?php echo $row->phone_number?></td>
                            <td><?php echo $row->address . "<br>" . $row->city;?></td>
                        </tr>
                    </tbody>

                    <?php $n++; endforeach;?>
                    
                </table>
            </div>
            <!-- manage orders -->
            <div id="orderList" class="management">
                <h3>Manage pending order</h3>
                <hr>
                <div class="search">
                    <input type="search" id="searchOrder" placeholder="Enter keyword">
                </div>
                <table id="orderTable">
                
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Customer</td>
                            <td>item</td>
                            <td>Qty</td>
                            <td>Amount</td>
                            <td>Address</td>
                            <td>Date</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <?php
                        $n = 1;
                        $select_order = $connectdb->prepare("SELECT users.first_name, users.last_name, users.email, users.address, users.city, orders.order_id, orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.restaurant, orders.order_date, orders.order_time FROM users, orders WHERE orders.restaurant = :restaurant AND users.email = orders.customer_email AND orders.order_status = 0 ORDER BY orders.order_time");
                        $select_order->bindvalue('restaurant', $my_restaurant);
                        $select_order->execute();
                
                        $rows = $select_order->fetchAll();
                        foreach($rows as $row):
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $n?></td>
                            <td><?php echo $row->first_name . " " . $row->last_name?></td>
                            <td><?php echo $row->item_name?></td>
                            <td><?php echo $row->quantity?></td>
                            <td>₦ <?php echo $row->item_price?></td>
                             <td><?php echo $row->address . "<br>" . $row->city;?></td>
                            <td><?php echo $row->order_date?></td>
                            <td><button style="background:transparent; border:none; margin:0 auto;" title="Dispense Item" onclick="dispenseItemUser('<?php echo $row->order_id?>')"><i class="fas fa-truck" style="color:green; font-size:1.2rem;" ></i></button><button style="background:transparent; border:none; margin:0 auto;" title="Cancel Order" onclick="cancelOrderUser('<?php echo $row->order_id?>')"><i class="fas fa-plane-slash" style="color:red; font-size:1.2rem;" ></i></button></td>
                        </tr>
                        
                    </tbody>
                    <?php $n++; endforeach;?>
                    
                </table>
               <?php 
                    $check_order = $select_order->rowCount();
                    if(!$check_order){
                    echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.3rem; text-align:center; margin-top:10px;'>No record found!</p>";
                }
            ?>
            </div>
            <!-- successful deliveries list -->
             <div id="deliveryList" class="management">
                <div class="select_date">
                    <form action="search_date.php" method="POST">
                        <div class="from_to_date">
                            <label>Select From Date</label><br>
                            <input type="date" name="from_date" id="from_date"><br>
                        </div>
                        <div class="from_to_date">
                            <label>Select to Date</label><br>
                            <input type="date" name="to_date" id="to_date"><br>
                        </div>
                        <button type="submit" name="search_date" id="search_date">Search</button>
                    </form>
                </div>
                <div class="new_data">
                    <h3>Successful Deliveries for today</h3>
                    <hr>
                
                    <div class="search">
                        <input type="search" id="searchDeliveries" placeholder="Enter keyword">
                    </div>
                    <table id="deliveriesTable">
                    
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Customer</td>
                                <td>item</td>
                                <td>Qty</td>
                                <td>Amount</td>
                                <td>Address</td>
                                <td>Date</td>
                            </tr>
                        </thead>

                        <?php
                            $n = 1;
                            $todays_date = date("Y-m-d");
                            $select_deliveries = $connectdb->prepare("SELECT users.first_name, users.last_name, users.email, users.address, users.city, orders.order_id, orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.restaurant, orders.order_date, orders.delivery_date FROM users, orders WHERE orders.restaurant = :restaurant AND users.email = orders.customer_email AND orders.order_status = 1 AND orders.delivery_date = CURDATE() ORDER BY orders.order_date");
                            $select_deliveries->bindvalue('restaurant', $my_restaurant);
                            $select_deliveries->execute();
                    
                            $rows = $select_deliveries->fetchAll();
                            foreach($rows as $row):
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $n?></td>
                                <td><?php echo $row->first_name . " " . $row->last_name?></td>
                                <td><?php echo $row->item_name?></td>
                                <td><?php echo $row->quantity?></td>
                                <td>₦ <?php echo $row->item_price?></td>
                                <td><?php echo $row->address . "<br>" . $row->city;?></td>
                                <td><?php echo $row->delivery_date?></td>
                                
                            </tr>
                            
                        </tbody>
                        <?php $n++; endforeach;?>
                        
                    </table>
                    
                    
                    <?php 
                        $check_order = $select_deliveries->rowCount();
                        if(!$check_order){
                        echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.3rem; text-align:center; margin-top:10px;'>No record found!</p>";
                    }
                    if($select_deliveries){
                            $totalAmount = $connectdb->prepare("SELECT SUM(item_price) AS total_price FROM orders WHERE restaurant = :restaurant AND order_status = 1 AND delivery_date = CURDATE()");
                            $totalAmount->bindvalue('restaurant', $my_restaurant);
                            $totalAmount->execute();

                            $amounts = $totalAmount->fetchAll();
                            foreach($amounts as $amount){
                                echo "<p style='color:green; font-size:1.3rem; text-align:right; text-decoration:underline; font-weight:bold; margin-top:30px;'>Total = ₦". $amount->total_price . "</p>";
                            }
                        }
                    
                    ?>
                </div>
            </div>
            <!-- cancelled deliveries list -->
             <div id="cancelledDeliveries" class="management">
                <div class="select_date">
                    <form action="search_cancelled_date.php" method="POST">
                        <div class="from_to_date">
                            <label>Select From Date</label><br>
                            <input type="date" name="from_cancel" id="from_cancel"><br>
                        </div>
                        <div class="from_to_date">
                            <label>Select to Date</label><br>
                            <input type="date" name="to_cancel" id="to_cancel"><br>
                        </div>
                        <button type="submit" name="search_cancel" id="search_cancel">Search</button>
                    </form>
                </div>
                <div class="cancelled_data">
                    <h3>Cancelled Deliveries</h3>
                    <hr>
                    <div class="search">
                        <input type="search" id="searchCancelled" placeholder="Enter keyword">
                    </div>
                    <table id="cancelledTable">
                    
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Customer</td>
                                <td>item</td>
                                <td>Qty</td>
                                <!-- <td>Amount</td> -->
                                <td>Amount</td>
                                <td>Date</td>
                            </tr>
                        </thead>

                        <?php
                            $n = 1;
                            
                            $select_cancel = $connectdb->prepare("SELECT users.first_name, users.last_name, users.email, users.address, users.city, orders.order_id, orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.restaurant, orders.order_date, orders.delivery_date FROM users, orders WHERE orders.restaurant = :restaurant AND users.email = orders.customer_email AND orders.order_status = -1 AND orders.delivery_date = CURDATE() ORDER BY orders.order_date");
                            $select_cancel->bindvalue('restaurant', $my_restaurant);
                            $select_cancel->execute();
                    
                            $rows = $select_cancel->fetchAll();
                            foreach($rows as $row):
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $n?></td>
                                <td><?php echo $row->first_name . " " . $row->last_name?></td>
                                <td><?php echo $row->item_name?></td>
                                <td><?php echo $row->quantity?></td>
                                
                                <td><?php echo "₦ ".$row->item_price?></td>
                                <td><?php echo $row->delivery_date?></td>
                                
                            </tr>
                            
                        </tbody>
                        <?php $n++; endforeach;?>
                        
                    </table>
                    <?php
                        $check_order = $select_cancel->rowCount();
                        if(!$check_order){
                        echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.3rem; text-align:center; margin-top:10px;'>No record found!</p>";
                    }
                        
                        if($select_cancel){
                            $totalAmount = $connectdb->prepare("SELECT SUM(item_price) AS total_price FROM orders WHERE restaurant = :restaurant AND order_status = -1 AND delivery_date = CURDATE()");
                            $totalAmount->bindValue('restaurant', $my_restaurant);
                            $totalAmount->execute();

                            $amounts = $totalAmount->fetchAll();
                            foreach($amounts as $amount){
                                echo "<p style='color:green; font-size:1.3rem; text-align:right; text-decoration:underline; font-weight:bold; margin-top:30px;'>Total = ₦". $amount->total_price . "</p>";
                            }
                        }
                    
                    ?>
                    
                </div>
            </div>
        </section>
    </main>
    

    <script src="jquery.js"></script>
    <script src="script.js"></script>

</body>
</html>

<?php
    }else{
        header("Location: index.php");
    }
?> 