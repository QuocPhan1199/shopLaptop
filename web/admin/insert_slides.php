<?php include("includes/db.php");
include("function.php");
?>
<div class="container-fluid">
    <!-- row strat -->
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-tachometer"></i> Quản lý / Thêm slides
                </li>
            </ol>
        </div>
    </div>

    <!-- row start -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Thêm slides
                    </h3>
                </div>

                <div class="panel-body">
                    <!-- fomr Product -->
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Chọn slide</label>
                            <div class="col-md-6">
                                <input name="slide_img" type="file" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input name="submit" value="Thêm" type="submit" class="btn btn-primary form-control">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
if (isset($_POST['submit'])) {
    $path = uploadFile($_FILES["slide_img"], 'slide_img');
    $sql = "insert into slides (slide_img) values ('$path')";
    $run_slide = mysqli_query($con, $sql);
    if ($run_slide) {
        echo "<script>alert('Thêm slide mới thành công!')</script>";
    }
}




?>