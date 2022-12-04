<?php 
	include('libs/database.php');
	db_connect();
	if(isset($_POST['Register']) && $_POST['hoten']!='' && $_POST['email']!='' && $_POST['password']!='' && $_POST['re_password'] !=''){
		//Thuc hien xu ly nguoi dung an nut sumbit va dien day du thong tin
		$hoten = $_POST['hoten'];
		$Email = $_POST['email'];
		$Password = $_POST['password'];
		$Repassword = $_POST['re_password'];
		if($Password != $Repassword){
			header('location:register.php');
			die();
		}
		$sql = "SELECT * FROM khachhang where email = '$Email'";
		$old = mysqli_query($conn, $sql);
		$Password = md5($Password);
		if(mysqli_num_rows($old) > 0){
			header('location:register.php');
			die();
		}
		$sql = "INSERT INTO khachhang(ten_khach_hang, email, mat_khau) VALUES ('$hoten','$Email','$Password')";
		db_execute($sql);
		header('location:signin.php');
	}
	else{
		header('location:register.php');
	}	
 ?>	
