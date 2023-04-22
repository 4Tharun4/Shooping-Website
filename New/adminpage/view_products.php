<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <style>
        .prodimg{
            width:10%;
            object-fit:contain;

        }
    </style>
</head>
<body>
    <h3 class="text-center text-success" >Allproducts</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>PRODUCT ID</th>
                <th>PRODUCT TITLE</th>
                <th>PRODUCT IMAGE</th>
                <th>PRODUCT PRICE</th>
                <th>TOTAL SOLD</th>
                <th> STATUS</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $getprog="select * from `products`";
        $res=mysqli_query($con,$getprog);
        $number=0;
        while($rowview=mysqli_fetch_assoc($res)){
            $product_id=$rowview['p_id'];
            $product_title=$rowview['p_title'];
            $product_img=$rowview['p_img1'];
            $product_price=$rowview['p_price'];
            $product_status=$rowview['status'];
            $number++;
            ?>
             <tr class='text-center'>
           <td><?php echo $number?></td>
           <td><?php echo $product_title?></td>
           <td><img src='./prodimg/<?php echo $product_img?>' class='prodimg'/></td>
           <td><?php echo $product_price?></td>
           <td><?php 
           $get_count="select * from `orders_pending` where product_id='$product_id'";
           $resu=mysqli_query($con,$get_count);
           $rowc=mysqli_num_rows($resu);
           echo $rowc;
           
           ?></td>
           <td><?php echo $product_status?></td>
           
           <td><a href='' class='text-light'><i class='fa-solid fa-pen-to-square'></a></td>
           <td><a href='index.php?delete=<?php echo $product_id?> ' class='text-light'><i class='fa-solid fa-trash'></a></td>
       </tr>

          <?php  
        }
        
        ?>

       
    </tbody>
    </table>
    
</body>
</html>