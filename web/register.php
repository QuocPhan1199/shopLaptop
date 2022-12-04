<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
   <?php include('includes/head.php'); ?>
    <!--//end-smooth-scrolling-->
</head>

<body>

    <!--breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Đăng kí</li>
            </ol>
        </div>
    </div>

    <!--//breadcrumbs-->
    <!--login-->
    
    <div class="login-page">
        <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
            <h3 class="title">Đăng<span> kí</span></h3>
            <p>Đăng kí tài khoản để nhận nhiều thông tin về chúng tôi </p>
        </div>
        <div class="widget-shadow">
            <div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
                <h4>Bạn đã có tài khoản ?<a href="signin.php">  Sign In »</a> </h4>
            </div>
            <div class="login-body">
                <form class="wow fadeInUp animated" data-wow-delay=".7s" method="post" action="dangky.php">
                    <input type="text" placeholder="Họ Và Tên" required="" name="hoten">
                    <input type="text" class="email" placeholder="Email" required="" name="email">
                    <input type="password" name="password" class="lock" placeholder="Mật khẩu" name="password">
                    <input type="password" placeholder="Nhập Lại Password" required="" name="re_password">
                    <input type="submit" name="Register" value="Đăng kí">
                </form>
            </div>
        </div>
    </div>
    <!--//login-->
    <!--footer-->
    <div class="footer">
        <div class="container">
            <div class="footer-info">
                <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".5s">
                    <h4 class="footer-logo"><a href="index.php">Toyy <b>Shop</b> <span class="tag">Thế giới nhồi bông </span> </a></h4>
                    <p>© 2016 Modern Shoppe . All rights reserved | Design by <a href="http://w3layouts.com" target="_blank">W3layouts</a></p>
                </div>
                <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".7s">
                    <h3>Popular</h3>
                    <ul>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="products.php">new</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="checkout.php">Wishlist</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".9s">
                    <h3>Subscribe</h3>
                    <p>Sign Up Now For More Information <br> About Our Company </p>
                    <form>
                        <input type="text" placeholder="Enter Your Email" required="">
                        <input type="submit" value="Go">
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
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