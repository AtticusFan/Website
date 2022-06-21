<?php
session_start();
if (isset($_SESSION['cart'])) {
    $cnt = count($_SESSION['cart']);
} else {
    $cnt = 0;
}
$account = $_SESSION['account'];
$link = mysqli_connect("localhost", "root", "root123456", "group_15") // 建立MySQL的資料庫連結
 or die("無法開啟MySQL資料庫連結!<br>");

// 送出編碼的MySQL指令
mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");

$id = $_GET['id'];
// 送出查詢的SQL指令
if ($result = mysqli_query($link, "SELECT * FROM products where id='$id'")) {
	while ($row = mysqli_fetch_assoc($result)) {
		$pid = "$row[id]";
        $pic = "<img src='$row[photo]' />";
        $name = "$row[name]";
        $price = "$row[price]";
        $description = "$row[description]";
        $stock = "$row[stock]";
	}
	mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品介紹</title>
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

    <script src="//code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript">
        function delete1(id) {
            localStorage.removeItem(id);
            this.Storage.writeData();
        }
        function writeDB(){
            var content = document.querySelector("#post textarea");
            location.href="message_db.php?content=" +content; 
        }
        var Storage = {
            saveData: function () //保存數據
            {
                var name = "<?php echo $account; ?>";
                var data = document.getElementById("message").value;
                //var data = document.querySelector("#post textarea");
                $.ajax({
                    type:"POST",
                    url: 'message_db.php',
                    data: "content="+ data,
                    dataType: 'text',
                    async: false,
                    cache: false,
                    success: function (msg)  {
                        $("#show_msg").html(msg);
                        //window.location.reload();
                    }
                });
                if (data != "") {
                    var time = new Date().getTime() + Math.random() *5; 
                    localStorage.setItem(time, data + "|" + name + "|" + this.getDateTime());
                    data = "";
                    this.writeData();
                } else {
                    alert("請填寫您的留言！");
                }
            },
            writeData: function () //輸出數據
            {
                var dataHtml = "",
                    data = "";
                for (var i = localStorage.length - 1; i >= 0; i--) //效率更高的循環方法
                {
                    data = localStorage.getItem(localStorage.key(i)).split("|");
                    dataHtml += "<span style=>" + data[1] + "<span style=\"float:right\">" + data[2] +
                        "</span><p><span class=\"msg\">" + data[0] + "</span></p>";
                }
                document.getElementById("comment").innerHTML = dataHtml;
            },
            clearData: function () //清空數據
            {
                if (localStorage.length > 0) {
                    if (window.confirm("此動作不可恢復，是否清空？")) {
                        localStorage.clear();
                        
                        this.writeData();
                    }
                }
                else {
                    alert("沒有需要清空的數據！");
                }
            },
            getDateTime: function () //獲取日期時間，例如 2012-03-08 12:58:58
            {
                var isZero = function (num) //私有方法，自動補零
                {
                    if (num < 10) {
                        num = "0" + num;
                    }
                    return num;
                }

                var d = new Date();
                return d.getFullYear() + "-" + isZero(d.getMonth() + 1) + "-" + isZero(d.getDate()) + " " + isZero(d
                    .getHours()) + ":" + isZero(d.getMinutes()) + ":" + isZero(d.getSeconds());
            }
        }

        window.onload = function () {
            Storage.writeData(); //當打開頁面的時候，先將localStorage中的數據輸出一邊，如果沒有數據，則輸出空
            document.getElementById("postBt").onclick = function () {
                Storage.saveData();
                
            } //發表評論按鈕添加點擊事件，作用是將localStorage中的數據輸出
            document.getElementById("clearBt").onclick = function () {
                Storage.clearData();
            } //清空所有已保存的數據
        }
    </script>

</head>

<body>
    <!--導覽頁-->
    <?php include 'header.php'; ?>
    <!--橫幅式圖片-->
    <div class="all-title-box" style="background-image: url('images/banner.jpg');background-position:center;">
        <div class="container">
            <div class="row"></div>
            <div class="col-lg-12">
                <h2>商品介紹</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">首頁</a></li>
                    <li class="breadcrumb-item">商品介紹</li>
                </ul>
            </div>
        </div>
    </div>
    <!--商品介紹-->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">

                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <?php echo $pic?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details" text-align:left>
                        <h2><?php echo $name ?></h2>
                        <h5>價錢：&nbsp&nbsp$<?php echo $price?></h5>
                        <p class="available-stock">
                            <h4>庫存量：&nbsp&nbsp<?php echo $stock ?></h4>
                            <p>
                                <h4>商品介紹：</h4>
                                <?php echo nl2br($description) ?>
                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">
                                        <a href="index.php">
                                            <button class="btn btn-outline-success">
                                                <i class="fa fa-home" style="font-size:24px"></i>
                                                返回首頁
                                            </button>
                                        </a>
                                        <a href="add_cart.php?id=<?php echo $pid; ?>">
                                            <button class="btn btn-outline-danger">
                                                <i class="fa fa-shopping-cart" style="font-size:24px"></i>
                                                加入購物車
                                            </button>
                                        </a>
                                    </div>
                                </div>
                    </div>
                    <?php if($account != null){?>
                    <div id="post" class="col-xl-7 col-lg-7 col-md-6">
                        <div>
                            留言區：
                            <br>
                            <input type="text" id="message"style="width: 600px;border-color:black;border-width:3px;border-style:solid;">
                            <!--
                            <textarea class="transition" style="width: 500px;"></textarea>
                            -->
                        </div>
                        <input id="postBt" type="button" class="btn btn-outline-dark"
                               style="text-align:center; vertical-align:middle; border-radius:20px; width:80px; height:40px;"
                               value="發布" onclick="writeDB()"/>
                        <?php if($account=='admin'){ ?>
                            <input id="clearBt" type="button" class="btn btn-outline-dark"
                                style="text-align:center; vertical-align:middle; border-radius:20px; width:80px; height:40px;"
                               value="刪除全部" />
                        <?php } ?>
                        <div id="show_msg"></div>
                    </div>
                    <?php } ?>
                    <br>
                    <div id="comment"></div>
                </div>
                

            </div>
        </div>
    </div>
    <!--回到置頂-->
    <?php include 'backtotop.php'; ?>
    <!--頁尾-->
    <?php include 'footer.php'; ?>
</body>

</html>