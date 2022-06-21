<?php
session_start();
if (isset($_SESSION['cart'])) {
    $cnt = count($_SESSION['cart']);
} else {
    $cnt = 0;
}
if ($_SESSION["level"] != 1) {
    header("Location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者</title>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
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
                <div class="col-lg-12" >
                    <h2>訂單管理</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin.php">管理者</a></li>
                        <li class="breadcrumb-item">訂單管理</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--會員中心-->
    <div class="my-account-box-main">
        <div class="container">
            <div class="my-account-page">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="account-box">
                            <div class="service-box">
                                <div class="service-icon">
                                    <a href="manage_order.php"> <i class="fa fa-file"></i> </a>
                                </div>
                                <div class="service-desc">
                                    <h4>查詢、刪除會員訂單</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <a href="admin.php">
                            <button class="btn btn-outline-info">
                                <i class="fa fa-arrow-left" style="font-size:24px"></i>
                                回上一頁
                            </button>
                        </a>
                    </div>
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

