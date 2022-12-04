<?php 
   include("includes/db.php");
?>

<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-tachometer"></i> Quản lý / Danh mục
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title">
              <i class="fa fa-list"></i> Danh sách danh mục
            </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> Id: </th>
                                <th> Tên danh mục: </th>
                                <th> Nội dung: </th>
                                <th>Xóa:</th>
                                <th>Sửa:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                               $get_pro = "select * from categories";
                               $run_pro = mysqli_query($con,$get_pro);
                               while($row_pro=mysqli_fetch_array($run_pro)){
                                   $pro_cat_id = $row_pro['p_cat_id'];
                                   $pro_cat_title = $row_pro['p_cat_title'];
                                   $pro_cat_desc = $row_pro['p_cat_desc'];
                            ?>
                            <tr>
                                <td><?php echo $pro_cat_id; ?></td>
                                <td><?php echo $pro_cat_title; ?></td>
                                <td><?php echo $pro_cat_desc; ?></td>
                                <td>
                                    <a href="index.php?delete_categories=<?php echo $pro_cat_id; ?>">
                                      <i class="fa fa-trash-o"></i> Xóa
                                    </a>
                                </td>
                                <td>
                                <a href="index.php?edit_categories=<?php echo $pro_cat_id; ?>">
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
