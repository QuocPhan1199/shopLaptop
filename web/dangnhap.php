<?php 
	session_start();
	include('libs/database.php');
	db_connect();
	if(isset($_POST['Sign_In']) && $_POST['email'] !='' && $_POST['password'] !=''){
		$Email = $_POST['email'];
		$password = md5($_POST['password']);
		$sql = "SELECT * FROM khachhang WHERE email = '$Email' and mat_khau = '$password'";
		$user = mysqli_query($conn,$sql);
		$sess = mysqli_fetch_row($user);
		if(count($sess)){
			$_SESSION['ma'] =$sess[0];
			$_SESSION['fullname'] =$sess[1];
			$_SESSION['email'] = $sess[2];
			if($_SESSION['fullname'] == 'Admin' && $_SESSION['email'] == "admin@gmail.com"){
				header('location:Admin/index.php?dashboard');
			}
			else{
				header('location:index.php');
			if(isset($_POST['checkbox'])){
				setcookie('user',$Email,time()+3600,'/','',0,0);
				setcookie('pass',($_POST['password']),time()+3600,'/','',0,0);
			}
		}
		}
		else{
			header('location:signin.php');
		}
	}else{
		header('location:signin.php');
	}

 ?>
