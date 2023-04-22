<?php
include('../includes/dbconn.php');
include('../functions/commonfunc.php');

if(isset($_GET['user_id']))
{
$userid=$_GET['user_id'];
//echo "$userid";
}
//getting products
$getip=getIPAddress();
$total=0;
//cart query 
$cart="select * from `cart_details` where ip_address='$getip'";
$result_cartprice=mysqli_query($con,$cart);
$invoice=mt_rand();
$status="pending";
$count_products=mysqli_num_rows($result_cartprice);
while($row=mysqli_fetch_array($result_cartprice))
{
    $productid=$row['p_id'];
    $select_cart="select * from `products` where p_id =$productid";
$result_products=mysqli_query($con,$select_cart);
while($rowss=mysqli_fetch_array($result_products)){
    $products=array($rowss['p_price']);
    $products_value=array_sum($products);
    $total+= $products_value;
}
}

//quantity
$get_cart="select * from `cart_details`";
$runcart=mysqli_query($con,$get_cart);
$get=mysqli_fetch_array($runcart);
$quants=$get['quant'];
if($quants==0)
{
    $quants=1;
    $sub=$total;
}else{
    $quants=$quants;
    $sub=$total*$quants;
}
//insert
$insert="insert into `orders_table`(user_id,amount_due	,invoice_number	,total_products	,order_date,order_status)
values($userid,$sub,$invoice,$count_products,NOW(),'$status')";
$re=mysqli_query($con,$insert);
if($re){
    echo "<script>alert('order submited sucessfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}
//orderquery
$insert_pending_orders="insert into `orders_pending`(user_id,	invoice_no,product_id,quantity,order_status)
values($userid,$invoice,$productid,$quants,'$status')";
$rese=mysqli_query($con,$insert_pending_orders);
//empty query
$emptycart="delete from `cart_details` where 	ip_address='$getip'";
$del=mysqli_query($con,$emptycart);


?>
