<?php
    include "server.php";
    session_start();

    /* function validate($field){
        if(!isset($_POST[$field])){
            return false;
        }else{
            return htmlspecialchars(stripcslashes($_POST[$field]));
        }
    } */
    
    $_SESSION['success'] = "";
    $_SESSION['error'] = "";
    /* if(isset($_POST['add_feat'])){ */
        $restaurant = ucwords(htmlspecialchars(stripslashes($_POST['featuredRestaurant'])));
        $featured = ucwords(htmlspecialchars(stripslashes($_POST['featuredItem'])));

        /* check user availability */
        $check_user = $connectdb->prepare("SELECT * FROM menu WHERE restaurant_name = :restaurant_name AND item_name = :item_name AND featured_item = 1");
        
        $check_user->bindvalue('restaurant_name', $restaurant);
        $check_user->bindvalue('item_name', $featured);
        $check_user->execute();

        if($check_user->rowCount() > 0){
            echo "<p class='exist' style='text-decoration:underline; color:red; font-size:1.2rem; font-weight:bold; text-align:center;'><span>".$featured."</span> From " . $restaurant . " is already a featured item!</p>";
            /* $_SESSION['success'] = "$featured from $restaurant is already a featrued item!";
            header("Location: admin.php"); */

        }else{
            $add_featured = $connectdb->prepare("UPDATE menu SET featured_item = 1 WHERE  restaurant_name = :restaurant_name AND item_name = :item_name");
            $add_featured->bindvalue('restaurant_name', $restaurant);
            $add_featured->bindvalue('item_name', $featured);
            $add_featured->execute();

            if($add_featured):
                /* echo "<p><span>".$featured."</span> from " . $restaurant . " added to featured items!</p>"; */
?>            
            <table id="featuredTable">
                <thead>
                    <tr>
                        <td>S/N</td>
                        <td>Restaurant</td>
                        <td>Item name</td>
                        <td>Item price</td>
                        <td>Action</td>
                    </tr>
                </thead>

                    <?php
                        $n = 1;
                        $select_user = $connectdb->prepare("SELECT * FROM menu WHERE featured_item = 1 ORDER BY restaurant_name");

                        $select_user->execute();
                        
                        $rows = $select_user->fetchAll();
                        foreach($rows as $row):
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $n?></td>
                            <td><?php echo $row->restaurant_name?></td>
                            <td><?php echo $row->item_name?></td>
                            <td><?php echo $row->item_prize?></td>
                            <td><button style="background:transparent; border:none; width:80%; margin:0 auto;" title="remove from featured" onclick="removeFeatured('<?php echo $row->item_id?>')"><i class="fas fa-trash" style="color:red; font-size:1.3rem; text-align:center;"></i></button></td>
                        </tr>
                        
                    </tbody>
                    
                    <?php $n++; endforeach; endif; ?>
                 </table>
                 <?php }?>                                                                             
  