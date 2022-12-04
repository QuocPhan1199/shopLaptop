<?php include("includes/db.php") ?>
<?php
   if(isset($_GET['delete_products'])){
       $delete_id = $_GET['delete_products'];
       $delete_pro = "delete from products where product_id='$delete_id'";
       $run_delete = mysqli_query($con,$delete_pro);
       if($run_delete){
           echo "<script>window.open('index.php?view_products','_self')</script>";
       }
   }


?>