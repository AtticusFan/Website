<?php
	session_start();
    $link = mysqli_connect("localhost", "root", "root123456", "group_15") // 建立MySQL的資料庫連結
    or die("無法開啟MySQL資料庫連結!<br>");
    // 送出編碼的MySQL指令
    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
    $account = $_SESSION['account'];
    if($account != null){
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = Array();
        }
        
        $id = $_GET['id'];//商品ID
        
        //若商品未在購物車中,則加入購物車(陣列)
        if (!in_array($id,$_SESSION['cart'])){
            
            if ($result = mysqli_query($link, "SELECT * FROM products where id='$id'")) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $pid = "$row[id]";
                    $name = "$row[name]";
                    $price = "$row[price]";
                }
                
            }
            $sql = "INSERT INTO `cart`(`cartno`, `account`, `pid`, `name`, `price`, `qty`, `time`) VALUE (NULL, '$account', '$pid', '$name', '$price', 1, NOW())";
            $result = mysqli_query($link,$sql);
            mysqli_free_result($result); // 釋放佔用的記憶體
            mysqli_close($link); // 關閉資料庫連結
            $_SESSION['cart'][]=$id;//加入陣列
            $_SESSION['message'] = '商品加入成功';
        //echo '<meta http-equiv=REFRESH CONTENT=0.5;url= detail.php?id=$id>';
        }
        else{
            $_SESSION['message'] = '商品已在購物車';
            //echo '<meta http-equiv=REFRESH CONTENT=0.5;url= detail.php?id=$id>';
        }
    }
    else{
        $_SESSION['message'] = '必須要登入';
    }
    header('location: index.php');
?>