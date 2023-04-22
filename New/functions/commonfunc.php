<?php

//include('./includes/dbconn.php');



// getproducts
function getproducts(){
    global $con;
    //getting a condition ifsset or not
    if(!isset($_GET['categories'])){
        if(!isset($_GET['brand'])){
    $query="select * from `products` order by rand() "; //echo limit is for items shown to user
    $result=mysqli_query($con,$query);                //echo rand() to display data randmely to user 
    $row=mysqli_fetch_assoc($result);
    while($row=mysqli_fetch_assoc($result))
    {
        $disp_id=$row['p_id'];
        $disp_title=$row['p_title'];
        $disp_desc=$row['p_desc'];
        $disp_cid=$row['Cat_id'];
        $disp_img=$row['p_img1'];
        $disp_price=$row['p_price'];
        $b_id=$row['brand_id'];
        echo " <div class='col-md-4 mb-2'>
        <div class='card' >
<img src='./adminpage/prodimg/$disp_img' class='card-img-top' alt='...'>
<div class='card-body' text-center>
<h5 class='card-title'> $disp_title</h5>
<p class='card-text'>$disp_desc</p>
<a href='index.php?add_to_cart=$disp_id' class=' btn btn-info'>ADD TO CART</a>
<a href='viewmore.php?p_id= $disp_id' class=' btn btn-secondary'>VIEW MORE</a>
</div>
</div>
</div>";
}
}
}
}

//getting all products

function getallproducts(){
    global $con;
    //getting a condition ifsset or not
    if(!isset($_GET['categories'])){
        if(!isset($_GET['brand'])){
    $query="select * from `products` order by rand() "; //echo limit is for items shown to user
    $result=mysqli_query($con,$query);                //echo rand() to display data randmely to user 
    $row=mysqli_fetch_assoc($result);
    while($row=mysqli_fetch_assoc($result))
    {
        $disp_id=$row['p_id'];
        $disp_title=$row['p_title'];
        $disp_desc=$row['p_desc'];
        $disp_cid=$row['Cat_id'];
        $disp_img=$row['p_img1'];
        $disp_price=$row['p_price'];
        $b_id=$row['brand_id'];
        echo " <div class='col-md-4 mb-2'>
        <div class='card' >
<img src='./adminpage/prodimg/$disp_img' class='card-img-top' alt='...'>
<div class='card-body' text-center>
<h5 class='card-title'> $disp_title</h5>
<p class='card-text'>$disp_desc</p>
<a href='index.php?add_to_cart=$disp_id' class=' btn btn-info'>ADD TO CART</a>
<a href='viewmore.php?p_id= $disp_id' class=' btn btn-secondary'>VIEW MORE</a>
</div>
</div>
</div>";
}
}
}
}


//getting uniqe category
function get_category(){
    global $con;
    if(isset($_GET['categories'])){
        $category_id=$_GET['categories'];
        
    $query="select * from `products` where Cat_id= $category_id"; //echo limit is for items shown to user
    $result=mysqli_query($con,$query);                //echo rand() to display data randmely to user 
   // $row=mysqli_fetch_assoc($result);
    $num_rows=mysqli_num_rows($result);
    if($num_rows==0)
    {
        echo "<h2 class='text-center text-danger'>SORRY STOCK IS NOT AVAILABLE</h3>";
    }
    while($row=mysqli_fetch_assoc($result))
    {
        $disp_id=$row['p_id'];
        $disp_title=$row['p_title'];
        $disp_desc=$row['p_desc'];
        $disp_cid=$row['Cat_id'];
        $disp_img=$row['p_img1'];
        $disp_price=$row['p_price'];
        $b_id=$row['brand_id'];
        echo " <div class='col-md-4 mb-2'>
        <div class='card' >
<img src='./adminpage/prodimg/$disp_img' class='card-img-top' alt='...'>
<div class='card-body' text-center>
<h5 class='card-title'> $disp_title</h5>
<p class='card-text'>$disp_desc</p>
<a href='index.php?add_to_cart=$disp_id' class=' btn btn-info'>ADD TO CART</a>
<a href='viewmore.php?p_id= $disp_id' class=' btn btn-secondary'>VIEW MORE</a>
</div>
</div>
</div>";
}
}
}

//getting uniqe brands
function get_brands(){
    global $con;
    if(isset($_GET['brand'])){
        $brand_id=$_GET['brand'];
        
    $query="select * from `products` where brand_id=  $brand_id"; //echo limit is for items shown to user
    $result=mysqli_query($con,$query);                //echo rand() to display data randmely to user 
   // $row=mysqli_fetch_assoc($result);
    $num_rows=mysqli_num_rows($result);
    if($num_rows==0)
    {
        echo "<h2 class='text-center text-danger'>SORRY THIS BRAND IS NOT  AVAILABLE </h3>";
    }
    while($row=mysqli_fetch_assoc($result))
    {
        $disp_id=$row['p_id'];
        $disp_title=$row['p_title'];
        $disp_desc=$row['p_desc'];
        $disp_cid=$row['Cat_id'];
        $disp_img=$row['p_img1'];
        $disp_price=$row['p_price'];
        $b_id=$row['brand_id'];
        echo " <div class='col-md-4 mb-2'>
        <div class='card' >
<img src='./adminpage/prodimg/$disp_img' class='card-img-top' alt='...'>
<div class='card-body' text-center>
<h5 class='card-title'> $disp_title</h5>
<p class='card-text'>$disp_desc</p>
<a href='index.php?add_to_cart=$disp_id' class=' btn btn-info'>ADD TO CART</a>
<a href='viewmore.php?p_id= $disp_id' class=' btn btn-secondary'>VIEW MORE</a>
</div>
</div>";
}
}
}


//display brands in navbar
function displaybrands(){
    global $con;
    $query="select * from `brands`";
$result=mysqli_query($con,$query);
while($row_data=mysqli_fetch_assoc($result))
{
    $b_title=$row_data['brand_title'];
    $b_id=$row_data['brand_id'];
     echo "<li class='nav-item'>
     <a href='index.php?brand=$b_id' class='nav-link text-light'>$b_title</a>
 </li>";

}
}
//display category in navbar
function displaycategory(){
    global $con;
    $query="select * from `categories`";
    $result=mysqli_query($con,$query);
    while($row_data=mysqli_fetch_assoc($result))
    {
        $c_title=$row_data['Cat_title'];
        $c_id=$row_data['Cat_id'];
         echo "<li class='nav-item'>
         <a href='index.php?categories=$c_id' class='nav-link text-light'>$c_title</a>
     </li>";

    }
}
//search data
function searchoption(){
    global $con;
     //getting a condition ifsset or not
     if(isset($_GET['search'])){
        $usersearch=$_GET['search_data'];
    $search="select * from `products` where p_title	like '%$usersearch%'"; 
    $result=mysqli_query($con,$search);               
    //$row=mysqli_fetch_assoc($result);
    $num_rows=mysqli_num_rows($result);
    if($num_rows==0)
    {
        echo "<h2 class='text-center text-danger'>SORRY THIS BRAND IS NOT  AVAILABLE </h3>";
    }
    while($row=mysqli_fetch_assoc($result))
    {
        $disp_id=$row['p_id'];
        $disp_title=$row['p_title'];
        $disp_desc=$row['p_desc'];
        $disp_cid=$row['Cat_id'];
        $disp_img=$row['p_img1'];
        $disp_price=$row['p_price'];
        $b_id=$row['brand_id'];
        echo " <div class='col-md-4 mb-2'>
        <div class='card' >
<img src='./adminpage/prodimg/$disp_img' class='card-img-top' alt='...'>
<div class='card-body' text-center>
<h5 class='card-title'> $disp_title</h5>
<p class='card-text'>$disp_desc</p>
<a href='index.php?add_to_cart=$disp_id' class=' btn btn-info'>ADD TO CART</a>
<a href='viewmore.php?p_id= $disp_id' class=' btn btn-secondary'>VIEW MORE</a>
</div>
</div>
</div>";
}

}
}
//view details
function viewmore(){
    global $con;
    if(isset($_GET['p_id'])){
    if(!isset($_GET['categories'])){
        if(!isset($_GET['brand'])){
            $view_id=$_GET['p_id'];
    $query="select * from `products` where p_id=  $view_id"; //echo limit is for items shown to user
    $result=mysqli_query($con,$query);                //echo rand() to display data randmely to user 
    //$row=mysqli_fetch_assoc($result);
    while($row=mysqli_fetch_assoc($result))
    {
        $disp_id=$row['p_id'];
        $disp_title=$row['p_title'];
        $disp_desc=$row['p_desc'];
        $disp_cid=$row['Cat_id'];
        $disp_img=$row['p_img1'];
        $disp_img2=$row['p_img2'];
        $disp_img3=$row['p_img3'];
        $disp_price=$row['p_price'];
        $b_id=$row['brand_id'];
        echo " <div class='col-md-4 mb-2'>
        <div class='card' >
<img src='./adminpage/prodimg/$disp_img' class='card-img-top' alt='...'>
<div class='card-body' text-center>
<h5 class='card-title'>  $disp_title</h5>
<h5 class='card-title'> <span>₹</span> $disp_price</h5>
<p class='card-text'>$disp_desc</p>
<a href='#' class=' btn btn-info'>ADD TO CART</a>
<a href='index.php' class=' btn btn-secondary'>GO HOME</a>
</div>
</div>
</div>
<div class='col-md-8'>
             <!--products-->
             <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center text-info mb-5'>Related Products</h4>
                    
                </div>
                <div class='col-md-6'>
                <img src='./adminpage/prodimg/$disp_img2' class='card-img-top' alt='...'>
                </div>
                <div class='col-md-6'>
                <img src='./adminpage/prodimg/$disp_img3' class='card-img-top' alt='...'>
                </div>
             </div>

        </div>
        </div>";
        


}
}
}
    }

}
//get ip

    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
   //$ip = getIPAddress();  
     //echo 'User Real IP Address - '.$ip;  
  //cart function
  function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress(); 
        $get_prod_id=$_GET['add_to_cart'];
        $select_quert="select * from `cart_details` where ip_address= '$ip' and p_id= $get_prod_id";
        $result=mysqli_query($con,$select_quert);   
        $num_rows=mysqli_num_rows($result);
    if($num_rows>0)
    {
        echo "<script>alert('allready added in cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        $insert="insert into `cart_details` (p_id,ip_address,quant) values ($get_prod_id,'$ip',0)";
        $result=mysqli_query($con, $insert);   
        echo "<script>alert(' added in cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }

    }

  }
  //cart items display
  function cartitems(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress(); 
       
        $select_quert="select * from `cart_details` where ip_address= '$ip' ";
        $result=mysqli_query($con,$select_quert);   
        $count_rows=mysqli_num_rows($result);
   
    }else{
        global $con;
        $ip = getIPAddress(); 
       
        $select_quert="select * from `cart_details` where ip_address= '$ip' ";
        $result=mysqli_query($con,$select_quert);   
        $count_rows=mysqli_num_rows($result);
    }
    echo  $count_rows;

    }

  //total function
  function total_cart_price(){
    global $con;
    $ip = getIPAddress(); 
    $total=0;
    $cart_query="select * from `cart_details` where ip_address= '$ip'";
    $result=mysqli_query($con,$cart_query);  
    while($row=mysqli_fetch_array($result)){
        $prod_id=$row['p_id'];
        $price="select * from `products` where p_id='$prod_id'";
        $price_query=mysqli_query($con, $price);  
        while($rows=mysqli_fetch_array($price_query)){
            $p_prices=array($rows['p_price']);
            $p_values=array_sum($p_prices);
            $total+=$p_values;

        }

        
    }
    echo $total;
  }

//getting orederpending
function pendingoredrs(){
    global $con;
    $user=$_SESSION['username'];
    $getorder="select * from `user_table` where user_name='$user'";
    $resultq=mysqli_query($con,$getorder);
    while ($rowa=mysqli_fetch_array($resultq)) 
    {
       $useid=$rowa['user_id'];
       if(!isset($_GET['edit_account'])){
        if(!isset($_GET['my_orders'])){
            if(!isset($_GET['Delete_Account'])){
                $get_order="select * from `orders_table` where user_id=$useid and order_status='pending'";
                $resultqe=mysqli_query($con,$get_order);
                $resultrow=mysqli_num_rows($resultqe);
                if($resultrow>0){
                    echo "<h3 class='text-center text-success mt-5 mb-2'>you have <span class='text-danger'>$resultrow</span>pending orders</h3>
                   <p  class='text-center'> <a href='profile.php?my_orders'>Order Details</a></p>";
                }else{
                    echo "<h3 class='text-center text-success mt-5 mb-2'>you have zero pending orders</h3>
                   <p  class='text-center'> <a href='../index.php'>Explore Products</a></p>";
                }


            }

            
        }
       }
    }

}


?>