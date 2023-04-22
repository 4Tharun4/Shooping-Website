<?php
include('../includes/dbconn.php');
if(isset($_POST['insert_cat']))
{
    $c_title=$_POST['cat_title'];
     // to avoid the duplicates
     $query1="select * from `categories` where  (Cat_title) ='$c_title'";
     $res1=mysqli_query($con,$query1);
     $num=mysqli_num_rows($res1);
     if($num>0)
     {
         echo '<script>alert("already present in database")</script>';
  
 
     }else{
         $query="insert into `categories`(Cat_title) values ('$c_title')";
     $res=mysqli_query($con,$query);
     if($res)
     {
         echo '<script>alert("added")</script>';
 
     }
 
     }
}

?>












<h2 class="text-center">INSERT CATGEORY</h2>
 <form action="" method="post" class="mb-3">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" placeholder="InsertCategories" name="cat_title" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  
  <input type="submit" class=" bg-info border-0 my-3 p-2 align-center "  name="insert_cat"  aria-describedby="basic-addon1" value="insert" class="bg-info">



</div>
</form>