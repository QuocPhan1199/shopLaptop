<?php 
   include("includes/db.php");
?>

<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-tachometer"></i>Quản Lý Hóa Đơn
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title">
              <i class="fa fa-list"></i> Danh sách hóa đơn
            </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> Id </th>
                                <th> Tên người nhận </th>
                                <th> Địa chỉ </th>
                                <th> Điện thoại</th>
                                <th>Ngày tạo</th>
                                <th>In đơn</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                               $get_od = "select * from bill";
                               $run_od = mysqli_query($con,$get_od);
                               while($row_od=mysqli_fetch_array($run_od)){
                                   $od_id = $row_od['ma_bill'];
                                   $ten_n_n = $row_od['ten_nguoi_nhan'];
                                   $dia_chi = $row_od['dia_chi'];
                                   $so_dt = $row_od['so_dt'];
                                   $create_time = $row_od['ngay_tao'];
                            ?>
                            <tr>
                                <td><?php echo $od_id; ?></td>
                                <td><?php echo $ten_n_n; ?></td>
                                <td><?php echo $dia_chi; ?></td>
                                <td><?php echo $so_dt; ?></td>
                                <td><?php echo $create_time; ?></td>
                                <td>
                                    <a href="In.php?id=<?= $od_id ?>" target="_blank">
                                      <i class="fa fa-trash-o"></i> In
                                    </a>
                                </td>
                                <td>
                                <a href="index.php?edit_categories=<?php echo $pro_cat_id; ?>">
                                      <i class="fa fa-pencil"></i> Xóa
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
