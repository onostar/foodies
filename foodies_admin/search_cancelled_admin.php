<?php
    include "server.php";
    session_start();
    
    $from_date = $_POST['from_cancel'];
    $to_date = $_POST['to_cancel'];

    $select_date = $connectdb->prepare("SELECT users.first_name, users.last_name, users.email, users.address, users.city, orders.order_id, orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.restaurant, orders.order_date, orders.delivery_date FROM users, orders WHERE users.email = orders.customer_email AND orders.order_status = -1 AND orders.delivery_date BETWEEN '$from_date' AND '$to_date'");
    
    $select_date->execute();
    
    echo "<h3>Cancelled Deliveries from '" . $from_date . "' to '" . $to_date ."'</h3>;"
?>
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
                <td>Restaurant</td>
                <td>Date</td>
            </tr>
        </thead>

        <?php
            $n = 1;
            $rows = $select_date->fetchAll();
            foreach($rows as $row):
        ?>
        <tbody>
            <tr>
                <td><?php echo $n?></td>
                <td><?php echo $row->first_name . " " . $row->last_name?></td>
                <td><?php echo $row->item_name?></td>
                <td><?php echo $row->quantity?></td>
                
                    <td><?php echo $row->restaurant?></td>
                <td><?php echo $row->delivery_date?></td>
                
            </tr>
            
        </tbody>
        <?php $n++; endforeach;?>
        
    </table>
    <?php
        $check_order = $select_date->rowCount();
        if(!$check_order){
        echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.3rem; text-align:center; margin-top:10px;'>No record found!</p>";
    }
        
        if($select_date){
            $totalAmount = $connectdb->prepare("SELECT SUM(item_price) AS total_price FROM orders WHERE order_status = -1 AND delivery_date BETWEEN '$from_date' AND '$to_date'");
            
            $totalAmount->execute();

            $amounts = $totalAmount->fetchAll();
            foreach($amounts as $amount){
                echo "<p style='color:green; font-size:1.3rem; text-align:right; text-decoration:underline; font-weight:bold; margin-top:30px;'>Total = ₦". $amount->total_price . "</p>";
            }
        }
    
    ?>
            