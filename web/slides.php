<?php include("includes/db.php") ?>

<div class="container" id="slider">
        <!-- Bootstrap Column md-12 Begin -->
        <div class="col-md-12">
            <!-- Bootstrap Carousel Begin -->
            <div class="carousel slide" id="myCarousel" data-ride="carousel">
                <!-- Carousel Indicators Begin -->
                <ol class="carousel-indicators">
                    <!-- Indicator Data -->
                    <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>        
                    <!-- Indicator Data /-->
                </ol>
                <!-- Carousel Indicators Ends -->
                
                <!-- Carousel-Inner Begins -->
                <div class="carousel-inner">
                    <!-- Carousel Item(Images/Videos) -->
                    <?php 
                    
                    $get_slides = "select * from slides LIMIT 0,1";
                    
                    $run_slides = mysqli_query($con,$get_slides);
                    
                    while($row_slides = mysqli_fetch_array($run_slides)){
                        
                        $slide_img = $row_slides['slide_img'];
                        
                        echo "
                        
                            <div class='item active'>
                            
                                <img src='admin/$slide_img'>
                                
                            </div>
                        
                        ";
                        
                    } 
                    
                    $get_slides = "select * from slides LIMIT 1,3";
                    
                    $run_slides = mysqli_query($con,$get_slides);
                    
                    while($row_slides = mysqli_fetch_array($run_slides)){
                        
                        $slide_img = $row_slides['slide_img'];
                        
                        echo "
                        
                            <div class='item'>
                            
                                <img src='admin/$slide_img'>
                                
                            </div>
                        
                        ";
                        
                    }
                    
                    ?>
                    <!-- Carousel Item(Images/Videos) /-->
                </div>
                <!-- Carousel-Inner Ends -->
                
                <!-- Carousel Arrow Controls -->
                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                
                <a href="#myCarousel" class="right carousel-control" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!-- Carousel Arrow Controls /-->
            </div>
            <!-- Bootstrap Carousel Ends -->
        </div>
        <!-- Bootstrap Column md-12 Ends -->
    </div>
    <!-- Site Slider Ends -->