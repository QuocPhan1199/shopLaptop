<?php 

session_start();

include("includes/db.php");
include("function/function.php");

?>

<?php 
if(isset($_GET['c_id'])){
    
    $customer_id = $_GET['c_id']; 

}
$ip_add = getRealIpUser();



$invoice_no = mt_rand();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);
    
    $total = 0;

while($row_cart = mysqli_fetch_array($run_cart)){
    
    $pro_id = $row_cart['p_id'];
    
    $pro_qty = $row_cart['qty'];

    
    $get_products = "select * from products where product_id='$pro_id'";
    
    $run_products = mysqli_query($con,$get_products);
    
    while($row_products = mysqli_fetch_array($run_products)){
               
        //$sub_total = $row_products['product_price']*$pro_qty;

        $pro_price = $row_products['product_price'];
        $pro_stt = $row_products['product_stt'];
        $pro_price_sale = $row_products['product_price_sale'];
        if($pro_stt == "sale"){
            $product_price = "<del> $pro_price.000<sup>đ</sup> </del>";
            $product_price_sale = " $pro_price_sale";
            $sub_total = $row_products['product_price_sale']*$pro_qty;
            $total += $sub_total;                
            }               
        else{
            $product_price = "$pro_price";
            $product_price_sale = "";
            $sub_total = $row_products['product_price']*$pro_qty;
            $total += $sub_total;
        }
        
        $insert_customer_order = "insert into customer_orders (ma_khach_hang,invoice_no,qty,order_date)
                                    values ('".$_SESSION['ma']."','$invoice_no','$pro_qty',NOW())";
        
        $run_customer_order = mysqli_query($con,$insert_customer_order); 
        
        $insert_pending_order = "insert into pending_orders (ma_khach_hang,invoice_no,product_id,qty,order_date)  
                                    values ('".$_SESSION['ma']."','$invoice_no','$pro_id','$pro_qty',NOW())";
        
        $run_pending_order = mysqli_query($con,$insert_pending_order);
        
        $delete_cart = "delete from cart where ip_add='$ip_add'";
        
        $run_delete = mysqli_query($con,$delete_cart);


        }   
           echo "<script>alert('Đặt hàng thành công')</script>";          
           echo "<script>window.open('khachhang/my_account.php?my_orders','_self')</script>";
    }

    $sql  = "SELECT * FROM khachhang WHERE ma_khach_hang =".$_SESSION['ma'];
    $run_customer = mysqli_query($con,$sql);
    $run_rows = mysqli_fetch_array($run_customer);
        $ma_khach_hang = $run_rows['ma_khach_hang'];
        $ten = $run_rows['ten_khach_hang'];
        $dia_chi = $run_rows['dia_chi'];
        $so_dt = $run_rows['so_dt'];
    $insert = "INSERT INTO bill(ma_khach_hang, ten_nguoi_nhan, tong_tien, dia_chi, so_dt, ngay_tao) 
                VALUES('".$_SESSION['ma']."', '$ten', '$total', '$dia_chi', '$so_dt', NOW())";
                $run_insert =  mysqli_query($con,$insert);

?>