<?php
include('../libs/database.php');
        $ma_khach_hang = $ten_khach_hang = $email = $mat_khau = $ngay_sinh = $gioi_tinh = $dia_chi = $so_dt = '';
		if (!empty($_POST)) {
		if (isset($_POST['ten_khach_hang'])) {
			$ten_khach_hang = $_POST['ten_khach_hang'];
			$ten_khach_hang = str_replace('"', '\\"', $ten_khach_hang);
		}
		 if (isset($_POST['ma_khach_hang'])) {
			$ma_khach_hang = $_POST['ma_khach_hang'];
			$ma_khach_hang = str_replace('"', '\\"', $ma_khach_hang);
		}
		if (isset($_POST['email'])) {
			$email = $_POST['email'];
			$email = str_replace('"', '\\"', $email);
		}
		if (isset($_POST['ngay_sinh'])) {
			$ngay_sinh = $_POST['ngay_sinh'];
			$ngay_sinh = str_replace('"', '\\"', $ngay_sinh);
		}
		if (isset($_POST['gioi_tinh'])) {
			$gioi_tinh = $_POST['gioi_tinh'];
			$gioi_tinh = str_replace('"', '\\"', $gioi_tinh);
		}
		if (isset($_POST['dia_chi'])) {
			$dia_chi = $_POST['dia_chi'];
			$dia_chi = str_replace('"', '\\"', $dia_chi);
		}
		if (isset($_POST['so_dt'])) {
			$so_dt = $_POST['so_dt'];
			$so_dt = str_replace('"', '\\"', $so_dt);
		}
	}	
	if (isset($_SESSION['ma'])) {
		$ma_khach_hang = $_SESSION['ma'];
		$sql     = 'select * from khachhang where ma_khach_hang = '.$ma_khach_hang;
		$khachhang = executeSingleResult($sql);
	 	if ($khachhang != null) {
			$ten_khach_hang  = $khachhang['ten_khach_hang'];
			$email       = $khachhang['email'];
			$ngay_sinh = $khachhang['ngay_sinh'];
			$gioi_tinh     = $khachhang['gioi_tinh'];
			$dia_chi     = $khachhang['dia_chi'];
	 		$so_dt     = $khachhang['so_dt'];
		}
	}			

?>
            <center>
                <p class="lead">Tài khoản</p>            
            </center>
			<form method="post" >
				<div class="panel-body">
					<div class="form-group">
					  <label for="usr">Họ Và Tên:</label>
					  <input type="text" name="ma_khach_hang" value="<?= $ma_khach_hang ?>" hidden="true">
					  <input required="true" type="text" class="form-control" name="ten_khach_hang" value="<?=$ten_khach_hang?>"readonly>
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input required="true" type="email" class="form-control" name="email" value="<?=$email?>" readonly>
					</div>
					<div class="form-group" >
					  <label for="birthday">Ngày Sinh:</label>
					  <input type="date" class="form-control" name="ngay_sinh" value="<?=$ngay_sinh?>"readonly>
					</div>
					<div class="form-group">
					  <label for="confirmation_pwd">Giới Tính:</label>
					  <input type="text" class="form-control" name="gioi_tinh" value="<?=$gioi_tinh?>"readonly style="width: 60px;">
					</div>
					<div class="form-group">
					  <label for="address">Địa Chỉ:</label>
					  <input type="text" class="form-control" name="dia_chi" value="<?=$dia_chi?>"readonly>
					</div>
					<div class="form-group">
					  <label for="sodt">Số Điện Thoại:</label>
					  <input type="text" class="form-control" name="so_dt" value="<?=$so_dt?>"readonly>
					</div>
				
					
				</div>
			</form>

