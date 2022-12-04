<?php 
   include("includes/db.php");
   include("function.php"); 
?>

<?php
   if(isset($_GET['edit_products'])){
       $edit_id = $_GET['edit_products'];
       $get_p = "select * from products where product_id='$edit_id'";
       $run_edit = mysqli_query($con,$get_p);
       $row_edit = mysqli_fetch_array($run_edit);
       $p_id = $row_edit['product_id'];
       $p_cat = $row_edit['p_cat_id'];
       $p_title = $row_edit['product_title'];
       $p_image1 = $row_edit['product_img1'];
       $p_image2 = $row_edit['product_img2'];
       $p_image3 = $row_edit['product_img3'];
       $p_price = $row_edit['product_price'];
       $p_desc = $row_edit['product_desc'];
       $p_stt = $row_edit['product_stt'];
       $p_price_sale = $row_edit['product_price_sale'];
   }
   $get_p_cat = "select * from categories where p_cat_id='$p_cat'";
   $run_p_cat = mysqli_query($con,$get_p_cat);
   $row_p_cat = mysqli_fetch_array($run_p_cat);
   $p_cat_title = $row_p_cat['p_cat_title'];



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
                    <i class="fa fa-money fa-fw"></i> Thêm sản phẩm
                </h3>
            </div>

        <div class="panel-body">
         <!-- fomr Product -->
           <form method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-3 control-label">Tên sản phẩm</label>
                    <div class="col-md-6">
                        <input name="product_title" value="<?php echo $p_title; ?>" type="text" class="form-control" required>
                    </div>
                </div>
                

         <!-- fomr Category -->
                 
                <div class="form-group">
                   <label class="col-md-3 control-label">Lựa chọn danh mục</label>
                    <div class="col-md-6">
                        <select name="product_cat" class="form-control">
                            <option value="<?php echo $p_cat; ?>"> <?php echo $p_cat_title; ?></option>
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
                        <input value="<?php echo $p_img1; ?>" name="product_img1" type="file" class="form-control" >
                        <br>
                        <img width="15%" src="<?php echo $p_image1 ?>" alt="<?php echo $p_title ?>">
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-md-3 control-label">Ảnh thứ hai</label>
                    <div class="col-md-6">
                        <input value="<?php echo $p_img2; ?>" name="product_img2" type="file" class="form-control">
                        <br>
                        <img width="15%" src="<?php echo $p_image2 ?>" alt="<?php echo $p_title ?>">
                    </div>
                </div>
              
                <div class="form-group">
                    <label class="col-md-3 control-label">Ảnh thứ ba</label>
                        <div class="col-md-6">
                            <input value="<?php echo $p_img3; ?>" name="product_img3" type="file" class="form-control" >
                            <br>
                            <img width="15%" src="<?php echo $p_image3 ?>" alt="<?php echo $p_title ?>">
                        </div>
                </div>
               
                <div class="form-group">
                    <label class="col-md-3 control-label">Giá</label>
                    <div class="col-md-6">
                        <input value="<?php echo $p_price; ?>" name="product_price" type="text" class="form-control" required>
                    </div>
                </div>
              
                <!-- <div class="form-group">
                    <label class="col-md-3 control-label">Từ khóa sản phẩm</label>
                        <div class="col-md-6">
                            <input value="<?php echo $p_keywords; ?>" name="product_keywords" type="text" class="form-control" required>
                        </div>
                </div> -->
             
                <div class="form-group">
                    <label class="col-md-3 control-label">Nội dung sản phẩm</label>
                    <div class="col-md-6">
                        <textarea name="product_desc" cols="19" rows="6" class="form-control" required>
                            <?php echo $p_desc; ?>
                        </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Trạng thái sản phẩm</label>
                        <div class="col-md-6">
                            <input value="<?php echo $p_stt; ?>" name="product_stt" type="text" class="form-control">
                        </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Giá sale</label>
                        <div class="col-md-6">
                            <input value="<?php echo $p_price_sale; ?>" name="product_price_sale" type="text" class="form-control">
                        </div>
                </div>
               
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-6">
                        <input name="update" value="Sửa" type="submit" class="btn btn-primary form-control">
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
    if(isset($_POST['update'])){

        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $product_price = $_POST['product_price'];
      
        $product_desc = $_POST['product_desc'];
        $product_stt = $_POST['product_stt'];
        $product_price_sale = $_POST['product_price_sale'];
        $product_img1 = $p_image1;
        $product_img2 = $p_image2;
        $product_img3 = $p_image3;
        if($_FILES['product_img1']['tmp_name'] != "")
        {
            $product_img1 = uploadFile($_FILES['product_img1'],'product_img') ;
        }
        if($_FILES['product_img2']['tmp_name'] != "")
        {
            $product_img2 = uploadFile($_FILES['product_img2'],'product_img') ;
        }
        if($_FILES['product_img3']['tmp_name'] != "")
        {
            $product_img3 = uploadFile($_FILES['product_img3'],'product_img') ;
        }
        $update_product = "update products set p_cat_id='$product_cat',
            product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',
            product_img3='$product_img3',product_price='$product_price',
            product_desc='$product_desc' ,product_stt='$product_stt',product_price_sale='$product_price_sale'
            where product_id='$p_id'";
        $run_product = mysqli_query($con,$update_product);
        if($run_product){
            echo "<script>alert('Sửa sản phẩm thành công')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
        
        
    }

?>

