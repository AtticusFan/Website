<?php
	session_start();
    $account = $_SESSION['account'];
	$pid = $_GET['id'];//商品ID

	$conn = new mysqli("localhost", "root", "root123456", "group_15");

    if ($conn->connect_error) {
        die('資料庫連線錯誤:' . $conn->connect_error);
    }

    $conn->query('SET NAMES UTF8');
    $conn->query('SET time_zone = "+8:00"');
    

    $sql = sprintf(
        "DELETE FROM cart WHERE pid = %d AND account like '$account'",$pid
      );
      $result = $conn->query($sql);
      if (!$result) {
        die($conn->error);
    }

	//remove the id from our cart array
	$key = array_search($_GET['id'], $_SESSION['cart']);	
	unset($_SESSION['cart'][$key]);

	unset($_SESSION['qty_array'][$_GET['index']]);
	//rearrange array after unset
	$_SESSION['qty_array'] = array_values($_SESSION['qty_array']);

	$_SESSION['message'] = "商品已刪除";
	header('location: cart.php');
?>