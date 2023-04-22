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
    <title>Adminashboard</title>
     <!---boostrap cdn --->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!---Font Awasome --->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!--- js script --->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!--- css link -->
      <link rel="stylesheet" href="../index.css">
      <style>
      .Adminlogo{
    width: 100px;
    object-fit: contain;
}
.footer{
    position: absolute;
    bottom:0;
}
      </style>
       

</head>
<body>
     <!--Navbar-->
<div class="containet">
    <!-- first child-->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
          <img src="../logo.webp" alt="" class="logo">
          <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link">Welcome Guest</a>
                </li>
            </ul>
          </nav>
        </div>
    </nav>
    <!-- Second child-->
     <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
     </div>
      <!-- Third child-->
      <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="p-3">
                <a href="#"><img src="../logo.webp" alt="" class="Adminlogo"></a>
               <p class="text-light text-center">AdminName</p>
            </div>
            <div class="button text-center">
                <button class="my-3"><a href="insert_prod.php" class="nav-link text-light bg-info my1">Inset Products</a></button>
                <button><a href="index.php?view_products" class="nav-link text-light bg-info my1">View Products</a></button>
                <button><a href="index.php?insert_cat" class="nav-link text-light bg-info my1">Insert Categories</a></button>
               
               <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my1">Insert brands</a></button>
                <!--<button><a href="" class="nav-link text-light bg-info my1">View Categories</a></button>
                <button><a href="" class="nav-link text-light bg-info my1">View brands</a></button>
                <button><a href="" class="nav-link text-light bg-info my1">All Orders</a></button>
                <button><a href="" class="nav-link text-light bg-info my1">All Payements</a></button>
                <button><a href="" class="nav-link text-light bg-info my1">List Users</a></button>-->
                <button><a href="../index.php" class="nav-link text-light bg-info my1">Logout</a></button>              
               

            </div>
        </div>
    </div>

    <!--fourth child-->
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_cat']))
        include('insert_cat.php');
        
        ?>
     </div>
     <div class="container my-3">
        <?php
        if(isset($_GET['insert_brand']))
        include('insert_brand.php');
        
        ?>
     </div>
     <div class="container my-3">
        <?php
        if(isset($_GET['view_products']))
        include('view_products.php');
        
        ?>
        
     </div>
     <div class="container my-3">
        <?php
        if(isset($_GET['delete']))
        include('delete.php');
        
        ?>
        
     </div>
     <?php 
//include('../includes/footer.php');?>
</div>

     
</body>
</html>