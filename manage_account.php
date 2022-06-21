<?php
    session_start();
    if (isset($_SESSION['cart'])) {
        $cnt = count($_SESSION['cart']);
    } else {
        $cnt = 0;
    }
    $link = mysqli_connect("localhost", "root", "root123456", "group_15") // 建立MySQL的資料庫連結
    or die("無法開啟MySQL資料庫連結!<br>");
    // 送出編碼的MySQL指令
    mysqli_query($link, 'SET CHARACTER SET utf8');
    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
    $account = $_SESSION['account'];
        if ($result = mysqli_query($link, "SELECT * FROM account where acctno != 1")) {
            while ($row = mysqli_fetch_assoc($result)) {
                $acctno = "$row[acctno]";
                $rows .= "<tr><td style='text-align:center;vertical-align:middle'><a href='delete_account.php?id=$acctno'>
                <i class = 'fa fa-times' style='font-size:24px; color:red'></i></a></td><td style='text-align:center;vertical-align:middle'>" . $row["account"] . "</td><td style='text-align:center;vertical-align:middle'>" . $row["pwd"] . "</td><td style='text-align:center;vertical-align:middle'>" . $row["email"] . "</td></tr>";
            }
            
            mysqli_free_result($result); // 釋放佔用的記憶體
        }
        
    mysqli_close($link); // 關閉資料庫連結

?>
<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員資料管理</title>
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
</head>

<body>
    <!--導覽頁-->
    <?php include 'header.php'; ?>
    <!--橫幅式圖片-->
    <div class="all-title-box" style="background-image: url('images/admin_banner.jpg');background-position:center;">
        <div class="container">
            <div class="row"></div>
            <div class="col-lg-12">
                <h2>會員資料管理</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin.php">管理者</a></li>
                    <li class="breadcrumb-item">會員資料管理</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <?php 
                        if(isset($_SESSION['message'])){
                    ?>
                        <div class="alert alert-danger text-center">
                            <?php echo $_SESSION['message']; ?>
                        </div>
                        <?php
                            unset($_SESSION['message']);
                            }
                        ?>
                    <form method="POST" action="" position="center">
                        <table class="table table-bordered table-striped" >
                            <thead align="center">
                                <th></th>
                                <th>姓名</th>
                                <th>密碼</th>
                                <th>email</th>
                            </thead>
                            <tbody>
                            <?php echo $rows; ?>
                            </tbody>
                        </table>
                    </form>
                    <a href="admin_data.php">
                            <button class="btn btn-outline-info">
                                <i class="fa fa-arrow-left" style="font-size:24px"></i>
                                回上一頁
                            </button>
                    </a>
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