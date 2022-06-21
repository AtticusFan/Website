<?php
    session_start();
    $account = $_SESSION['account'];
    /*
    $link = mysqli_connect("localhost", "root", "root123456", "group_15") // 建立MySQL的資料庫連結
    or die("無法開啟MySQL資料庫連結!<br>");
    // 送出編碼的MySQL指令
    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
    */
    $pid = $_GET['id'];
    
    $conn = new mysqli("localhost", "root", "root123456", "group_15");

    if ($conn->connect_error) {
        die('資料庫連線錯誤:' . $conn->connect_error);
    }

    $conn->query('SET NAMES UTF8');
    $conn->query('SET time_zone = "+8:00"');
    

    $sql = sprintf(
        "DELETE FROM wishlist WHERE pid = %d AND account like '$account'",$pid
      );
      $result = $conn->query($sql);
      if (!$result) {
        die($conn->error);
      }
      
    //$sql = "DELETE FROM wishlist WHERE pid = '$pid' AND account = '$account'";
    $_SESSION['message'] = "商品已刪除";
	header('location: wishlist.php');
?>