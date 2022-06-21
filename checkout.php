<?php
	session_start();
	$account = $_SESSION['account'];
	//user needs to login to checkout
	if($_SESSION['account']!=NULL){
		$link = mysqli_connect("localhost", "root", "root123456", "group_15") // 建立MySQL的資料庫連結
		or die("無法開啟MySQL資料庫連結!<br>");
		mysqli_query($link, 'SET CHARACTER SET utf8');
		mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
		if ($result = mysqli_query($link, "SELECT * FROM cart WHERE account like '$account'")) {

			$sql = "INSERT INTO `purchase`(`pno`, `account`, `pid`, `name`, `price`, `qty`, `time`) 
					SELECT null, account, pid, name, price, qty, time FROM cart WHERE account like '$account'";
			$result = mysqli_query($link,$sql);
			unset($_SESSION['cart']);
			$_SESSION['message'] = '購買成功';
			echo '<meta http-equiv=REFRESH CONTENT=0.5;url=index.php>';
			mysqli_free_result($result); // 釋放佔用的記憶體
		}

		
		mysqli_close($link);
		
		
	}
	else{
		$_SESSION['message'] = '必須要登入';
		echo '<meta http-equiv=REFRESH CONTENT=0.5;url=cart.php>';
	}
?>