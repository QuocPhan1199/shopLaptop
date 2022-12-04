
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

		if (!empty($ten_khach_hang)) {
			if ($ma_khach_hang == '') {
				$sql = 'INSERT INTO khachhang(ten_khach_hang, email, mat_khau, ngay_sinh, gioi_tinh, dia_chi, so_dt) VALUES ("'.$ten_khach_hang.'", "'.$email.'", "'.$mat_khau.'", "'.$ngay_sinh.'", "'.$gioi_tinh.'", "'.$dia_chi.'", "'.$so_dt.'")';
			}else {
				$sql ='UPDATE khachhang SET ten_khach_hang = "'.$ten_khach_hang.'", email = "'.$email.'", ngay_sinh = "'.$ngay_sinh.'", gioi_tinh = "'.$gioi_tinh.'", dia_chi = "'.$dia_chi.'" , so_dt = "'.$so_dt.'" WHERE ma_khach_hang = '.$ma_khach_hang;
			}
			db_execute($sql);

			//ko em chỉ thêm head với header vô thôi
			// cái database vẫn giống ry à ừmhèn
			die();
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
			if ($gioi_tinh=="Nữ")
		 	{
				$option = '<option>Nam</option>
							<option selected ="true">Nữ</option>';
		 	}
			else 
			{
				$option = '<option selected="true">Nam</option>
						   	<option>Nữ</option>';
		 	}
			$dia_chi     = $khachhang['dia_chi'];
	 		$so_dt     = $khachhang['so_dt'];
		}
	}
				

?>

         <h1 align="center">Sửa tài khoản</h1>
			<form method="post" >
				<div class="panel-body">
					<div class="form-group">
					  <label for="usr">Họ Và Tên:</label>
					  <input type="text" name="ma_khach_hang" value="<?= $ma_khach_hang ?>" hidden="true">
					  <input required="true" type="text" class="form-control" name="ten_khach_hang" value="<?=$ten_khach_hang?>">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input required="true" type="email" class="form-control" name="email" value="<?=$email?>" readonly>
					</div>
					<div class="form-group" >
					  <label for="birthday">Ngày Sinh:</label>
					  <input type="date" class="form-control" name="ngay_sinh" value="<?=$ngay_sinh?>">
					</div>
					<div class="form-group">
					  <label for="confirmation_pwd">Giới Tính</label>
					  <select name="gioi_tinh" >
					  	<?=$option?>
					  </select>
					</div>
					<div class="form-group">
					  <label for="address">Địa Chỉ:</label>
					  <input type="text" class="form-control" name="dia_chi" value="<?=$dia_chi?>">
					</div>
					<div class="form-group">
					  <label for="sodt">Số Điện Thoại:</label>
					  <input type="text" class="form-control" name="so_dt" value="<?=$so_dt?>">
					</div>
					<button class="btn btn-success" onclick="return confirm('Bạn đã thay đổi thông tin thành công');">Save</button>
					
				</div>
			</form>

