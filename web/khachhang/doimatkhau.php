<?php include('../libs/database.php'); ?>


    <?php 
        $ma_khach_hang = $password = $newpassword = $oldpassword = '';
        $error = '';
        if(isset($_SESSION['ma']))
        {
            $ma_khach_hang = $_SESSION['ma'];
        if(!empty($_POST))
        {
        if (isset($_POST['ma_khach_hang'])) 
        {
            $ma_khach_hang = $_POST['ma_khach_hang'];
            $ma_khach_hang = str_replace('"', '\\"', $ma_khach_hang);
        }
        if (isset($_POST['password'])) 
        {
            $password = $_POST['password'];
            $password = str_replace('"', '\\"', $password);
        }
        if (isset($_POST['newpassword'])) 
        {
            $newpassword = $_POST['newpassword'];
            $newpassword = str_replace('"', '\\"', $newpassword);
        }
        if (isset($_POST['oldpassword'])) 
        {
            $oldpassword = $_POST['oldpassword'];
            $oldpassword = str_replace('"', '\\"', $oldpassword);
        }
        $sql = 'SELECT * FROM khachhang WHERE ma_khach_hang ="'.$_POST['ma_khach_hang'].'" AND mat_khau = "'.md5($_POST['password']).'" ';
        $user = db_execute($sql);
        if(mysqli_num_rows($user) > 0)
        {
                if($newpassword == $oldpassword)
                {
                    
                    $sql = "UPDATE khachhang SET mat_khau ='".md5($_POST['newpassword'])."' WHERE ma_khach_hang = '".$_POST['ma_khach_hang']."' ";
                db_execute($sql);
                echo '<script language="javascript">'; 
                echo 'alert("Thay đổi thành công")'; 
                echo '</script>';
                ?>
                
                <?php
                }

                else{
                echo '<script language="javascript">'; 
                echo 'alert("Vui lòng nhập lại mật khẩu")'; 
                echo '</script>';
                }
        }
        else
            {
                echo '<script language="javascript">'; 
                echo 'alert("Vui lòng nhập lại mật khẩu")'; 
                echo '</script>';
            }

    }
 }    

     ?>
     <div class="login-page">
     <center>
    <p class="lead">Đổi mật khẩu</p>
  
</center>
        <div class="widget-shadow">
            <div class="login-body wow fadeInUp animated" data-wow-delay=".7s">
                <form id="form-dmk" method="post" action="">
                    <input type="text" name="ma_khach_hang" value="<?=$ma_khach_hang?>" hidden ="true">
                    <input type="password" id="password" name="password" class="lock" placeholder="Password">
                    <input type="password" id="newpassword" name="newpassword" class="lock" placeholder="Password">
                    <input type="password" id="oldpassword" name="oldpassword" class="lock" placeholder="Password">
                    <input type="submit" name="Sign_In" value="Thay Đổi">
                </form>
            </div>
        </div>
    </div>

    