<?php
    session_start();
    $pno = $_GET['id'];
    
    $conn = new mysqli("localhost", "root", "root123456", "group_15");

    if ($conn->connect_error) {
        die('資料庫連線錯誤:' . $conn->connect_error);
    }

    $conn->query('SET NAMES UTF8');
    $conn->query('SET time_zone = "+8:00"');
    

    $sql = sprintf(
        "DELETE FROM purchase WHERE pno = %d",$pno
      );
      $result = $conn->query($sql);
      if (!$result) {
        die($conn->error);
      }
      
    //$sql = "DELETE FROM wishlist WHERE pid = '$pid' AND account = '$account'";
    $_SESSION['message'] = "已刪除會員訂單";
	header('location: manage_order.php');
?>