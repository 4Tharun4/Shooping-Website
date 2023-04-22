<?php
if(isset($_GET['edit_account'])){
    $username=$_SESSION['username'];
    $select="select * from `user_table` where user_name='$username'";
    $query=mysqli_query($con,$select);
    $rowquery=mysqli_fetch_assoc($query);
    $user_id=$rowquery['user_id'];
    $user_name=$rowquery['user_name'];
    $user_email=$rowquery['user_email'];
    $user_address=$rowquery['user_address'];
    $user_mobile=$rowquery['user_mobile'];
}

    

    if(isset($_POST['update']))
    {
        $userr=$user_id;
        $user_name=$_POST['editusername'];
        $user_email=$_POST['edituseremail'];
        $user_address=$_POST['edituseraddress'];
        $user_mobile=$_POST['editusermo'];
        $userimg=$_FILES['edituserimage']['name'];
        $userimg_tmp=$_FILES['edituserimage']['tmp_name'];
        move_uploaded_file($userimg_tmp,"./userimages/$userimg");
    
    //update query
    $updatedata="update `user_table` set user_name='$user_name', user_email='$user_email',user_image='$userimg', user_address='$user_address',user_mobile='$user_mobile' where user_id='$userr'";
    $resultquery=mysqli_query($con,$updatedata);
    if($resultquery)
    {
        echo "<script>alert('Data updatad sucessfully')</script>";
    }

    }


?>













<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">EDIT ACCOUNT</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $username?>" name="editusername">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email?>" name="edituseremail">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control " name="edituserimage">
            <img src="./userimages/<?php echo $user_img?>" alt="" class="">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address?>"  name="edituseraddress">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile?>" name="editusermo">
        </div>
        <input type="submit" name="update"  value="update"class="bg-success py-2 px-3 border-0" name="userupdate">
    </form>
</body>
</html>