<?php include("includes/db.php");
      include("function/function.php");
      include('libs/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/head.php") ?>
</head>
<body>
    <!-- header -->
    <?php include("includes/header.php") ?>
    <!-- //header -->
    <!--breadcrumbs-->
    <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
                    <li class="active">Giỏ hàng</li>
                </ol>
            </div>
      </div>
        <!-- //breadcrumbs-->
    <!-- cart -->
    <div class="container">         
      <div id="cart" class="col-md-12">
      <div class="box">
         <form action="" method="post" enctype="multipart/form-data">
             <h1>Giỏ hàng</h1>
             <?php 
                // if (!isset($_SESSION["cart"])) {
                //     $_SESSION["cart"] = array();
                // }
                $ip_add = getRealIpUser();
                $select_cart = "select * from cart where ip_add='$ip_add'";
                $run_cart = mysqli_query($con,$select_cart);
                $count = mysqli_num_rows($run_cart);
            ?>
             <p class="text-muted">Bạn có <?php echo $count; ?> sản phẩm trong giỏ</p>
             <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th colspan="2">Sản phẩm:</th>
                        <th>Số lượng:</th>
                        <th>Giá:</th>
                        <th colspan="1">Xóa:</th>
                        <th colspan="2">Tổng tiền:</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $total = 0;
                      while($row_cart = mysqli_fetch_array($run_cart)){
                         $pro_id = $row_cart['p_id'];
                         $pro_qty = $row_cart['qty'];
                         $get_products = "select * from products where product_id='$pro_id'";
                         $run_products = mysqli_query($con,$get_products);
                         while($row_products = mysqli_fetch_array($run_products)){
                           $product_title = $row_products['product_title'];
                           $product_img1 = $row_products['product_img1'];
                           $pro_price = $row_products['product_price'];
                           $pro_price_sale = $row_products['product_price_sale'];
                           $pro_stt = $row_products['product_stt'];
                           if($pro_stt == "sale"){
                              $product_price = "<del> $pro_price<sup>đ</sup> </del>";
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
                          
                              
                    ?>
                      <tr>
                        <td>
                          <img  class="img-responsive" src="admin/<?php echo $product_img1; ?>" alt="">
                        </td>
                        <td>
                          <a href="single.php?pro_id=<?php echo $pro_id; ?>"><?php echo $product_title; ?></a>
                        </td>
                        <td>
                          <?php echo $pro_qty; ?>
                        </td>
                        <td>
                        <?php echo $product_price?> <?php echo $product_price_sale ?><sup>đ</sup>
                        </td>
                        <td>
                          <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                        </td>
                        <td>
                          <?php echo $sub_total; ?>.000<sup>đ</sup>
                        </td>
                      </tr>
                    <?php } 
                      } 
                      // Lưu thông tin vào oder
                      $ten_khach_hang = $dia_chi = $so_dt = $content = '';
                      if (isset($_POST['ThanhToan'])) 
                      {
                      if (isset($_POST['ten_khach_hang'])) 
                      {
                        $ten_khach_hang = $_POST['ten_khach_hang'];
                        $ten_khach_hang = str_replace('"', '\\"', $ten_khach_hang);
                      }
                       if (isset($_POST['ma_khach_hang'])) 
                       {
                        $ma_khach_hang = $_POST['ma_khach_hang'];
                        $ma_khach_hang = str_replace('"', '\\"', $ma_khach_hang);
                      }
                      
                      if (isset($_POST['dia_chi'])) 
                      {
                        $dia_chi = $_POST['dia_chi'];
                        $dia_chi = str_replace('"', '\\"', $dia_chi);
                      }
                      if (isset($_POST['so_dt'])) 
                      {
                        $so_dt = $_POST['so_dt'];
                        $so_dt = str_replace('"', '\\"', $so_dt);
                      }
                      if (isset($_POST['content'])) 
                      {
                        $content = $_POST['content'];
                        $content = str_replace('"', '\\"', $content);
                      }
                      if (!empty($ten_khach_hang)) {
                          $sql = 'INSERT INTO oder (ma_khach_hang,ten_n_n, od_price, dia_chi, so_dt, content,create_time,last_time,cart_id) VALUES ("'.$_SESSION['ma'].'","'.$ten_khach_hang.'", "'.$total.'", "'.$dia_chi.'", "'.$so_dt.'","'.$content.'","'.time().'","'.time().'","'.$pro_id.'")';
                        db_execute($sql);

                        echo '<script language="javascript">'; 
                        echo 'alert("Giao dịch thành công")'; 
                        echo '</script>';
                        die();
                      }
                    }
                     if (isset($_SESSION['ma'])) {
                      $ma_khach_hang = $_SESSION['ma'];
                      $sql     = 'SELECT * from khachhang where ma_khach_hang = '.$ma_khach_hang;
                      $khachhang = executeSingleResult($sql);
                      if ($khachhang != null) {
                        $ten_khach_hang  = $khachhang['ten_khach_hang'];
                        $dia_chi     = $khachhang['dia_chi'];
                        $so_dt     = $khachhang['so_dt'];
                      }
                    }  
                   
                    ?>
                    </tbody>
                    <tfoot>
                      <hr>
                      <tr>
                        
                        <th colspan="5">Tổng tiền <?php items(); ?> sản phẩm:</th>
                        <th colspan="2"><?php echo $total; ?>.000<sup>đ</sup></th>
                      </tr>

                    </tfoot>
                  </table>
                 
             </div>
           
             <div class="box-footer">
              <div class="pull-lefr">
                <a href="index.php" class="btn btn-default">
                  <i class="fa fa-chevron-left"></i>Tiếp tục mua sắm
                </a>
              </div>
             <div class="pull-right"  style="margin-top: -36px;">
             <button type="submit" name="update" value="update cart" class="btn btn-default">
              <i class="fa fa-trash"></i> Xóa
             </button>
             <a href="order.php" class="btn btn-primary">
              Mua hàng <i class="fa fa-chevron-right"></i>
             </a>
             </div>
            </div>
            

            <script >
              $(document).ready(function(){
                  $(".btn").click(function(){
                       $(".panel-body").hide();
                    });
                 });
            </script>
            <!-- Form nhập thông tin người nhận -->
        </form>   
      </div>
      <?php
        function update_cart(){
          global $con;
          if(isset($_POST['update'])){
            foreach($_POST['remove'] as $remove_id){
              $delete_product = "delete from cart where p_id='$remove_id'";
              $run_delete = mysqli_query($con,$delete_product);
              if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
              }
            }
          }
        }
        echo @$up_cart = update_cart();
      ?>
          
      </div>
      
    </div>
    <!-- //cart -->

    <!--related-products-->

    <div class="container-fluid"> 
      <div class="col-md-12">
      <div class="related-products">
        <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
          <h3 class="title">Gợi ý</h3>
          </br>
        </div>
      <div class="related-products-info">
        <?php
                           
          $get_pro = "select * from products order by rand() LIMIT 0,4";
          $run_pro = mysqli_query($con,$get_pro);
                            
          while($row_pro = mysqli_fetch_array($run_pro) ){
          $p_id = $row_pro['product_id'];
          $p_title = $row_pro['product_title'];
          $p_img1 = $row_pro['product_img1'];
          $p_price = $row_pro['product_price'];
          $p_price_sale = $row_pro['product_price_sale'];
          $p_stt = $row_pro['product_stt'];
          if($p_stt == "sale"){
            $product_price = "<del> $p_price<sup>đ</sup> </del>";
            $product_price_sale = " $p_price_sale";
          }
          else{
            $product_price = "$p_price";
            $product_price_sale = "";
          }
          if($p_stt == ""){

          }else{
              $p_stt="
                  <a href='single.php?pro_id=$p_id' class='stt $p_stt'>
                     <div class='theStt'> $p_stt </div>
                     <div class='sttBackground'></div>
                  </a>
               ";
           }
                          
        echo"
        <div class='col-md-3 new-grid simpleCart_shelfItem wow flipInY animated' data-wow-delay='.5s' style='margin: 0 18px 20px 0;'>
          <div class='new-top'>
            <a href='single.php?pro_id=$p_id'>
              <img src='admin/$p_img1' class='img-responsive' alt='' />
            </a>
          </div>   
          <div class='new-bottom'>
            <h5><a class='name' href='single.php?pro_title=$p_title'>$p_title </a></h5>
            <div class='ofr'>
            <p><span class='item_price'>$product_price$product_price_sale</span><sup>đ</sup></p>
            </div>
          </div>
          $p_stt
        </div>      
        ";
        }
      ?>
    
      <div class="clearfix"> </div>
      </div>
      </div>
      </div> 
    </div>

    <!-- footer -->
    <?php include("includes/footer.php"); ?>
    <!-- //footer -->
    <!--smooth-scrolling-of-move-up-->
    <script type="text/javascript ">
            $(document).ready(function() {

                var defaults = {
                    containerID: 'toTop', // fading element id
                    containerHoverID: 'toTopHover', // fading element hover id
                    scrollSpeed: 1200,
                    easingType: 'linear'
                };

                $().UItoTop({
                    easingType: 'easeOutQuart'
                });

            });
        </script>
        <!--//smooth-scrolling-of-move-up-->
    <script src="js/bootstrap.js "></script>
    <script src="js/main.js "></script>
    
</body>
</html>