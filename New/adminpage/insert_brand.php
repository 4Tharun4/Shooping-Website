<?php
include('../includes/dbconn.php');
if(isset($_POST['insert_brand']))
{
    $b_title=$_POST['bra_title'];
     // to avoid the duplicates
     $query1="select * from `brands` where  (brand_title) ='$b_title'";
     $res1=mysqli_query($con,$query1);
     $num=mysqli_num_rows($res1);
     if($num>0)
     {
         echo '<script>alert("already present in database")</script>';
  
 
     }else{
         $query="insert into `brands`(brand_title) values ('$b_title')";
     $res=mysqli_query($con,$query);
     if($res)
     {
         echo '<script>alert("added")</script>';
 
     }
 
     }
}

?>












<h2 class="text-center">INSERT BRAND</h2>
 <form action="" method="post" class="mb-3">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" placeholder="Insertbrands" name="bra_title" aria-label="brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  
  <input type="submit" class=" bg-info border-0 my-3 p-2 align-center "  name="insert_brand"  aria-describedby="basic-addon1" value="insert brand" class="bg-info">



</div>
</form>