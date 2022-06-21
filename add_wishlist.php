<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "root123456", "group_15") // 建立MySQL的資料庫連結
    or die("無法開啟MySQL資料庫連結!<br>");
    // 送出編碼的MySQL指令
    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
    $id = $_GET['id'];
    if($_SESSION['account'] != null){
        $account = $_SESSION['account'];
        if ($result = mysqli_query($link, "SELECT * FROM products where id='$id'")) {
            while ($row = mysqli_fetch_assoc($result)) {
                $pid = "$row[id]";
                $name = "$row[name]";
                $price = "$row[price]";
            }
            
        }
        $sql = "INSERT INTO `wishlist`(`id`, `account`, `pid`, `name`, `price`) VALUE (NULL, '$account', '$pid', '$name', '$price')";
        $result = mysqli_query($link,$sql);
        $_SESSION['message'] = '成功加入願望清單';
        echo '<meta http-equiv=REFRESH CONTENT=0.1;url=index.php>';
        mysqli_free_result($result); // 釋放佔用的記憶體
        mysqli_close($link); // 關閉資料庫連結  
    }
    else{
        $_SESSION['message'] = '必須要登入';
		echo '<meta http-equiv=REFRESH CONTENT=0.1;url=index.php>';
    }
?>