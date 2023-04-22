
<?php
include('../includes/dbconn.php');
include('../functions/commonfunc.php');
@session_start();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userlogin</title>
     <!---boostrap cdn --->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!---Font Awasome --->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!--- js script --->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <style>
        body{
      overflow-x:hidden;
        }
      </style>

    </head>
<body>
<div class="container-fluid my-3">
        <h2 class="text-center">ADMINLOGIN</h2>
        <div class="row d-flex text-align-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!--username section-->
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">USERNAME</label>
                    <input type="text" name="username" class="form-control" placeholder="enter username" autocomplete="off">
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">PASSWORD</label>
                    <input type="password" name="password" class="form-control" placeholder="password" autocomplete="off">
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="LOGIN" class="bg-info py-2 px-3 border-0 " name="user_login">
                   
                </div>
          </form>
</div>
</div>
</div>
<?php
if(isset($_POST['username']))
{
    $username=$_POST['username'];
    $userpass=$_POST['password'];
    $sqlquery="select * from  `user_table` where user_name='$username'";
    $resultquery=mysqli_query($con,$sqlquery);
    $rowcount=mysqli_num_rows($resultquery);
    $rowdata=mysqli_fetch_assoc($resultquery);
    $userip=getIPAddress();

    //cart items
    $databasecart="select * from `cart_details` where ip_address= '$userip'";
    $thar=mysqli_query($con,$databasecart);
    $rowcount_cart=mysqli_num_rows($thar);
    if($rowcount>0){
        $_SESSION['username']=$username;
            if(password_verify($userpass,$rowdata['user_password'])){
               // echo  "<script>alert('login sucessfully')</script>";
               if($rowcount==1 and $rowcount_cart==0){
                $_SESSION['username']=$username;
                
               
                
                echo  "<script>alert('login sucessfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";
               }
        }else{
            echo  "<script>alert('invalid creditionls')</script>";

        }
        
    }
   
   
    else{
       echo  "<script>alert('invalid creditionls')</script>";
    }
    
}


?>
</body>
</html>