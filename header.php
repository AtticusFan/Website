<header class="main-header">
    
        <!--開始 最上層GROCERY那區塊-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
        
            <div class="container">
               
                <!-- 按logo 回到首頁-->
                <div class="navbar-header">
                    <div class="navbar-header">
                        <a href="index.php"><img src="images/logo.png" class="logo" alt="" ></a>
                    </div> 
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- 這是按鈕上呈現的icon圖案 -->
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- 選擇各項功能 -->
                <div class="collapse navbar-collapse" id="navbar-menu" >
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <!--首頁-->
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">首頁</a>
                        </li>
                        <!--商品頁面-->
                        <li class="dropdown megamenu-fw">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">商品分類</a>
                            <ul class="dropdown-menu" labelledby="navbarDropdownMenuLink">
                                <li class="dropdown-submenu">
                                    
                                    <a href="#" class="dropdown-item dropdown-toggle">日用品</a>
                                    <ul class="dropdown-menu" labelledby="navbarDropdownMenuLink">
                                        <li><a href="index_detergent.php" class="dropdown-item">洗衣精</a></li>
                                        <li><a href="index_tissue.php" class="dropdown-item">衛生紙</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="#" class="dropdown-item dropdown-toggle">電腦周邊</a>
                                    <ul class="dropdown-menu" labelledby="navbarDropdownMenuLink">
                                        <li><a href="index_earphone.php" class="dropdown-item">耳機</a></li>
                                        <li><a href="index_keyboards.php" class="dropdown-item">鍵盤</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown-submenu" >
                                    <a href="#" class="dropdown-item dropdown-toggle">寵物用品</a>
                                    <ul class="dropdown-menu" labelledby="navbarDropdownMenuLink">
                                        <li><a href="index_dog.php" class="dropdown-item">狗食品</a></li>
                                        <li><a href="index_cat.php" class="dropdown-item">貓食品</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    
                        <?php
                        
                        if (isset($_SESSION['account'])) {
                            echo '<li class="nav-item" role="presentation"><a class="nav-link" href="logout.php">登出(' . $_SESSION['account'] . ')</a></li>';
                        } else {
                            echo '<li class="nav-item" role="presentation"><a class="nav-link" href="login.php">登入(訪客)</a></li>';
                        }
                                

                        ?>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">註冊</a>
                        </li>
                        <!--會員中心-->
                        <li class="nav-item">
                            <a class="nav-link" href="member.php">會員中心</a>
                        </li>
                        <!--購物車-->
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" style="font-size:24px"></i>購物車<span class="badge badge-danger"><?php echo $cnt; ?></span></a>
                        </li>
                        <!--管理者-->
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">管理者</a>
                        </li>
                    </ul>
                </div> 
            </div>
            <!--搜尋欄-->
            <div>
                <form class="form" role="form" action="search.php" method="POST">
                  <input type="text" placeholder="Search.." name="search" value="<?php echo $_GET["search"] ?>">
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </nav>
        <!--結束 最上層GROCERY那區塊-->
</header>
    