<?php 
   include("includes/db.php");
   include("function.php");
?>

<div class="container-fluid">
           <!-- row strat -->
<div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-tachometer"></i> Quản lý / Thêm sản phẩm
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
                    <i class="fa fa-tasks fa-fw"></i> Thêm sản phẩm
                </h3>
            </div>

        <div class="panel-body">
         <!-- fomr Product -->
           <form method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-3 control-label">Tên sản phẩm</label>
                    <div class="col-md-6">
                        <input name="product_title" type="text" class="form-control" required>
                    </div>
                </div>
                

         <!-- fomr Category -->
                 
                <div class="form-group">
                   <label class="col-md-3 control-label">Lựa chọn danh mục</label>
                    <div class="col-md-6">
                        <select name="product_cat" class="form-control">
                            <option> Chọn danh mục sản phẩm</option>
                                <?php
                                    $get_p_cats = "select * from categories";
                                    $run_p_cats = mysqli_query($con,$get_p_cats);
                                    
                                    while($row_p_cats = mysqli_fetch_array($run_p_cats)){
                                        $p_cat_id = $row_p_cats['p_cat_id'];
                                        $p_cat_title = $row_p_cats['p_cat_title'];

                                        echo"<option value='$p_cat_id'>$p_cat_title</option>";
                                    }
                                ?>
                        </select>
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-md-3 control-label">Ảnh thứ nhất</label>
                    <div class="col-md-6">
                        <input name="product_img1" type="file" class="form-control" required>
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-md-3 control-label">Ảnh thứ hai</label>
                    <div class="col-md-6">
                        <input name="product_img2" type="file" class="form-control" required>
                    </div>
                </div>
              
                <div class="form-group">
                    <label class="col-md-3 control-label">Ảnh thứ ba</label>
                        <div class="col-md-6">
                            <input name="product_img3" type="file" class="form-control" required>
                        </div>
                </div>
               
                <div class="form-group">
                    <label class="col-md-3 control-label">Giá</label>
                    <div class="col-md-6">
                        <input name="product_price" type="text" class="form-control" required>
                    </div>
                </div>
              
                <!-- <div class="form-group">
                    <label class="col-md-3 control-label">Từ khóa sản phẩm</label>
                        <div class="col-md-6">
                            <input name="product_keywords" type="text" class="form-control" required>
                        </div>
                </div> -->
             
                <div class="form-group">
                    <label class="col-md-3 control-label">Nội dung sản phẩm</label>
                    <div class="col-md-6">
                        <textarea name="product_desc" cols="19" rows="6" class="form-control" ></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Trạng thái sản phẩm</label>
                        <div class="col-md-6">
                            <input name="product_stt" type="text" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Giá sale</label>
                        <div class="col-md-6">
                            <input name="product_price_sale" type="text" class="form-control">
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
        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        // $product_price = $_POST['product_price'];
        $product_keywords = $_POST['product_keywords'];
        $product_desc = $_POST['product_desc'];
        $product_price = $_POST['product_price'];
        $product_stt = $_POST['product_stt'];
        $product_price_sale = $_POST['product_price_sale'];
        
        $product_img1 = uploadFile($_FILES['product_img1'],'product_img');
        $product_img2 = uploadFile($_FILES['product_img2'],'product_img');
        $product_img3 = uploadFile($_FILES['product_img3'],'product_img');

       
        
        $insert_product = "INSERT INTO products (p_cat_id,product_title, product_img1, product_img2, product_img3, product_price, product_desc, product_stt, product_price_sale)
        VALUES ('$product_cat','$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$product_stt','$product_price_sale')";
        
        $run_product = mysqli_query($con,$insert_product);
        if($run_product){
            echo "<script>alert('thành công')</script>";
             echo "<script>window.open('index.php?insert_products','_self')</script>";
        }
    }

?>

