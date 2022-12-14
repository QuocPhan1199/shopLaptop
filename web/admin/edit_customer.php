<?php session_start(); ?>
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
			header('Location:index.php?view_customer');
			die();
		}
	}

	if (isset($_GET['ma_khach_hang'])) {
		$ma_khach_hang = $_GET['ma_khach_hang'];
		$sql     = 'SELECT * from khachhang where ma_khach_hang = '.$ma_khach_hang;
		$khachhang = executeSingleResult($sql);
		if ($khachhang != null) {
			$ten_khach_hang  = $khachhang['ten_khach_hang'];
			$email       = $khachhang['email'];
			$ngay_sinh = $khachhang['ngay_sinh'];
			$gioi_tinh     = $khachhang['gioi_tinh'];
			if ($gioi_tinh=="N???")
		 	{
				$option = '<option>Nam</option>
							<option selected ="true">N???</option>';
		 	}
			else 
			{
				$option = '<option selected="true">Nam</option>
						   	<option>N???</option>';
		 	}
			$dia_chi     = $khachhang['dia_chi'];
			$so_dt     = $khachhang['so_dt'];
		}
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>S???a Th??ng Tin C?? Nh??n</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">S???a Th??ng Tin C?? Nh??n</h2>
			</div>
			<form method="post" >
				<div class="panel-body">
					<div class="form-group">
					  <label for="usr">H??? V?? T??n:</label>
					   <input type="text" name="ma_khach_hang" value="<?=$ma_khach_hang?>" hidden=
					   "true">
					  <input required="true" type="text" class="form-control" id="usr" name="ten_khach_hang" value="<?=$ten_khach_hang?>">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input required="true" type="email" class="form-control" id="email" name="email" value="<?=$email?>" readonly>
					</div>
					<div class="form-group" >
					  <label for="birthday">Ng??y Sinh:</label>
					  <input type="date" class="form-control" id="birthday" name="ngay_sinh" value="<?=$ngay_sinh?>">
					</div>
					<div class="form-group">
					  <label for="confirmation_pwd">Gi???i T??nh</label>
					  <select name="gioi_tinh" >
					  	
					  	<?=$option?>
					  </select>
					</div>
					<div class="form-group">
					  <label for="address">?????a Ch???:</label>
					  <input type="text" class="form-control" id="address" name="dia_chi" value="<?=$dia_chi?>">
					</div>
					<div class="form-group">
					  <label for="sodt">S??? ??i???n Tho???i:</label>
					  <input type="text" class="form-control" id="sodt" name="so_dt" value="<?=$so_dt?>">
					</div>
					<button class="btn btn-success">Save</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>


