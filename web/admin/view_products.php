<?php 
   include("includes/db.php");
?>

<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-tachometer"></i> Quản lý / Sản phẩm
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title">
              <i class="fa fa-tasks"></i> Danh sách sản phẩm
            </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> Id: </th>
                                <th> Tên sản phẩm: </th>
                                <th>Ảnh: </th>
                                <th>Giá:</th>
                                <th>Trạng thái:</th>
                                <th>Giá sale: </th>
                                <th>Thời gian: </th>
                                <th>Xóa:</th>
                                <th>Sửa:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                               $get_pro = "select * from products";
                               $run_pro = mysqli_query($con,$get_pro);
                               while($row_pro=mysqli_fetch_array($run_pro)){
                                   $pro_id = $row_pro['product_id'];
                                   $pro_title = $row_pro['product_title'];
                                   $pro_img1 = $row_pro['product_img1'];
                                   $pro_price = $row_pro['product_price'];
                                   $pro_price_sale = $row_pro['product_price_sale'];
                                   $pro_stt = $row_pro['product_stt'];
                                   $pro_date = $row_pro['date'];
                            ?>
                            <tr>
                                <td><?php echo $pro_id; ?></td>
                                <td><?php echo $pro_title; ?></td>
                                <td><img src="<?php echo $pro_img1; ?>" width="15%"></td>
                                <td><?php echo $pro_price; ?></td>
                                <td><?php echo $pro_stt; ?></td>
                                <td><?php echo $pro_price_sale; ?></td>
                                <td><?php echo $pro_date; ?></td>
                                <td>
                                    <a href="index.php?delete_products=<?php echo $pro_id; ?>">
                                      <i class="fa fa-trash-o"></i> Xóa
                                    </a>
                                </td>
                                <td>
                                <a href="index.php?edit_products=<?php echo $pro_id; ?>">
                                      <i class="fa fa-pencil"></i> Sửa
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
