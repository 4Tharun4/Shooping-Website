<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pending orders</title>
</head>
<body>
<?php
            $username=$_SESSION['username'];
            $getuser="select * from `user_table` where user_name='$username'";
            $resu=mysqli_query($con,$getuser);
            $rowfet=mysqli_fetch_assoc($resu);
            $userid=$rowfet['user_id'];
            //echo $userid;
            
            ?>
    <h3 class="text-success">ALL MY ORDERS</h3>
    
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>sl no</th>
                <th>order id</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice No</th>
                <th> Date</th>
                
                <th>status</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
            
            $getuserorder="select * from `orders_table` where user_id='$userid'";
            $resuul=mysqli_query($con,$getuserorder);
            while($roword=mysqli_fetch_assoc($resuul)){
                $oid=$roword['order_id'];
                $odue=$roword['amount_due'];
                $onum=$roword['invoice_number'];
                $oprodd=$roword['total_products'];
                $odate=$roword['order_date'];
                $ostatus=$roword['order_status'];
                $number=1;
                echo "<tr>
                <td>$number</td>
                <td>$oid</td>
                <td>$odue</td>
                <td>$oprodd</td>
                <td>$onum</td>
                <td>$odate</td>
                <td>$ostatus</td>
                
            </tr>";
            $number++;
                


            }
           
            
            //echo $userid;
            
            ?>
            
</tbody>
</table>
</body>
</html>