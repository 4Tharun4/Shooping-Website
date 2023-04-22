<?php
if(isset($_GET['delete']))
{
    $delete=$_GET['delete'];
   // echo $delete;
   //delete query
   $deletequery="Delete from `products` where p_id='$delete'";
   $rest=mysqli_query($con,$deletequery);
   if($rest){
    echo "<script>alert('deleted sucessfully')</script>";
    echo "<script>window.open('./index.php','_self')</script>";
   }
}
?>