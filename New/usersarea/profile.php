<?php
include('../includes/dbconn.php');
include('../functions/commonfunc.php');
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
      body{
        overflow-x:hidden;
      }
      .profileimg{
        width: 90%;
        margin:auto;
        display:block;
       /* height: 100%;*/
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
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../displayall.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Registration</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart_prod.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cartitems();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total=<?php  total_cart_price(); ?>/-</a>
        </li>
        
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
      <a class='nav-link' href='user_login.php'>LOGIN</a>
    </li>";
    }else{
      echo "<li class='nav-item'>
      <a class='nav-link' href='logout.php'>Logout</a>
      </li>";
    }
    
    ?>
    </li>
  </ul>
</nav>
<div class="bg-light">
    <h3 class="text-center">My Store</h3>
    <p class="text-center">HII THIS IS THARUN</p>
</div>
  <div class="row">
    <div class="col-md-2 p-0">
      <ul class="navbar-nav text-center bg-secondary" >
      <li class="nav-item bg-info">
          <a class="nav-link text-light " href="#"><h4>Your Profile</h4></a>
        </li>
        <?php
        $user=$_SESSION['username'];
        $user_img="select* from `user_table` where user_name='$user'";
        $user_img=mysqli_query($con, $user_img);
        $row_img=mysqli_fetch_array($user_img);
        $user_img=$row_img['user_image'];
        echo " <li class='nav-item bg-secondary text-center'>
        <img src='./userimages/$user_img' class='profileimg' my-4 alt=''>
       </li>";
        
        ?>
        <li class="nav-item bg-secondary text-center">
          <a class="nav-link text-light " href="profile.php">Pending Orders</a>
        </li>
        <li class="nav-item bg-secondary text-center">
          <a class="nav-link text-light " href="profile.php?edit_account">Edit Account</a>
        </li>
        <li class="nav-item bg-secondary text-center">
          <a class="nav-link text-light " href="profile.php?user_ordersS">My Orders</a>
        </li>
        <li class="nav-item text-center bg-secondary ">
          <a class="nav-link text-light " href="profile.php?Delete_Account">Delete Account</a>
        </li>
        <li class="nav-item text-center bg-secondary ">
          <a class="nav-link text-light " href="logout.php">Logout</a>
        </li>

      </ul>
      
      </div>
    <div class="col-md-10 text-center">
      <?php
      pendingoredrs();
      
      //if(isset($_GET['edit_account']))
      //{
      //  include('edit_user_account.php');
    //  }
    ?>
    <div class="col-md-10 text-center">
    <?php
    if(isset($_GET['user_ordersS']))
    {
      include('user_orders.php');
    }
      ?>
      </div>
      
      
      
     
      
   

    </div>
  </div>


<?php 
include('../includes/footer.php');?>


</body>
</html>