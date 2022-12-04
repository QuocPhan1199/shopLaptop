<!-- Parent Panel Begins -->
<div class="panel panel-default sidebar-menu">
    <!-- Panel Heading Begins -->
    <div class="panel-heading">
        <?php 
        
        $customer_session = $_SESSION['email'];
        
        $get_customer = "select * from khachhang where email='$customer_session'";
        
        $run_customer = mysqli_query($con,$get_customer);
        
        $row_customer = mysqli_fetch_array($run_customer);
        
        $customer_name = $row_customer['ten_khach_hang'];
        
        if(!isset($_SESSION['email'])){
            
            
            
        }else{
            
            echo "
            
                
                <h3 class='panel-title' align='center'>
                
                    Tên: $customer_name
                
                </h3>
            
            ";
            
        }
        
        ?>
    </div>
    <!-- Panel Heading Ends -->
    
    <!-- Panel Body Begins -->
    <div class="panel-body">
        <!-- Panel Nav Pills/Stacked Begins -->
        <ul class="nav-pills nav-stacked nav">
            <!-- li for Nav Pill Begins -->
            <li class="<?php if(isset($_GET['my_orders'])){ echo "active"; }?>">
                <a href="my_account.php?my_orders">
                    <i class="fa fa-list"></i>&nbsp;&nbsp;Đơn mua
                </a>
            </li>
            
            
        
            <!-- nhưng phần sửa pass thì ok -- cái $_GET['them_thong_tin']) là lấy trên url -- Anh hiểu rồi vì trên url ko có cái id của khách hàng nên hắn thêm vô em xem cái if dưới ni này -->
<!-- Chỗ ni này  đợi anh tí nghe để anh coi lại phần của anh đã  phần anh có trong ni nì để em bấm đây đã -- anh biết rồi để anh-->
            <li class="<?php if(isset($_GET['them_thong_tin'])){ echo "active"; }?>">
                <a href="my_account.php?them_thong_tin">
                    <i class="fa fa-pencil"></i>&nbsp;&nbsp;Sửa
                </a>
            </li>
            
            
            <li class="<?php if(isset($_GET['doimatkhau'])){ echo "active"; }?>">
                <a href="my_account.php?doimatkhau">
                    <i class="fa fa-key"></i>&nbsp;&nbsp;Đổi mật khẩu
                </a>
            </li>
            

            <!-- <li class="<?php if(isset($_GET['delete_account'])){ echo "active"; }?>">
                <a href="my_account.php?delete_account">
                    <i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete Account
                </a>
            </li> -->
            
            
            <li>
                <a href="../signin.php">
                    <i class="fa fa-sign-out"></i>&nbsp;&nbsp;Đăng xuất
                </a>
            </li>
            
            <!-- li for Nav Pill Ends -->
        </ul>
        <!-- Panel Nav Pills/Stacked Ends -->
    </div>
    <!-- Panel Body Ends -->
</div>
<!-- Parent Panel Ends -->