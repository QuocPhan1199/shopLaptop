<?php
    include("includes/db.php");
    include("function/function.php");
?>


<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head.php"); ?>
</head>
<body>
    <!-- header -->
    <?php include("includes/header.php"); ?>
    <!--//header-->
        <!--breadcrumbs-->
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                    <li class="active">Chi tiết sản phẩm</li>
                </ol>
            </div>
            <?php if(isset($_GET['pro_id'])){
              $product_id = $_GET['pro_id'];
              $get_product = "select * from products where product_id='$product_id'";
              $run_product = mysqli_query($con,$get_product);
              $row_product = mysqli_fetch_array($run_product);
              $p_cat_id = $row_product['p_cat_id'];
              $pro_title = $row_product['product_title'];
              $pro_price = $row_product['product_price'];
              $pro_price_sale = $row_product['product_price_sale'];
              $pro_desc = $row_product['product_desc'];
              $pro_img1 = $row_product['product_img1'];
              $pro_img2 = $row_product['product_img2'];
              $pro_img3 = $row_product['product_img3'];
              $pro_stt = $row_product['product_stt'];
              $get_p_cat = "select * from categories where p_cat_id='$p_cat_id'";
              $run_p_cat = mysqli_query($con,$get_p_cat);
              $row_p_cat = mysqli_fetch_array($run_p_cat);
              $p_cat_title = $row_p_cat['p_cat_title'];

                if($pro_stt == "sale"){
                    $p_price = "<del> $pro_price<sup>đ</sup></del>";
                    $p_price_sale = " $pro_price_sale";
                }
                else{
                
                    $p_price = "$pro_price";
                        $p_price_sale = "";
                }
            }
            
            ?>

            <div class="container">
                <div class="single-info">
                <div class="col-md-6 single-top wow fadeInLeft animated" data-wow-delay=".5s">
                        <div class="flexslider">
                        <ul class="slides">
                                <li data-thumb="admin/<?php echo $pro_img1; ?>">
                                    <div class="thumb-image"> <img src="admin/<?php echo $pro_img1; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
                                </li>
                                <li data-thumb="admin/<?php echo $pro_img2; ?>">
                                    <div class="thumb-image"> <img src="admin/<?php echo $pro_img2; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
                                </li>
                                <li data-thumb="admin/<?php echo $pro_img3; ?>">
                                    <div class="thumb-image"> <img src="admin/<?php echo $pro_img3; ?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
                                </li>
                        </ul>
                        </div>
                    </div>
                    <div class="col-md-6 single-top-left simpleCart_shelfItem wow fadeInRight animated" data-wow-delay=".5s">
                        <h3><?php  echo $pro_title; ?></h3>
                        <br>
                        <h6 class="item_price" style="color: #E8E8E8;"><?php echo  $p_price ?><?php echo $p_price_sale?><sup>đ</sup></h6>
                        <p> <?php echo $pro_desc; ?> </p>
                        <div class="clearfix"> </div>
                        <form action="handleOrder.php?add_card=<?php echo $product_id; ?>" class="form-horizontal" method="post">
                             <div class="form-group">
                                 <label for="" class="col-md-5 control-label" style="width: 35%;">số lượng:</label>
                                 <div class="col-md-7">
                                     <select name="product_qty" id="" class="form-control_select">
                                         <option>1</option>
                                         <option>2</option>
                                         <option>3</option>
                                         <option>4</option>
                                         <option>5</option>
                                         <option>6</option>
                                         <option>7</option>
                                         <option>8</option>
                                     </select>
                                 </div>
                             </div>
                             <button class="btn btn-light"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng</button>
                             
                            <script type="text/javascript">
                            $(document).ready(function(){
                                $('button').click(function() {
                                    <?php if(!isset($_SESSION['ma'])){ ?>
                                        window.location.href = 'signin.php';
                                        return false;
                                    <?php }else{?>
                                        window.location.href = 'index.php';
                                        return true;  
                                    <?php } ?>    
                                });
                            });
                          </script>
                        </form>
                        
                           
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div class="info_pro" style="color: #E8E8E8;">
                <br>Chất Liệu: Sản phẩm <?php echo $pro_title; ?> được làm từ chất liệu lông cao cấp, bên trong được nhồi 100% gòn trắng đàn hồi tinh khiết,  <p>giúp sản phẩm rất căng bông, êm ái và cực kì an toàn cho sức khỏe.</br>
                <br>Bảo Hành: Đặc biệt, với số điện thoại đã đăng ký, sản phẩm của bạn mua sẽ được bảo hành đường chỉ may trọn đời tại Shop.  <p>Sản phẩm của bạn bị bung chỉ? bạn cứ mang đến cửa hàng & cung cấp số di động là xong. Shop sẽ chăm sóc tận tình.</br>
                </div>

                <!--image detail-->
                <div class="img_detail" style="margin-top: 120px;">
                    <li>
                       <img src="admin/<?php echo $pro_img1; ?>" class="mx-auto d-block">
                       <p class="detail_text" ><i>(Hình ảnh sản phẩm)</i></p>
                    </li>
                    <li>
                       <img src="admin/<?php echo $pro_img2; ?>" class="mx-auto d-block" >
                       <p class="detail_text" ><i>(Hình ảnh sản phẩm)</i></p>
                    </li>
                    <li>
                       <img src="admin/<?php echo $pro_img3; ?>" class="mx-auto d-block">
                       <p class="detail_text"><i>(Hình ảnh sản phẩm)</i></p>
                    </li>
                </div>
                <!--//image detail -->
                <!--related-products-->
                <div class="related-products">
                    <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
                        <h3 class="title">Gợi ý</h3>
                        <p></p>
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
                                $pro_stt = $row_pro['product_stt'];
                                if($pro_stt == "sale"){
                                    $product_price = "<del> $p_price<sup>đ</sup> </del>";
                                    $product_price_sale = " $p_price_sale";
                                }
                                else{
                                    $product_price = "$p_price";
                                    $product_price_sale = "";
                                }
                                if($pro_stt == ""){

                                }else{
                                   $pro_stt="
                                      <a href='single.php?pro_id=$p_id' class='stt_s $pro_stt'>
                                        <div class='theStt_s'> $pro_stt </div>
                                        <div class='sttBackground_s'></div>
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
                                        $pro_stt
                                    </div>      
                                ";
                            }
                        ?>
                        
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <!--//related-products-->

            </div>
        </div>
        <!--//single-page-->

        <!--footer-->
        <?php include("includes/footer.php");  ?>
        <!--//footer-->
        
        <!--search jQuery-->
        <script src="js/main.js"></script>
        <!--//search jQuery-->
        <!--smooth-scrolling-of-move-up-->
        <script type="text/javascript">
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
        <!--Bootstrap core JavaScript
    ================================================== -->
        <!--Placed at the end of the document so the pages load faster -->
        <script src="js/bootstrap.js"></script>
</body>

</html>


