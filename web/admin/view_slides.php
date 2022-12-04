<?php 
   include("includes/db.php");
?>

<div class="row">
        <!-- Bootstrap Column lg-12 Begins -->
        <div class="col-lg-12">
            <!-- Bootstrap Breadcrumb Begins -->
            <ol class="breadcrumb">
                <!-- Bootstrap li Begins -->
                <li class="active">
                    
                    <i class="fa fa-dashboard"></i> Quản lý / Slides
                    
                </li>
                <!-- Bootstrap li Ends -->
            </ol>
            <!-- Bootstrap Breadcrumb Ends -->
        </div>
        <!-- Bootstrap Column lg-12 Ends -->
    </div>
    <!-- Bootstrap Row Ends -->

    <!-- Bootstrap Row Begins -->
    <div class="row">
        <!-- Bootstrap Column lg-12 Begins -->
        <div class="col-lg-12">
            <!-- Bootstrap Panel Begins -->
            <div class="panel panel-default">
                <!-- Bootstrap panel-heading Begins -->
                <div class="panel-heading">
                    <!-- panel-title Begins -->
                    <h3 class="panel-title">
                        
                        <i class="fa fa-tv fa-fw"></i> Danh sách slide
                        
                    </h3>
                    <!-- panel-title Ends -->
                </div>
                <!-- Bootstrap panel-heading Ends -->
                
                <!-- Bootstrap panel-body Begins -->
                <div class="panel-body">
                    
                    <?php 
                    
                    $get_slides = "select * from slides";
        
                    $run_slides = mysqli_query($con,$get_slides);
    
                    while($row_slides = mysqli_fetch_array($run_slides)){
                        
                        $slide_id = $row_slides['slide_id'];
                        $slide_img = $row_slides['slide_img'];
                    
                    ?>
                    

                    <div class="col-lg-3 col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <img src="<?php echo $slide_img; ?>" class="img-responsive">
                            </div>
                
                            <div class="panel-footer">
                                <center>
                                    <a href="index.php?delete_slides=<?php echo $slide_id; ?>" class="pull-right">
                                        <i class="fa fa-trash-o">
                                            Xóa Slide
                                        </i>
                                    </a>                                  
                                    <div class="clearfix"></div>                                   
                                </center>
                            </div>                           
                        </div>                    
                    </div>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>