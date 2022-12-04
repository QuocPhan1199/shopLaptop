<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
     <link rel="stylesheet" href="css/admin_style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div id="wrapper">
        <?php include("includes/sidebar.php"); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php
                   if(isset($_GET['dashboard'])){
                       include("dashboard.php");
                   }
                   if(isset($_GET['insert_products'])){
                       include("insert_products.php");
                   }
                   if(isset($_GET['view_products'])){
                       include("view_products.php");
                   }
                   if(isset($_GET['insert_categories'])){
                    include("insert_categories.php");
                   }
                   if(isset($_GET['view_categories'])){
                    include("view_categories.php");
                   }
                   if(isset($_GET['delete_products'])){
                    include("delete_products.php");
                   }
                   if(isset($_GET['edit_products'])){
                    include("edit_products.php");
                   }
                   if(isset($_GET['delete_categories'])){
                    include("delete_categories.php");
                   }
                   if(isset($_GET['edit_categories'])){
                    include("edit_categories.php");
                   }
                   if(isset($_GET['insert_slides'])){
                    include("insert_slides.php");
                    }
                   if(isset($_GET['view_slides'])){
                    include("view_slides.php");
                   }
                   if(isset($_GET['delete_slides'])){
                    include("delete_slides.php");
                   }
                   if(isset($_GET['view_orders'])){
                   include('view_orders.php');
                  }
                  if(isset($_GET['view_customer'])){
                    include('view_customer.php');
                  }
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>