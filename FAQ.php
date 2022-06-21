<!--購物車-->
<?php
	session_start();
    if (isset($_SESSION['cart'])) {
        $cnt = count($_SESSION['cart']);
    } else {
        $cnt = 0;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>有點雜貨店</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--js-->
    <script src="js/custom.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <style>
        #question{
            font-size: x-large;
        }
    </style>
</head>
<body>
 <!--導覽頁-->
 <?php include 'header.php'; ?>
    <!--主要內容-->
    <div class="shop-box-inner">
        <div class="container">
        <div class="title-left">
            <h1>常見問答</h1>
        </div>
                <ol>
                    <li id='question'><span class="text-danger"><b>1.在購買商品時，需注意事項為何?<b></span></li>
                    <li>購買前請詳閱商品頁中的商品資訊、內容及店家的購物說明，以避免退換貨問題。</li>
                    <li id='question'><span class="text-danger"><b>2.下單時，網頁一片空白或有錯誤訊息，請問是否訂購成功?<b></span></li>
                    <li>不一定成功，請至「會員中心」確認訂單狀態。</li>
                    <li id='question'><span class="text-danger"><b>3.會員如何訂購?<b></span></li>
                    <li>若您是會員，請先登入您的帳號及密碼，即可進行購買。</li>
                    <li id='question'><span class="text-danger"><b>4.非商店街會員如何訂購?<b></span></li>
                    <li>若您非會員，請點選「註冊」，並填入您的個人資料，即可進行購買。</li>
                    <li id='question'><span class="text-danger"><b>5.如何查詢我的訂單資料呢?<b></span></li>
                    <li>請至[會員中心 > 訂單相關查詢]查詢您在商店交易的訂單資料。</li>
                    <li id='question'><span class="text-danger"><b>6.如何修改訂單資料?<b></span></li>
                    <li>因系統作業程序的關係，無法提供訂單修改內容，需請您取消訂單後再重新下單。</li>    
                    <li id='question'><span class="text-danger"><b>7.什麼是『會員中心』？<b></span></li>
                    <li>『會員中心』內包含了客戶資料修改、密碼修改、訂單查詢、追蹤清單，利用以上的介面可查詢到個人的訂購狀況。</li>          
                </ol>
                <a href="member.php">
                        <button class="btn btn-outline-info">
                            <i class="fa fa-arrow-left" style="font-size:24px"></i>
                            回上一頁
                        </button>
                </a>
        </div>
    </div>
    <!--回到置頂-->
    <?php include 'backtotop.php'; ?>

    <!--頁尾-->
    <?php include 'footer.php'; ?>
</body>
</html>