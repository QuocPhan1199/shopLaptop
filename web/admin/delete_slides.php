<?php include("includes/db.php") ?>
<?php
   if(isset($_GET['delete_slides'])){
       $delete_slide_id = $_GET['delete_slides'];
       $delete_slide = "delete from slides where slide_id='$delete_slide_id'";
       $run_delete = mysqli_query($con,$delete_slide);
       if($run_delete){
           echo "<script>window.open('index.php?view_slides','_self')</script>";
       }
   }
?>