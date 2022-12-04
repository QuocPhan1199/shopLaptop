<?php

  include("../includes/db.php");


?>

<!-- Center Begin -->
<center>
    <p class="lead">Đơn hàng đang được vận chuyển</p>
  
</center>
<!-- Center Ends -->

<hr>

<!-- Parent Table Begins -->
<div class="table-responsive">
    <!-- Table Begins -->
    <table class="table table-bordered table-hover">
        <!-- Thead Begins -->
        <thead>
            
            <!-- tr Begins -->
            <tr>
                <th>STT: </th>
                <th colspan="2">Sản Phẩm:</th>
                <th>Số lượng: </th>
                <th>Ngày đặt: </th>
                <th>Số hóa đơn: </th>
            </tr>
            <!-- tr Ends -->
            
        </thead>
        <!-- Thead Ends -->
        
        <!-- Tbody Begins -->
        <tbody>
            
            <?php 
            
            $customer_session = $_SESSION['email'];
            
            $get_customer = "select * from khachhang where email='$customer_session'";
            
            $run_customer = mysqli_query($con,$get_customer);
            $row_customer = mysqli_fetch_array($run_customer );
            
            $customer_id = $row_customer['ma_khach_hang'];
            
            $get_orders = "select products.product_title, products.product_img1, pending_orders.qty,pending_orders.order_date,pending_orders.invoice_no 
                from  pending_orders 
                JOIN products on pending_orders.product_id = products.product_id 
                WHERE pending_orders.ma_khach_hang = '$customer_id'";
            
            $run_orders = mysqli_query($con,$get_orders);
            $i = 0;
             while($row_orders = mysqli_fetch_array($run_orders)){
                
                 //$order_id = $row_orders['order_id'];

                // $order_customer = $row_orders['ma_khach_hang'];

                 $order_invoice = $row_orders['invoice_no'];
                $product_img1 = $row_orders['product_img1'];

                $product_title = $row_orders['product_title'];
                
                 $qty = $row_orders['qty'];
                
                 $order_date = substr($row_orders['order_date'],0,11);
                
                 $i++;
                         ?>
            
            <!-- tr Begins -->
            <tr>
                
                <th> <?php echo $i; ?> </th>
                <td><img  class="img-responsive" src="../admin/<?php echo $product_img1; ?>" alt=""></td>
                <td><?php echo $product_title; ?></td>
                <td> <?php echo $qty; ?> </td>
                <td> <?php echo $order_date; ?> </td>
                <td colspan="auto" ><?php  echo $order_invoice ?></td>
                
                
            </tr>
            <!-- tr Ends -->
            
            
        <?php } ?>
        </tbody>
        <!-- Tbody Ends -->
    </table>
    <!-- Table Ends -->
</div>
<!-- Parent Table Ends -->