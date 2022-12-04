<?php 
   include("includes/db.php");
?>


<div class="container-fluid">
           <!-- row strat -->
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-tachometer"></i> Quản lý / Thêm danh mục
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
                    <i class="fa fa-list fa-fw"></i> Thêm danh mục
                </h3>
            </div>

        <div class="panel-body">
         <!-- fomr Product -->
           <form method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-3 control-label">Tên danh mục</label>
                    <div class="col-md-6">
                        <input name="p_cat_title" type="text" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Nội dung</label>
                    <div class="col-md-6">
                        <textarea name="p_cat_desc" cols="19" rows="6" class="form-control" ></textarea>
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

    <script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>



<?php
    if(isset($_POST['submit'])){
        $p_cat_title = $_POST['p_cat_title'];
        $p_cat_desc = $_POST['p_cat_desc'];
        $insert_category = "insert into categories (p_cat_title,p_cat_desc) values('$p_cat_title','$p_cat_desc')";
        
        $run_category = mysqli_query($con,$insert_category);

        if($run_category){
             echo "<script>alert('Thêm sản phẩm thành công!')</script>";
             echo "<script>window.open('index.php?view_categories','_self')</script>";
        }
    }

?>

