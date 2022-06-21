<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "root123456", "group_15") // 建立MySQL的資料庫連結
    or die("無法開啟MySQL資料庫連結!<br>");
    // 送出編碼的MySQL指令
    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
    $pno = $_GET['id'];
    if($_SESSION['account'] != null){
        if ($result = mysqli_query($link, "SELECT * FROM purchase where pno='$pno'")) {
            while ($row = mysqli_fetch_assoc($result)) {
                $account = "$row[account]";
                $name = "$row[name]";
                $price = "$row[price]";
                $qty = "$row[qty]";
            }
            
        }
        $sql = "INSERT INTO `deliever`(`delieverno`, `account`, `name`, `price`, `qty`) VALUE (NULL, '$account', '$name', '$price', '$qty')";
        
        $result = mysqli_query($link,$sql);
        $sql = "DELETE FROM purchase WHERE pno ='$pno'";
        $result = mysqli_query($link,$sql);
        $_SESSION['message'] = '出貨成功！！';
        echo '<meta http-equiv=REFRESH CONTENT=0.1;url=manage_order.php>';
        mysqli_free_result($result); // 釋放佔用的記憶體
        mysqli_close($link); // 關閉資料庫連結  
    }
    else{
        $_SESSION['message'] = '必須要登入';
		echo '<meta http-equiv=REFRESH CONTENT=0.1;url=index.php>';
    }
?>