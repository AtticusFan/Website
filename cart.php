<?php
	session_start();
    if (isset($_SESSION['cart'])) {
        $cnt = count($_SESSION['cart']);
    } else {
        $cnt = 0;
    }
    if ($_SESSION["account"] == null) {
        header("Location:login.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購物車</title>
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
    <div class="all-title-box" style="background-image: url('images/banner.jpg');background-position:center;">
        <div class="container">
            <div class="row"></div>
            <div class="col-lg-12">
                <h2>購物車</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">首頁</a></li>
                    <li class="breadcrumb-item">購物車</li>
                </ul>
            </div>
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
                    <form method="POST" action="save_cart.php" position="center">
                        <table class="table table-bordered table-striped" >
                            <thead align="center">
                                <th></th>
                                <th>商品名稱</th>
                                <th>商品價錢</th>
                                <th>購買數量</th>
                                <th>庫存量</th>
                                <th>金額</th>
                            </thead>
                            <tbody>
                                <?php
						//initialize total
						$total = 0;
                        $alltotal = 0;
						if(!empty($_SESSION['cart'])){
                            //connection
                            //$conn = new mysqli('localhost', 'root', 'root123456', 'group_15');
                            
                            $link = mysqli_connect("localhost", "root", "root123456", "group_15") // 建立MySQL的資料庫連結
                            or die("無法開啟MySQL資料庫連結!<br>");
                            mysqli_query($link, 'SET CHARACTER SET utf8');
                            mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
                            //create array of initail qty which is 1
                            $index = 0;
                            $initial = 1;
                            if(!isset($_SESSION['qty_array'])){
                                $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), $initial);
                            }
                            $sql = "SELECT * FROM products WHERE id IN (".implode(',',$_SESSION['cart']).")";
                            if($result = mysqli_query($link, $sql)){
                                //$query = $conn->query($sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    
                                    ?>

                                    <tr>
                                        <td style="text-align:center;vertical-align:middle">
                                            <a href="delete_cartitem.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>">
                                                <i class="fa fa-trash-o" style="font-size:24px;color:red"></i>
                                            </a>
                                        </td>
                                        <td >
                                            <img src="<?php echo $row['photo']; ?>" alt="" width="100px"/>
                                            <?php echo $row['name']; ?>
                                        </td>
                                        <td style="text-align:center;vertical-align:middle">
                                            <?php echo $row['price']; ?>
                                        </td>
                                        <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                                        <td style="text-align:center;vertical-align:middle">
                                                <input type="number"
                                                       class="form-control"
                                                       style="background-color:#DCDCDC;text-align:center"
                                                       value="<?php echo $_SESSION['qty_array'][$index]; ?>"
                                                       min = "1";
                                                       max=<?php echo $row['stock']; ?>
                                                       name="qty_<?php echo $index; ?>"        
                                                >
                                        </td>
                                        <td style="text-align:center;vertical-align:middle">
                                            <?php 
                                                if($_SESSION['qty_array'] >= 1)
                                                    echo $row['stock']-$_SESSION['qty_array'][$index]; ?>
                                        </td>
                                        <td style="text-align:center;vertical-align:middle">
                                            <?php echo number_format($_SESSION['qty_array'][$index]*$row['price']); ?>
                                        </td>
                                        <?php $total += $_SESSION['qty_array'][$index]*$row['price']; ?>
                                    </tr>
                                    <?php
                                    $_SESSION['indexs'] = $index;
                                    $index ++;
                                    ?>
                        <?php            
                                }
                            }
						}
						else{
							?>
                                <tr>
                                    <td colspan="6" class="text-center">無商品在購物車</td>
                                </tr>
                        <?php
						}
					    ?>
                                <tr>
                                    <td colspan="5" style="text-align:right;"><b>商品金額</b><br><b>運費</b></td>
                                    <td style="text-align:right;"><b><?php echo $total; ?></b><br>
                                    <b><?php
                                            if($total>0)
                                                echo $i=60;
                                            else
                                                echo $i=0;
                                        ?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="text-align:right;"><b>總金額</b></td>
                                    <?php $alltotal = $total+$i?>
                                    <td style="text-align:right;"><b><?php echo $alltotal; ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <a href="index.php" class="btn btn-primary"><span class="fa fa-home"></span>返回首頁</a>
                        <button  type="submit" class="btn btn-success" name="save"><span class="fa fa-save"></span>儲存變更</button>
                        <a href="checkout.php?id=<?php echo $index; ?>" class="btn btn-outline-danger" style="float:right;"><span class="fa fa-money"></span>結帳</a>
                    </form>
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