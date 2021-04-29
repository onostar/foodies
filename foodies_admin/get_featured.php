<?php
    include "server.php";
 

    if(isset($_POST['featuredRestaurant']) && !empty($_POST['featuredRestaurant'])){
        $restaurant = $_POST['featuredRestaurant'];
        $select_item = $connectdb->prepare("SELECT item_name FROM menu WHERE restaurant_name = ? ORDER BY item_name");
        // $select_item->bindvalue('restaurant_name', $restaurant);
        $select_item->execute([$restaurant]);
        while($row = $select_item->fetch()):
       

?>
        <option value="<?php echo $row->item_name?>"><?php echo $row->item_name?></option>

        <?php endwhile;?>
        <?php     
            }else{
                echo "<option>Select item</option>";
            }
        ?>