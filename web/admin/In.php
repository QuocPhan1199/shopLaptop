<!DOCTYPE html>
<html>
<head>
	<title>Chi tiết đơn hàng</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<?php 
			include('includes/db.php');
			$oder = mysqli_query($con, "SELECT bill.ten_nguoi_nhan, bill.dia_chi, bill.so_dt, products.product_title, products.product_price, products.product_price_sale, products.product_stt, pending_orders.*
				FROM bill 
				JOIN pending_orders ON bill.ma_khach_hang = pending_orders.ma_khach_hang 
				JOIN products ON products.product_id = pending_orders.product_id 
				WHERE bill.ma_bill = ".$_GET['id']);
			$oder = mysqli_fetch_all($oder,	MYSQLI_ASSOC);
	 ?>
	 	<div id="order-detail-wrapper">
	 		<div id="order-detail">
	 			<h1>Chi tiết đơn hàng</h1>
	 			<label>Người nhận: </label><span><?= $oder[0]['ten_nguoi_nhan']?></span><br/>
	 			<label>Điện thoại: </label><span><?=$oder[0]['so_dt']?></span><br/>
	 			<label>Địa chỉ: </label><span><?=$oder[0]['dia_chi']?></span><br/>
	 			<hr/>
	 			<h3>Danh sách sản phẩm</h3>
	 			<ul>
	 				<?php 
	 					$totalQuantity = 0;
	 					$totalMoney = 0;
	 					foreach ($oder as $row){
	 						?>
	 						<li>
	 							<span class="item-name"><?= $row['product_title'] ?></span>
	 							<span class="item-quantity">- SL: <?= $row['qty'] ?> sản phẩm</span>
	 						</li>
	 					<?php 

	 							if($row['product_stt'] == "sale"){
	 								$totalMoney += ($row['product_price_sale'] * $row['qty']);
	 								$totalQuantity +=  $row['qty'];
	 							}
	 							else{
	 								$totalMoney += ($row['product_price'] * $row['qty']);
	 								$totalQuantity +=  $row['qty'];
	 							}
	 					}
	 				 ?>
	 			</ul>
	 			<hr/>
	 			<label>Tổng SL: </label><?=$totalQuantity?> - <label>Tổng tiền:</label><?=$totalMoney?>.000đ
	 			<?php 
	 			// $run = mysqli_query($con,'DELETE FROM bill');
	 			// $sql = mysqli_query($con,'DELETE FROM pending_orders');

	 			// var_dump($sql);
	 			?>
	 		</div>
	 	</div>

</body>
</html>