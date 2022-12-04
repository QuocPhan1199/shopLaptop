<?php include("includes/db.php"); ?>

<?php 
    $db = mysqli_connect("localhost","root","","shop");

    function count_product(){
        global $db;
        $get_count_product="select count('product_id') from products";
        $run_count_product=mysqli_query($db,$get_count_product);
        $count=mysqli_fetch_array($run_count_product);
        echo "$count[0]";
    }

    function count_category(){
        global $db;
        $get_count_category = "select count('p_cat_id') from categories";
        $run_count_category = mysqli_query($db,$get_count_category);
        $count = mysqli_fetch_array($run_count_category);
        echo "$count[0]";
    }

    function count_customer(){
        global $db;
        $get_count_customer = "select count('ma_khach_hang') from khachhang";
        $run_count_customer = mysqli_query($db,$get_count_customer);
        $count = mysqli_fetch_array($run_count_customer);
        echo "$count[0]";
    }
    function uploadFile($file,$folder){
     
        $target_file = $folder.'/' . basename($file["name"]);
        $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowd_file_ext = array("jpg", "jpeg", "png");
        if (!file_exists($file["tmp_name"])) {
            return false;
        } else if (!in_array($imageExt, $allowd_file_ext)) {
            return false;          
        } else if ($file["size"] > 2097152) {
            return false;
            
        }else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                echo "<script>alert('Thêm slide mới thất bại!')</script>";
            }
        }
    }
?>