
<?php session_start();
      include("db.php");
?>
<div id="header">
        <div class="top-header navbar navbar-default">
            <!--header-one-->
            <div class="container">
                <div class="nav navbar-nav wow fadeInLeft animated" data-wow-delay=".5s">
                    <div class="tren">
                    <?php if(isset($_SESSION['ma'])){ ?>
                        <p>
                            <a href="khachhang/my_account.php" title=""><?php echo "Xin Chào:". "&nbsp"."&nbsp". strtoupper($_SESSION['fullname']); ?>
                            <?php if($_SESSION['fullname'] == "Admin"){?>
                                <span><a href="admin/index.php">Đi tới Trang Quản Trị <i class="fa fa-angle-double-right"></i></a></span>
                            <?php } ?>
                            </a>
                    
                       </p>
                         <p>Chào mừng bạn đến với Toyy Shoppe <a href="dangxuat.php">Đăng Xuất</a> | <a href="doimatkhau.php">Đổi Mật Khẩu</a></p>
                         
                        <?php } else{ ?>
                            <p>Chào mừng bạn đến với Toyy Shoppe <a href="register.php">Đăng Ký </a> | <a href="signin.php">Đăng Nhập </a></p>
                        <?php } ?>  
                    </div>
                </div>
                <!-- <div class="nav navbar-nav navbar-right wow fadeInRight animated" data-wow-delay=".5s">
                   <a href="khachhang/tk.php"><i class="fa fa-user-circle"></i></a>
            </div> -->
            
        </div>
        
        <!-- <?php
            if(isset($_GET['c_id'])){
                $cus_id = $_GET['c_id'];
                $get_cus = "select * from khachhang where ma_khach_hang='$cus_id'";
                $run_cus = mysqli_query($con,$get_cus);
                $row_cus = mysqli_fetch_array($run_cus);
                $cus_name = $row_cus['ten_khach_hang'];
                $cus_email = $row_cus['email'];
                $cus_num = $row_cus['so_dt'];
                
            }
            
        ?> -->

        <div class="header-two navbar navbar-default">
            <!--header-two-->
            <div class="container">
                <div class="nav navbar-nav header-two-left">
                    <ul>
                        <!-- <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><?php if($cus_name=="Admin"){echo $cus_num;} ?></li> -->
                        <!-- <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com"><?php if($cus_name=="Admin"){echo $cus_email;} ?></a></li> -->
                    </ul>
                </div>
                <div class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".7s">
                    <h1><a href="index.php">Toyy <b>Shop</b><span class="tag">Thế giới nhồi bông </span> </a></h1>
                </div>
                <div class="nav navbar-nav navbar-right header-two-right">
                    <div class="header-right cart">
                        <a href="cart.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
                          <sup><h4>(<?php items(); ?>)</h4></sup>                              
                        </a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="top-nav navbar navbar-default">
            <!--header-three-->
            <div class="container">
                <nav class="navbar" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
                    </div>
                    <!--navbar-header-->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Trang chủ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="products.php">Sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-href" href="cart.php">Giỏ hàng</a>
                                </li>

                            </ul>
                        </div>
                </nav>
                <!--//navbar-collapse-->
                
                
            </div>
</div>
