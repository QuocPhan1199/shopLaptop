<?php include("includes/db.php") ?>
<?php
   if(isset($_GET['delete_categories'])){
       $delete_p_cat_id = $_GET['delete_categories'];
       $delete_p_cat = "delete from categories where p_cat_id='$delete_p_cat_id'";
       $run_delete = mysqli_query($con,$delete_p_cat);
       if($run_delete){
           echo "<script>window.open('index.php?view_categories','_self')</script>";
       }
   }
?>