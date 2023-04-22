<?php
 include('../includes/dbconn.php');
if(isset($_POST['addproduct']))
{
    $p_title=$_POST['p_title'];
    $p_desc=$_POST['p_description'];
    $p_keyword=$_POST['p_keyword'];
    $b_id=$_POST['b_id'];
    $p_catid=$_POST['p_Category'];
    $p_price=$_POST['p_price'];
    $p_status ='true';
   //accessing images
   $p_image1=$_FILES['p_image1']['name'];
   $p_image2=$_FILES['p_image2']['name'];
   $p_image3=$_FILES['p_image3']['name'];
//accessing images tmpname
   $tmp_image1=$_FILES['p_image1']['tmp_name'];
   $tmp_image2=$_FILES['p_image2']['tmp_name'];
   $tmp_image3=$_FILES['p_image3']['tmp_name'];

   if($p_title=='' or $p_desc=='' or $p_keyword=='' or $b_id=='' or  $p_catid=='' or $p_price=='' or $p_image1=='' or $p_image2=='' or $p_image3=='')
   {
    echo "<script>alert('please fill all the fields')</script>";
    //echo "<script> alert('window.location.index.php')</script>";
    exit();
   }
   else{
    move_uploaded_file($tmp_image1,"./prodimg/$p_image1");
    move_uploaded_file($tmp_image2,"./prodimg/$p_image2");
    move_uploaded_file($tmp_image3,"./prodimg/$p_image3");
   }
   //insert
   $insert = "insert into `products` (p_title,p_desc,p_keyword,brand_id	,Cat_id,p_img1,p_img2,p_img3,p_price,date,status)
    values ('$p_title','$p_desc','$p_keyword','$b_id','$p_catid','$p_image1','$p_image2','$p_image3','$p_price',NOW(),$p_status)";
    $thar=mysqli_query($con,$insert);
    if($thar)
    {
        echo "<script>alert('sucessfully added')</script>";
    }
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
     <!---boostrap cdn --->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!---Font Awasome --->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!--- js script --->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!--- css link-->
      <link rel="stylesheet" href="../index.css">
      
</head>
<body class="bg-light font-20px">
    <div class="container mt-3">
        <h1 class="text-center">INSERT PRODUCTS<h1>              
    </div>
                 <!-- form -->
                <form action="" method="post" enctype="multipart/form-data">
                     <!-- title-->
                     <div class="form-outline mb-4 w-50 m-auto">
                    <label for="p_title" class="form-label">title</label>
                    <input type="text" name="p_title" id="p_title" class="form-control" placeholder="please enter title" autocomplete="off" require="requried">

                </div>
                <!-- description-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="p_description" class="form-label">description</label>
                    <input type="text" name="p_description" id="p_description" class="form-control" placeholder="please enter description" autocomplete="off" require="requried">

                </div>
                <!-- keyword-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="p_keyword" class="form-label">product keyword</label>
                    <input type="text" name="p_keyword" id="p_keyword" class="form-control" placeholder="please enter keyword" autocomplete="off" require="requried">
                </div>
                <!--brands-->
                <div class="form-outline mb-4 w-50 m-auto">
                   <select name="b_id" id=""
                    class="form-select">
                    <option value="">SELECT BRAND</option>   
                    <?php
                    $select_query="select * from `brands`";
                    $result=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $b_title = $row['brand_title'];
                        $b_id = $row['brand_id'];
                        echo  "<option value='$b_id'> $b_title</option>";
                    }
                    ?>
                   </select>
                </div>
                <!-- Category-->
                <div class="form-outline mb-4 w-50 m-auto">
                   <select name="p_Category" id=""
                    class="form-select">
                    <option value="">SELECT CATERORY</option>   
                    <?php
                    $select_query="select * from `categories`";
                    $result=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $title = $row['Cat_title'];
                        $catid = $row['Cat_id'];
                        echo  "<option value='$catid'>$title</option>";
                    }
                    ?>
                   </select>
                </div>
                <!--image1-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="p_image1" class="form-label">product Image1</label>
                    <input type="file" name="p_image1" id="p_image1" class="form-control" placeholder="please upload image 1" autocomplete="off" require="requried">
                </div>
                 <!--image2-->
                 <div class="form-outline mb-4 w-50 m-auto">
                    <label for="p_image2" class="form-label">product Image2</label>
                    <input type="file" name="p_image2" id="p_image2" class="form-control" placeholder="please upload image 2" autocomplete="off" require="requried">
                </div>
                <!--image3-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="p_image3" class="form-label">product Image2</label>
                    <input type="file" name="p_image3" id="p_image3" class="form-control" placeholder="please upload image 3" autocomplete="off" require="requried">
                </div>
                <!-- price-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="p_price" class="form-label">product price</label>
                    <input type="text" name="p_price" id="p_price" class="form-control" placeholder="please enter price" autocomplete="off" require="requried">
                </div>
                        <!-- insert-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="addproduct" class="btn btn-info mb-3 px-3" value="INSERT">
                </div>
                    
                



            </form>

    </div>
    
</body>
</html>