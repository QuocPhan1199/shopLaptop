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
                    <li class="active">Thanh toán</li>
                </ol>
            </div>
      </div>
        <!-- //breadcrumbs-->

        <!-- Xử lý php Lấy thông tin khách hàng và đẩy vào hóa đơn -->

          <?php 

     

  ?>



    <!-- cart -->
    <div class="container">         
      <div id="cart" class="col-md-12">
      <div class="box">

              
                    <?php 

                      $ten_khach_hang = $dia_chi = $so_dt = $content = '';
                      if (!empty($_POST)) 
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
                          $sql = 'INSERT INTO oder(ma_khach_hang, p_id,ten_n_n, od_price, dia_chi, so_dt, content) VALUES ("'.$_SESSION['ma'].'","'.$pro_id.'","'.$ten_khach_hang.'", "'.$total.'", "'.$dia_chi.'", "'.$so_dt.'","'.$content.'")';
                        db_execute($sql);

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
                    
                  </table>
                 
             </div>
           
           
             
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
    	<!-- Thông Tin Người Nhận   -->
    	<div class="container">
    		<form method="post" >
				<div class="panel-body">
					<div class="form-group">
					  <label for="usr">Người Nhận:</label>
					   <input type="text" name="ma_khach_hang" value="" hidden=
					   "true">
					  <input required="true" type="text" class="form-control" id="usr" name="ten_khach_hang" value="<?=$ten_khach_hang?>">
					</div>
					<div class="form-group">
					  <label for="dia_chi">Địa Chỉ:</label>
					  <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="<?=$dia_chi?>" >
					</div>
					<div class="form-group" >
					  <label for="so_dt">Số Điện Thoại:</label>
					  <input type="text" class="form-control" id="so_dt" name="so_st" value="<?=$so_dt?>">
					</div>
					<div class="form-group">
						<label for="content">Ghi chú:</label>
						<textarea name="content" id="content" cols="50" rows="7" >	
						</textarea>
					</div>
					<button class="btn btn-success">Thanh Toán</button>
				</div>
			</form>
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