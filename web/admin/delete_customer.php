<?php
include('../libs/database.php'); 
	if(!empty($_POST)){
		if(isset($_POST['action'])){
			$action = $_POST['action'];
			switch ($action) {
				case 'delete':

					if(isset($_POST['ma_khach_hang'])){
						$ma_khach_hang = $_POST['ma_khach_hang'];
						
						if($ma_khach_hang == 40){
							echo 'Không Thể Xóa Admin';
							die();
						}
						else{
							$sql = "DELETE FROM khachhang WHERE ma_khach_hang=".$ma_khach_hang;
						db_execute($sql);
						}
						
					}
					break;
			}
		}
	}
 ?>