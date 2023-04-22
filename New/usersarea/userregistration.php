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
    <title>User Registration</title>
     <!---boostrap cdn --->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!---Font Awasome --->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!--- js script --->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!--- css link -->
      <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">USER REGISTRATION</h2>
        <div class="row d-flex text-align-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!--username section-->
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">USERNAME</label>
                    <input type="text" id="username" class="form-control" name="username" placeholder="enter username" autocomplete="off">
                </div>
                <!--email section-->
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">EMAIL</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="enter email" autocomplete="off">
                </div>
                 <!--image section-->
                 <div class="form-outline mb-4">
                    <label for="image" class="form-label">PROFILE PHOTO</label>
                    <input type="file" name="image" class="form-control" >
                </div>
                <!--password section-->
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">PASSWORD</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="password" autocomplete="off">
                </div>
                <!--conform password -->
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">CONFORMPASSWORD</label>
                    <input type="password" id="con_password" name="con_password" class="form-control" placeholder="conformpassword" autocomplete="off">
                </div>
                 <!--address -->
                 <div class="form-outline mb-4">
                    <label for="address" class="form-label">ADDRESS</label>
                    <input type="text" name="address" class="form-control" placeholder="Address" autocomplete="off" requried="requried">
                </div>
                 <!--contact no -->
                 <div class="form-outline mb-4">
                    <label for="mobilno" class="form-label">CONTACT NO</label>
                    <input type="text" name="mobilno" class="form-control" placeholder="mobil no" autocomplete="off" requried="requried">
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="REGISTER" class="bg-info py-2 px-3 border-0 " name="user_register">
                    <p class="small fw-bold mt-2 pt-1 mb-0">already have a account? <a href="user_login.php" class="text-danger">login</a></p>
                </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>
<!--php code-->
<?php
if(isset($_POST['user_register']))
{
    $user_name=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $hash=password_hash($pass,PASSWORD_DEFAULT);
    $con_pass=$_POST['con_password'];
    $addres=$_POST['address'];
    $mobil=$_POST['mobilno'];
    $image=$_FILES['image']['name'];
    $imagetmp=$_FILES['image']['tmp_name'];
    $user_ip=getIPAddress(); 

//select query
$select="select * from  `user_table` where user_name='$user_name'";
$result=mysqli_query($con,$select);
$rows=mysqli_num_rows($result);
if($rows>0){
    echo "<script>alert('username already present')</script>";

}

elseif($con_pass!=$pass){
    echo "<script>alert('passwords do not match')</script>";
}

else{


//insertquery
move_uploaded_file($imagetmp,"./userimages/$image");
$insertquery="insert into `user_table` (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile)	
values('$user_name','$email','$hash','$image','$user_ip','$addres','$mobil')";
$sqlquery=mysqli_query($con,$insertquery);

//cart items
$select1="select * from  `user_table` where user_ip='$user_ip'";
$result1=mysqli_query($con,$select1);
$rowss=mysqli_num_rows($result1);
if($rowss>0){
    $_SESSION['username']=$user_name;
    echo "<script>alert('you have items in your cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";

}else{
    echo "<script>window.open('../index.php','_self')</script>";
}
}
}
?>