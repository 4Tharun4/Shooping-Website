<?php
include('includes/dbconn.php');
include('functions/commonfunc.php');
session_start();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!---boostrap cdn --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!---Font Awasome --->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!--- js script --->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!--- css link -->
      <link rel="stylesheet" href="index.css">
      <style>
      .img_cart{
        width: 80px;
        height: 80px;
        object-fit:contain;
      }
      </style>

</head>
<body>
     <!--Navbar-->
     <div class="containet">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="logo.webp" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="displayall.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Registration</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup><?php cartitems();?></sup></a>
        </li>
        <!--
        <li class="nav-item">
          <a class="nav-link" href="#">Total=<?php  total_cart_price(); ?>/-</a>
        </li>-->
        
      </ul>
      <form class="d-flex" action="search_data.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data" autocomplete="off">
        <!--<button class="btn btn-outline-success" type="submit">Search</button>-->
        <input type="submit" name="search" value="search" class="btn btn-outline-success">
      </form>
    </div>
  </div>
</nav>
<!--Second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
    <li class="nav item">
    
        <?php
    
    
    if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
      <a class='nav-link' href='#'>Welcome Guest</a>
    </li>";
    }else{
      echo "<li class='nav-item'>
      <a class='nav-link' href='#'>Welcome  ".$_SESSION['username']."</a>
    </li>";
    }
    if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
      <a class='nav-link' href='./usersarea/user_login.php'>LOGIN</a>
    </li>";
    }else{
      echo "<li class='nav-item'>
      <a class='nav-link' href='./usersarea/logout.php'>Logout</a>
      </li>";
    }
    
    ?>

    </li>
  </ul>
</nav>
<!---calling cart function-->
<?php

cart();
?>
<!--third child-->
<div class="bg-light">
    <h3 class="text-center">My Store</h3>
    <p class="text-center">HII THIS IS THARUN</p>
</div>
<!---display table-->
 <div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                   <th>NAME</th>
                   <th>IMAGE</th>
                   
                   
                   <th>TOTAL PRICE</th>
                   <th >OPERATIONS</th>
                </tr>
            </thead>
            <tbody>
                <!--display dynamic data in carts-->
                <?php
                 global $con;
                 $ip = getIPAddress(); 
                 $total=0;
                 $cart_query="select * from `cart_details` where ip_address= '$ip'";
                 $result=mysqli_query($con,$cart_query);  
                 $result_count=mysqli_num_rows($result);
                 if($result_count>0){
                 // echo "<thead>
                //  <tr>
                    // <th>NAME</th>
                     //<th>IMAGE</th>
                     //<th>QUENTITY</th>
                     //<th>REMOVE</th>
                     //<th>TOTAL PRICE</th>
                     //<th colspan='2'>OPERATIONS</th>
                  //</tr>
              //</thead>";

                 
                 while($row=mysqli_fetch_array($result)){
                     $prod_id=$row['p_id'];
                     $price="select * from `products` where p_id='$prod_id'";
                     $price_query=mysqli_query($con, $price);  
                     while($rows=mysqli_fetch_array($price_query)){
                         $p_prices=array($rows['p_price']);
                         $table_price=$rows['p_price'];
                         $table_title=$rows['p_title'];
                         $table_img1=$rows['p_img1'];
                         $p_values=array_sum($p_prices);
                         $total+=$p_values;
             
                
                ?>
                <tr>
                    <td><?php echo $table_title?></td>
                    <td><img src="./adminpage/prodimg/<?php echo $table_img1?>" class="img_cart" ></td>
                  <!-- <td><input type="text" name="qty" class="form-input w-50"></td>-->
                    
                   <?php
                   global $con;
                    $get_ip = getIPAddress();
                    if(isset($_POST['update']))
                    {
                     $quantity=$_POST['qty'];
                     $prod_id1=$row['p_id'];
                     $cart_query="update  `cart_details` set quant=$quantity where p_id=' $prod_id1'";
                     
                     
                      $price_query_quantity=mysqli_query($con,$cart_query);  
                      $total=$total*$quantity;
                    }
                  
                   
                   ?>
                 <!--  <td><input type="checkbox" name="" value=""></td>-->
                    <td><?php echo  $table_price?></td>
                    <td>
                       <!--<button class="bg-info px-3 py-2 border-0 mx-3">UPDATE</button>-->
                     
                       <?php
if(isset($_GET['delete']))
{
    $delete=$_GET['delete'];
  //  $product_id=$_GET['p_id'];
   // echo $delete;
   //delete query
  // $deletequery="Delete from `cart_details` where p_id='$product_id'";
   //$rest=mysqli_query($con,$deletequery);
  // if($rest){
   // echo "<script>alert('deleted sucessfully')</script>";
   // echo "<script>window.open('cart_prod.php','_self')</script>";
   //}
}
?>
                        <td><a href='cart_prod.php?delete=<?php echo $product_id?> ' class='text-light bg-info'><i class='fa-solid fa-trash'></a></td>
                    </td>
                </tr>
                <?php
                     }
                    }
                  }
                  else{
                  echo  "<h2 class='text-center text-danger'>CART IS EMPTY</h2>";
                  }
                ?>
            </tbody>
        </table>
        <!--totalcartprice-->
        <div class="d-flex mb-5" >
            <h4 class="px-3">SUBTOTAL:<strong class="text-info"><?php echo $total?>/-</strong></h4>
            <a href="index.php" ><button class="bg-info px-3 py-2 border-0 mx-3">CONTINUE SHOOPING</button></a>
            <button class="bg-secondary px-3 py-2 border-0 text-light"><a href="./usersarea/checkout.php" class="text-light bg-secondary px-3 py-2 border-0 text-decoration-none" >CHECKOUT</button></a>
        </div>
    </div>
 </div>
 </form>

<?php 
include('includes/footer.php');?>

</body>
</html>