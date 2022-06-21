<!--購物車-->
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
    $name = $_POST['name'];
    $price = $_POST['price'];
    $photo = $_POST['photo'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    //資料庫新增存檔
    if (isset($_POST['name'])) {
        $sql = "INSERT INTO `products`(`id`, `name`, `price`, `photo`, `description`, `stock`) VALUE (NULL, '$name', '$price', '$photo', '$description', '$stock')";
        $result = mysqli_query($link,$sql);
        echo '<meta http-equiv=REFRESH CONTENT=1;url=add_product.php>';
        $_SESSION['message'] = '商品新增成功';
    }
    mysqli_free_result($result); // 釋放佔用的記憶體
    
    mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--css-->
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




    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <!--additional method - for checkbox .. ,require_from_group method ...-->
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <!--中文錯誤訊息-->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
    
    <style>
        #addproduct_form{
            background-color: rgb(245, 244, 244);
            margin: auto;
            text-align: center;
        }
    </style>
</head>

<body>
    <!--導覽頁-->
    <?php include 'header.php'; ?>
    <!--橫幅式圖片-->
    <div class="all-title-box" style="background-image: url('images/admin_banner.jpg');background-position:center;">
        <div class="container">
            <div class="row"></div>
            <div class="col-lg-12">
                <h2>新增商品</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin.php">管理員</a></li>
                    <li class="breadcrumb-item">新增商品</li>
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
                    <form class="form" role="form" name="addproduct_form" id="addproduct_form" action="" method="POST">
                        <table class="table table-bordered table-striped" >
                            <thead align="center">
                                <th>商品名稱</th>
                                <th>商品價錢</th>
                                <th>商品圖片</th>
                                <th>商品描述</th>
                                <th>商品庫存</th>
                            </thead>
                            <tbody>
                                <?php echo $rows?>
                                <tr>
                                    <td style='text-align:center;vertical-align:middle'>
                                        <input type="text" id="name" name="name">
                                    </td>
                                    <td style='text-align:center;vertical-align:middle'>
                                        <input type="text" id="price" name="price">
                                    </td>
                                    <td style='text-align:center;vertical-align:middle'>
                                        <input  type='file' id="photo" name="photo">
                                    </td>
                                    <td style='text-align:center;vertical-align:middle'>
                                        <input type="text" id="description" name="description">
                                    </td>
                                    <td style='text-align:center;vertical-align:middle'>
                                        <input type="text" id="stock" name="stock">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                    <button  type="submit" class="btn btn-outline-danger" style="float:right" name="save"><span class="fa fa-save"></span>確定更改</button>
                    </form>
                    <a href="admin_product.php">
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