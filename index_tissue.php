<!--購物車-->
<?php
	session_start();
    if (isset($_SESSION['cart'])) {
        $cnt = count($_SESSION['cart']);
    } else {
        $cnt = 0;
    }
?>
<!doctype html>
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
</head>

<body>
    <!--導覽頁-->
    <?php include 'header.php'; ?>
    <!--主要內容-->
    <div class="shop-box-inner">

        <div class="container">
            <div class="row">
                <!--側欄-->
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <!--廣告牆-->
                    <?php include 'slider.php'; ?>
                    <!--商品分類下拉選單-->
                    <?php include 'sidebar.php'; ?>

                </div>

                <!--首頁的內容(還需增加動態功能)-->
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <!--排序方式-->
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <h5><b>排序依</b>
                                        <h5>
                                            <select id="basic" class="selectpicker show-tick form-control"
                                                data-placeholder="$ TWD">
                                                <option value="3">價格(高→低)</option>
                                                <option value="4">價格(低→高)</option>
                                            </select>
                                </div>
                            </div>
                            <!--檢視方式-->
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i
                                                class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i
                                                class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <?php 
                                    if(isset($_SESSION['message'])){
                                ?>
                                <div class="row">
                                    <div class="col-sm-8 ">
                                        <div class="alert alert-info text-center">
                                            <?php echo $_SESSION['message']; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    unset($_SESSION['message']);
                                    }   
                                    $conn = new mysqli('localhost', 'root', 'root123456', 'group_15');
                                ?>
                                <!--商品棋盤式排列-->
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        <div class="col-sm-3 col-md-6 col-lg-4 col-xl-4">
                                            <?php
                                                $sql = "SELECT * FROM products WHERE id=4";
                                                $query = $conn->query($sql);
                                                while($row = $query->fetch_assoc()){
                                            ?>
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <img src="<?php echo $row['photo'] ?>">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="add_wishlist.php?id=<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="right"
                                                                    title="加入願望清單"><i class="fa fa-heart"></i></a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h5><?php echo $row['name']; ?><br><strong>$<?php echo $row['price']; ?></strong>
                                                        <h5>
                                                            <a href="add_cart.php?id=1"
                                                                class="btn btn-outline-danger">加入購物車
                                                            </a>
                                                            <a href = "detail.php?id=<?php echo $row['id']; ?>"
                                                                class="btn btn-outline-info">商品詳情
                                                            </a>
                                                </div>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <?php
                                                $sql = "SELECT * FROM products WHERE id=5";
                                                $query = $conn->query($sql);
                                                while($row = $query->fetch_assoc()){
                                            ?>
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <img src="<?php echo $row['photo'] ?>">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="add_wishlist.php?id=<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="right"
                                                                    title="加入願望清單"><i class="fa fa-heart"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h5><?php echo $row['name']; ?><br><strong>$<?php echo $row['price']; ?></strong>
                                                        <h5>
                                                            <a href="add_cart.php?id=<?php echo $row['id']; ?>"
                                                                class="btn btn-outline-danger">加入購物車
                                                            </a>
                                                            <a href = "detail.php?id=<?php echo $row['id']; ?>"
                                                                class="btn btn-outline-info">商品詳情
                                                            </a>
                                                </div>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <?php
                                                $sql = "SELECT * FROM products WHERE id=6";
                                                $query = $conn->query($sql);
                                                while($row = $query->fetch_assoc()){
                                            ?>
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <img src="<?php echo $row['photo'] ?>">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="add_wishlist.php?id=<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="right"
                                                                    title="加入願望清單"><i class="fa fa-heart"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h5><?php echo $row['name']; ?><br><strong>$<?php echo $row['price']; ?></strong>
                                                        <h5>
                                                        <a href="add_cart.php?id=6"
                                                                class="btn btn-outline-danger">加入購物車
                                                            </a>
                                                            <a href = "detail.php?id=<?php echo $row['id']; ?>"
                                                                class="btn btn-outline-info">商品詳情
                                                            </a>
                                                </div>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!--商品清單式排列-->
                                <div role="tabpanel" class="tab-pane fade" id="list-view">
                                    <div class="list-view-box">
                                        <?php
                                            $sql = "SELECT * FROM products WHERE id=4";
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <img src="<?php echo $row['photo'] ?>">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="add_wishlist.php?id=<?php echo $row['id']; ?>" data-toggle="tooltip"
                                                                        data-placement="right" title="加入願望清單"><i
                                                                            class="fa fa-heart"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4><?php echo $row['name']; ?></h4>
                                                    <h5> <del>$1148</del> $<?php echo $row['price']; ?></h5>

                                                    <li>◆添加山茶花精華，紙張柔軟強韌</li>
                                                    <li>◆使用FSC國際驗證紙漿，用溫柔呵護地球</li>
                                                    <li>◆嶄新設計與明亮色彩，豐富您的家居品味</li>
                                                    <li>◆入馬桶好放心，易分散不堵塞</li>

                                                    <div align="center">
                                                        <a href="add_cart.php?id=1">
                                                            <button  class="btn btn-outline-danger">    
                                                                加入購物車
                                                            </button>   
                                                        </a>
                                                        <a href = "detail.php?id=<?php echo $row['id']; ?>">
                                                            <button class="btn btn-outline-info">
                                                                商品詳情
                                                            </button>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="list-view-box">
                                        <?php
                                            $sql = "SELECT * FROM products WHERE id=5";
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <img src="<?php echo $row['photo'] ?>">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="add_wishlist.php?id=<?php echo $row['id']; ?>" data-toggle="tooltip"
                                                                        data-placement="right" title="加入願望清單"><i
                                                                            class="fa fa-heart"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4><?php echo $row['name']; ?></h4>
                                                    <h5> <del>$1030</del> $<?php echo $row['price']; ?></h5>

                                                    <li>◆面紙+衛生紙的完美結合</li>
                                                    <li>◆如面紙般柔軟不起屑</li>
                                                    <li>◆像衛生紙般安心丟馬桶</li>
                                                    <li>◆使用原生紙漿，高溫殺菌，不含螢光劑，不染色</li>

                                                    <div align="center">
                                                        <a href="add_cart.php?id=1">
                                                            <button  class="btn btn-outline-danger">    
                                                                加入購物車
                                                            </button>   
                                                        </a>
                                                        <a href = "detail.php?id=<?php echo $row['id']; ?>">
                                                            <button class="btn btn-outline-info">
                                                                商品詳情
                                                            </button>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="list-view-box">
                                        <?php
                                            $sql = "SELECT * FROM products WHERE id=6";
                                            $query = $conn->query($sql);
                                            while($row = $query->fetch_assoc()){
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <img src="<?php echo $row['photo'] ?>">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="add_wishlist.php?id=<?php echo $row['id']; ?>" data-toggle="tooltip"
                                                                        data-placement="right" title="加入願望清單"><i
                                                                            class="fa fa-heart"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4><?php echo $row['name']; ?></h4>
                                                    <h5> <del>$1248</del> $<?php echo $row['price']; ?></h5>

                                                    <li>◆尺寸：19cm X 13cm</li>
                                                    <li>◆理想品牌最佳推薦</li>
                                                    <li>◆萬用尺寸，隨處適用</li>
                                                    <li>◆紙張大小剛剛好</li>

                                                    <div align="center">
                                                        <a href="add_cart.php?id=1">
                                                            <button  class="btn btn-outline-danger">    
                                                                加入購物車
                                                            </button>   
                                                        </a>
                                                        <a href = "detail.php?id=<?php echo $row['id']; ?>">
                                                            <button class="btn btn-outline-info">
                                                                商品詳情
                                                            </button>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>

                            </div>

                        </div>

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