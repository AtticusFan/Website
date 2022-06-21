<?php
    session_start();
    $acctno = $_GET['id'];
    
    $conn = new mysqli("localhost", "root", "root123456", "group_15");

    if ($conn->connect_error) {
        die('資料庫連線錯誤:' . $conn->connect_error);
    }

    $conn->query('SET NAMES UTF8');
    $conn->query('SET time_zone = "+8:00"');
    

    $sql = sprintf(
        "DELETE FROM account WHERE acctno = %d",$acctno
      );
      $result = $conn->query($sql);
      if (!$result) {
        die($conn->error);
      }
      
    //$sql = "DELETE FROM wishlist WHERE pid = '$pid' AND account = '$account'";
    $_SESSION['message'] = "會員資料已刪除";
	header('location: manage_account.php');
?>