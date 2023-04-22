<?php
include('../includes/dbconn.php');
include('../functions/commonfunc.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAYMENT PAGE</title>
</head>
<body>
    <!-- php  code -->
    <?php
    $get_ip=getIPAddress() ;
    $get_user="select * from  `user_table` where user_ip = '$get_ip'";
    $payment=mysqli_query($con,$get_user);
    $payments=mysqli_fetch_assoc($payment);
    $user_id=$payments['user_id'];


    
    ?>
    <div class="container">
        <h2 class="text-center text-info">PAYMENT OPTIONS</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id?>"><h2 class="text-center">PAYOFFLINE</h2></a>
            </div>
        </div>
    </div>
</body>
</html>