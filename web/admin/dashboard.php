<?php include("function.php"); ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php count_product(); ?></div>
                            <div> Sản phẩm</div>                        
                    </div>
                </div>
            </div>
            <a href="index.php?view_products">
                <div class="panel-footer">
                    <span class="pull-left"> 
                        Xem chi tiết
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php count_category(); ?></div>
                            <div> Danh mục</div>
                        </div>
                </div>
            </div>
            <a href="index.php?view_categories">
                <div class="panel-footer">
                    <span class="pull-left"> 
                        Xem chi tiết
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">11</div>
                            <div> Khách hàng</div>
                    </div>
                </div>
            </div>
            <a href="index.php?view_customer">
                <div class="panel-footer">
                    <span class="pull-left"> 
                        Xem chi tiết
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-brown">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-basket fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php count_customer(); ?></div>
                            <div> Đơn hàng</div>
                        </div>
                </div>
            </div>
            <a href="index.php?view_orders">
                <div class="panel-footer">
                    <span class="pull-left"> 
                        Xem chi tiết
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Đơn hàng mới
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                               <th>STT:</th>
                               <th>Mail:</th>
                               <th>Số hóa đơn:</th>
                               <th>Mã sản phẩm:</th>
                               <th>Số lượng:</th>
                               <th>Trạng thái:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>abc@gmail.com</td>
                                <td>mv001</td>
                                <td>15</td>
                                <td>2</td>
                                <td>Đang chờ xử lý</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>abc@gmail.com</td>
                                <td>mv001</td>
                                <td>15</td>
                                <td>2</td>
                                <td>Đang chờ xử lý</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>abc@gmail.com</td>
                                <td>mv001</td>
                                <td>15</td>
                                <td>2</td>
                                <td>Đang chờ xử lý</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>abc@gmail.com</td>
                                <td>mv001</td>
                                <td>15</td>
                                <td>2</td>
                                <td>Đang chờ xử lý</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <a href="index.php?view_orders">
                        Xem tất cả đơn hàng <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
    <div class="panel">
        <div class="panel-body">
            <div class="mb-md thumb-info"><img src="admin_img/d1.jpg" class="rounded img-responsive">
                <!-- <div class="thumb-info-title">
                    <span class="thumb-info-inner"> Ngân Hà</span>
                    <span class="thumb-info-inner"> Ngân Hà</span>
                </div> -->
            </div>
            <!-- <div class="mb-md">
                <div class="widget-content-expanded">
                    <i class="fa fa-user"></i><span> Email:</span> nganha@gmail.com
                </div>
            </div> -->
        </div>
    </div>
    </div>
</div>

<?php count_product(); ?>