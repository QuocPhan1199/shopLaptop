
<?php
    include("includes/db.php");
    include("function/function.php");
    include('libs/database.php');
?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head.php"); ?>
</head>

<body>
    <!--header-->
       <?php include("includes/header.php"); ?>
    <!--//header-->
        <!--slide-->
        <?php include("slides.php"); ?>
        <!--//slide-->
        <!--new-->
        <div class="new py-5" id="new" class="offset">
            <div class="new">
                <div class="container">
                    <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
                        <h3 class="title">New <span>Arrivals</span></h3>
                        <p>Luôn luôn cập nhật những mẫu mới nhất</p>
                    </div>
                    <div class="new-info">
                        <?php
                          getProNew();  
                        ?>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>

        <!--//new-->
        <!--popular-->
        <div class="popular py-5" id="product" class="offset">
            <div class="container ">
                <div class="title-info wow fadeInUp animated " data-wow-delay=".5s ">
                    <h3 class="title ">Sh<span>op</span></h3>
                    <p>Một số sản phẩm</p>
                </div>
                <div class="gallery-info ">
                    <?php getPro();  ?>
                    <div class="clearfix "></div>
                </div>
            </div>
        </div>
        

        <!--//popular-->

        <!--footer-->
        <?php include("includes/footer.php");  ?>
        <!--//footer-->
        <!--search jQuery-->
        <script src="js/main.js "></script>
        <!--//search jQuery-->
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
        <!--Bootstrap core JavaScript
    ================================================== -->
        <!--Placed at the end of the document so the pages load faster -->
        <script src="js/bootstrap.js "></script>
</body>

</html>




