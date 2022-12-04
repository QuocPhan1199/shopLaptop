<div class="footer ">
            <div class="container ">
                <div class="footer-info ">
                    <div class="col-md-4 footer-grids wow fadeInUp animated " data-wow-delay=".5s ">
                        <h4 class="footer-logo "><a href="index.php ">Modern <b>Shoppe</b> <span class="tag ">Everything for Kids world </span> </a></h4>
                        
                    </div>
                    <div class="col-md-4 footer-grids wow fadeInUp animated " data-wow-delay=".7s ">
                        <h3>Home</h3>
                        <ul>
                            <li><a href="index.php">Trang chủ</a></li>
                            <li><a href="products.php">Sản phẩm</a></li>
                            <li><a href="checkout.php">Giỏ hàng</a></li>                          
                            <li><?php getPCat(); ?></li>                           
                        </ul>
                    </div>
                   
                    <div class="clearfix "></div>
                </div>
            </div>
</div>
<script src="js/main.js "></script>
<script type="text/javascript ">
    $(document).ready(function() {

        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
             easingType: 'linear'
            };

            $().UItoTop({
                asingType: 'easeOutQuart'
            });

        });
</script>
<script src="js/bootstrap.js "></script>



        



