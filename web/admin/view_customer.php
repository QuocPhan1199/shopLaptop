<?php
include('../libs/database.php');
?>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h1 style="text-align: center;">Thông Tin Quản Lý Khách Hàng</h1>
				<form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo tên">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Họ & Tên</th>
							<th>Email</th>
							<th>Ngáy Sinh</th>
							<th>Giới Tính</th>
							<th>Địa Chỉ</th>
							<th>Số Điện Thoại</th>
							<th width="60px"></th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
<?php
if (isset($_GET['s']) && $_GET['s'] != '') {
	$sql = 'select * from khachhang where ten_khach_hang like "%'.$_GET['s'].'%"';
} else {
	$sql = 'select * from khachhang';
}

$studentList = db_execute($sql);

$index = 1;
foreach ($studentList as $std) {
	echo '<tr>
			<td>'.($index++).'</td>
			<td>'.$std['ten_khach_hang'].'</td>
			<td>'.$std['email'].'</td>
			<td>'.$std['ngay_sinh'].'</td>
			<td>'.$std['gioi_tinh'].'</td>
			<td>'.$std['dia_chi'].'</td>
			<td>'.$std['so_dt'].'</td>
			<td><button class="btn btn-warning" onclick=\'window.open("edit_customer.php?ma_khach_hang='.$std['ma_khach_hang'].'","_self")\'>Edit</button></td>
			<td><button class="btn btn-danger" onclick="deleteKhachhang('.$std['ma_khach_hang'].')">Delete</button></td>
		</tr>';
}
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function deleteKhachhang(ma_khach_hang) {
			option = confirm('Bạn có muốn xoá khách hàng này không')
			if(!option) {
				return;
			}

			console.log(ma_khach_hang)
			$.post('delete_customer.php', {
				'ma_khach_hang': ma_khach_hang,
				'action':'delete' 
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
	</script>
