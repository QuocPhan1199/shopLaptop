<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php session_start();
    include('libs/database.php');
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>Modern Shoppe a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Sign In :: w3layouts</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Modern Shoppe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--//for-mobile-apps -->
    <!--Custom Theme files -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//Custom Theme files -->
    <!--js-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <!--//js-->
    <!--cart-->
    <script src="js/simpleCart.min.js"></script>
    <!--cart-->
    <!--web-fonts-->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
    <!--web-fonts-->
    <!--animation-effect-->
    <link href="css/animate.min.css" rel="stylesheet">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//animation-effect-->
    <!--start-smooth-scrolling-->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
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
    <!--//end-smooth-scrolling-->
</head>

<body>
    <!--header-->
            <!--header-three-->
                    <!--navbar-header-->
                   
                        <!--//navbar-collapse-->
                        <header class="cd-main-header">
                            <ul class="cd-header-buttons">
                                <li>
                                    <a class="cd-search-trigger" href="#cd-search"> <span></span></a>
                                </li>
                            </ul>
                            <!-- cd-header-buttons -->
                        </header>
                    </div>
                    <!--//navbar-header-->
                </nav>
                <div id="cd-search" class="cd-search">
                    <form>
                        <input type="search" placeholder="Search...">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--//header-->
    <!--breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow fadeInUp" data-wow-delay=".5s">
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang Chủ</a></li>
            </ol>
        </div>
    </div>
    <?php 
        $ma_khach_hang = $password = $newpassword = $oldpassword = '';
        $error = '';
        if(isset($_SESSION['ma']))
        {
            $ma_khach_hang = $_SESSION['ma'];
        if(!empty($_POST))
        {
        if (isset($_POST['ma_khach_hang'])) 
        {
            $ma_khach_hang = $_POST['ma_khach_hang'];
            $ma_khach_hang = str_replace('"', '\\"', $ma_khach_hang);
        }
        if (isset($_POST['password'])) 
        {
            $password = $_POST['password'];
            $password = str_replace('"', '\\"', $password);
        }
        if (isset($_POST['newpassword'])) 
        {
            $newpassword = $_POST['newpassword'];
            $newpassword = str_replace('"', '\\"', $newpassword);
        }
        if (isset($_POST['oldpassword'])) 
        {
            $oldpassword = $_POST['oldpassword'];
            $oldpassword = str_replace('"', '\\"', $oldpassword);
        }
        $sql = 'SELECT * FROM khachhang WHERE ma_khach_hang ="'.$_POST['ma_khach_hang'].'" AND mat_khau = "'.md5($_POST['password']).'" ';
        $user = db_execute($sql);
        if(mysqli_num_rows($user) > 0)
        {
                if($newpassword == $oldpassword)
                {
                    
                    $sql = "UPDATE khachhang SET mat_khau ='".md5($_POST['newpassword'])."' WHERE ma_khach_hang = '".$_POST['ma_khach_hang']."' ";
                db_execute($sql);
                echo '<script language="javascript">'; 
                echo 'alert("Thay đổi thành công")'; 
                echo '</script>';
                ?>
                <button type="button" onclick="window.open('signin.php','_self')" >Quang Lại Trang Đăng Nhập</button>
                <?php
                }

                else{
                echo '<script language="javascript">'; 
                echo 'alert("Vui lòng nhập lại mật khẩu")'; 
                echo '</script>';
                }
        }
        else
            {
                echo '<script language="javascript">'; 
                echo 'alert("Vui lòng nhập lại mật khẩu")'; 
                echo '</script>';
            }

    }
 }    

     ?>
    <div class="login-page">
        <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
            <h3 class="title"><span>Đổi Mật Khẩu</span></h3><br>
            <h2><?php echo "Xin Chào:". "&nbsp"."&nbsp". strtoupper($_SESSION['fullname']); ?></h2>
        </div>
        <div class="widget-shadow">
            <div class="login-body wow fadeInUp animated" data-wow-delay=".7s">
                <form id="form-dmk" method="post" action="">
                    <input type="text" name="ma_khach_hang" value="<?=$ma_khach_hang?>" hidden ="true">
                    <input type="password" id="password" name="password" class="lock" placeholder="Password">
                    <input type="password" id="newpassword" name="newpassword" class="lock" placeholder="Password">
                    <input type="password" id="oldpassword" name="oldpassword" class="lock" placeholder="Password">
                    <input type="submit" name="Sign_In" value="Thay Đổi">
                </form>
            </div>
        </div>
    </div>
    
    <script src="js/bootstrap.js"></script>
</body>

</html>