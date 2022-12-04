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
                    <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
                    <li class="active">Tất cả sản phẩm</li>
                </ol>
            </div>
        </div>
        <!-- //breadcrumbs-->
        <!--products-->
        <div class="products">
            <div class="container">
                <div class="col-md-9 product-model-sec">
                    <?php
                        if(!isset($_GET['p_cat'])){
                           if(!isset($_GET['cat'])){
                                $per_page=12;
                                if(isset($_GET['page'])){
                                    $page = $_GET['page'];
                                }else{
                                    $page=1;
                                }
                                $start_from = ($page-1) * $per_page;
                                $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
                                $run_products = mysqli_query($con,$get_products);
                                while($row_products=mysqli_fetch_array($run_products)){
                                    $pro_id = $row_products['product_id'];
                                    $pro_title = $row_products['product_title'];
                                    $pro_price = $row_products['product_price'];
                                    $pro_price_sale = $row_products['product_price_sale'];
                                    $pro_img1 = $row_products['product_img1'];
                                    $pro_stt = $row_products['product_stt'];
                                    if($pro_stt == "sale"){
                                        $product_price = "<del> $pro_price<sup>đ</sup> </del>";
                                        $product_price_sale = " $pro_price_sale";
                                    }
                                    else{
                                        $product_price = "$pro_price";
                                        $product_price_sale = "";
                                    }
                                    if($pro_stt == ""){

                                    }else{
                                    $pro_stt="
                                            <a href='single.php?pro_id=$pro_id' class='stt $pro_stt'>
                                                <div class='theStt'> $pro_stt </div>
                                                <div class='sttBackground'></div>
                                            </a>
                                            ";
                                    }
                                    echo"
                                        <div class='product-grids simpleCart_shelfItem wow fadeInUp animated ' data-wow-delay='.5s ' style='margin-right: 18px;'>
                                            <div class='new-top'>
                                                <a href='single.php?pro_id=$pro_id'>
                                                    <img src='admin/$pro_img1' class='img-responsive' alt='' />
                                                </a>
                                            </div>   
                                        <div class='new-bottom'>
                                            <h5><a class='name' href='single.php?pro_title=$pro_title'>$pro_title </a></h5>
                                            <div class='ofr'>
                                                <p><span class='item_price'>$product_price$product_price_sale</span><sup>đ</sup></p>
                                            </div>
                                        </div>
                                        $pro_stt
                                        </div>
                                        ";
                                }
                            }
                        }
                    ?>
                </div>

                <div class="col-md-3 rsidebar">
                    <div class="rsidebar-top">

                   
                       
                            <?php include("includes/sidebar.php"); ?>
                        
                    </div>
                </div>
 
                <div class="products">
                    <div class="container">
                        <div class="col-md-9 product-model-sec">
                           <?php getpcatpro(); ?>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="p_page" style="margin-top: -120px;">
            <ul class="pagination justify-content-center">
                <?php
                    $query = "select * from products";
                    $result = mysqli_query($con,$query);
                    $total_records = mysqli_num_rows($result);
                    $total_page = ceil($total_records / $per_page);
                    echo "
                        <li>
                            <a href='products.php?page=1'>".'<'."</a>
                        </li>
                         ";
                        for($i=1;$i<=$total_page;$i++)
                        {
                            echo"
                               <li>
                                   <a href='products.php?page=".$i."'>".$i."</a>
                               </li>
                            ";
                        };
                        echo "
                            <li>
                                <a href='products.php?page=$total_page'>".'>'."</a>
                            </li>
                        ";
                        
                ?>
            </ul>
        </div>

       <!--//products -->

     

    <!--footer-->
    <?php include("includes/footer.php");  ?>
    <!--//footer-->
    <!-- the jScrollPane script -->
    <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
    <script type="text/javascript" id="sourcecode">
        $(function() {
            $('.scroll-pane').jScrollPane();
        });
    </script>
    <!-- //the jScrollPane script -->
    <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
    <!-- the mousewheel plugin -->
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