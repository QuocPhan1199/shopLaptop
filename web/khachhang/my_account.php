<?php 

include("../includes/db.php");
include("../function/function.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>modern shoppe</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Modern Shoppe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script type="appli cation/x-javascript">


        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <!--//for-mobile-apps -->
    <!--Custom Theme files -->
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//Custom Theme files -->
    <!--js-->
    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/modernizr.custom.js"></script>
    <!--//js-->
    <!--flex slider-->
    <script defer src="../js/jquery.flexslider.js"></script>
    <link rel="stylesheet" href="../css/flexslider1.css" type="text/css" media="screen" />
    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
    <!--flex slider-->
    <script src="../js/imagezoom.js"></script>
    <!--cart-->
    <script src="../js/simpleCart.min.js"></script>
    <!--cart-->
    <!--web-fonts-->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>

 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--web-fonts-->
    <!--animation-effect-->
    <link href="css/animate.min.css" rel="stylesheet">
    <script src="../js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>


    <!--//animation-effect-->
    <!--start-smooth-scrolling-->
    <script type="text/javascript" src="../js/move-top.js"></script>
    <script type="text/javascript" src="../js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({

                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
</head>

<body>
    
  
<?php session_start(); ?>
<div id="header">
        <div class="top-header navbar navbar-default">
            <!--header-one-->
            <div class="container">
                <div class="nav navbar-nav wow fadeInLeft animated" data-wow-delay=".5s">
                    <div class="tren">
                    <?php if(isset($_SESSION['ma'])){ ?>
                        <p>
                            <?php echo "Xin Chào:". "&nbsp"."&nbsp". strtoupper($_SESSION['fullname']); ?>
                            <?php if($_SESSION['fullname'] == "Admin"){?>
                                <span><a href="admin/index.php">Đi tới Trang Quản Trị <i class="fa fa-angle-double-right"></i></a></span>
                            <?php  } ?>
                    
                    
                       </p>
                         <p>Chào mừng bạn đến với Toyy Shoppe <a href="../dangxuat.php">Đăng Xuất</a> | <a href="../doimatkhau.php">Đổi Mật Khẩu</a></p>
        
                        <?php } else{ ?>
                            <p>Chào mừng bạn đến với Toyy Shoppe <a href="register.php">Đăng Ký </a> | <a href="signin.php">Đăng Nhập </a></p>
                            
                        <?php } ?>
                          
                    </div>
                </div>
                <div class="nav navbar-nav navbar-right wow fadeInRight animated" data-wow-delay=".5s">
                   <a href="khachhang/them_thong_tin_kh.php"><i class="fa fa-user-circle"></i></a>
            </div>
        </div>
        
        <div class="header-two navbar navbar-default">
            <!--header-two-->
            <div class="container">
                <div class="nav navbar-nav header-two-left">
                    <ul>
                        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 892</li>
                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">mail@example.com</a></li>
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
                                    <a class="nav-link" href="../index.php">Trang chủ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../products.php">Sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-href" href="../cart.php">Giỏ hàng</a>
                                </li>

                            </ul>
                        </div>
                </nav>
                <!--//navbar-collapse-->
              
                </div>
                </nav>
               
</div>
    <!-- Navbar Ends -->
    
    <!-- Content Begin -->
    <div id="content">
    <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                    <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
                    <li class="active">Tài khoản của tôi</li>
                </ol>
            </div>
        </div>
        <!-- Bootstrap Container Begin -->
        <div class="container">
       
        

        <div class="col-md-3" style="margin-top: 100px;">
                <!-- Include Sidebar.php -->
                <?php 
                    
                    include("sidebar.php");
                
                ?>
                <!-- Include Sidebar.php /-->
            </div>
            <div class="col-md-9">
               



                <!-- Box Begin -->
                <div class="box">
                    <?php 
                    
                    if (isset($_GET['my_orders'])){
                        include("my_orders.php");
                    }
                    
                    ?>
                    
                    <?php 
                    
                    if (isset($_GET['them_thong_tin'])){
                        include("them_thong_tin.php");
                    }
                    
                    ?>
                    
                    <?php 
                    
                    if (isset($_GET['doimatkhau'])){
                        include("doimatkhau.php");
                    }
                    
                    ?>
                </div>
                <!-- Box Ends -->
            </div>
            <!-- Bootstrap Column md-9 Ends -->
        </div>
        <!-- Bootstrap Container Ends -->
    </div>
    <!-- Content Ends -->
    
    <!-- Include Footer.php -->
    <div class="footer ">
            <div class="container ">
                <div class="footer-info ">
                    <div class="col-md-4 footer-grids wow fadeInUp animated " data-wow-delay=".5s ">
                        <h4 class="footer-logo "><a href="../index.php ">Modern <b>Shoppe</b> <span class="tag ">Everything for Kids world </span> </a></h4>
                        
                    </div>
                    <div class="col-md-4 footer-grids wow fadeInUp animated " data-wow-delay=".7s ">
                        <h3>Home</h3>
                        <ul>
                            <li><a href="../index.php">Trang chủ</a></li>
                            <li><a href="../products.php">Sản phẩm</a></li>
                            <li><a href="../checkout.php">Giỏ hàng</a></li>                          
                            <li><?php getPCat(); ?></li>                           
                        </ul>
                    </div>
                   
                    <div class="clearfix "></div>
                </div>
            </div>
</div>
    <!-- Include Footer.php /-->
    

    
</body>
</html>

<?php 



?>