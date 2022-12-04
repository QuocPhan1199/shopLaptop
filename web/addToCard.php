<?php
   
    function getRealIpUser(){
        switch(true){
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            default : return $_SERVER['REMOTE_ADDR'];
        }
    }
        global $db;
        if(isset($_GET['add_cart'])){
            $ip_add = getRealIpUser();
            $p_id = $_GET['add_cart'];
            $product_qty = $_POST['product_qty'];
            $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
            $run_check = mysqli_query($db,$check_product);
            if(mysqli_num_rows($run_check)>0){
                echo "<script>
                     window.location.href='single.php?pro_id=$p_id';
                     alert('Sản phẩm đã có trong giỏ hàng của bạn')
                </script>";
            }
            else{
                $query = "insert into cart (p_id,ma_khach_hang,ip_add,qty) 
                         values ('$p_id','".$_SESSION['ma']."','$ip_add','$product_qty')";
                mysqli_query($db,$query);
                echo "<script>window.location.href='single.php?pro_id=$p_id'</script>";
            }
        }
?>