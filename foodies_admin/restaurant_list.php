        <?php 
    
        ?>
        <h3>Foodies Restaurants</h3>
                <hr>
                <div class="search">
                    <input type="search" id="searchRestaurant" placeholder="Enter keyword">
                </div>
                <table id="restaurantTable">
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Restaurant Name</td>
                            <td>Location</td>
                            <td>Address</td>
                        </tr>
                    </thead>

                    <?php
                        $n = 1;
                        $select_restaurant = $connectdb->prepare("SELECT * FROM restaurants ORDER BY restaurant_name");

                        $select_restaurant->execute();
                        
                        $rows = $select_restaurant->fetchAll();
                        foreach($rows as $row):
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $n?></td>
                            <td><?php echo $row->restaurant_name?></td>
                            <td><?php echo $row->restaurant_location?></td>
                            <td><?php echo $row->restaurant_address?></td>
                        </tr>
                    </tbody>

                    <?php $n++; endforeach;?>
                </table>