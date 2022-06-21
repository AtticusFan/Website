<!--購物車-->

<?php

	session_start();
    if (isset($_SESSION['cart'])) {
        $cnt = count($_SESSION['cart']);
    } else {
        $cnt = 0;
    }

    
    
    if (isset($_POST['account']) && isset($_POST['email'])) {
        //認證(Authentication):連線資料庫驗證使用者的帳號密碼是否正確
        //授權(Authorization):連線資料庫檢查使用者的身分別(會員、管理者....)
        $link = mysqli_connect("localhost", "root", "root123456", "group_15") // 建立MySQL的資料庫連結
        or die("無法開啟MySQL資料庫連結!<br>");
        // 送出編碼的MySQL指令
        mysqli_query($link, 'SET CHARACTER SET utf8');
        mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
        $login_account = $_POST['account'];
        //$email = $_POST['email'];
        if ($result = mysqli_query($link, "SELECT * FROM account where account like '$login_account'")) {
            while ($row = mysqli_fetch_assoc($result)) {
                $account = "$row[account]";
                $pwd = "$row[pwd]";
                $email = "$row[email]";
            }
            if($_POST['email'] != $email){
                $_SESSION['message'] = "email錯誤! 無法提供密碼";
            }
            else{
                $_SESSION['message'] = "密碼：" . $pwd;
            }
            
            mysqli_free_result($result); // 釋放佔用的記憶體
        }
       mysqli_close($link); // 關閉資料庫連結
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>忘記密碼</title>
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

    <script>
        $(document).ready(function ($) {
            //for select
            $.validator.addMethod("notEqualsto", function (value, element, arg) {
                return arg != value;
            }, "您尚未選擇!");

            $("#forget_form").validate({
                rules: {
                    account: {
                        required: true
                    },
                    pwd: {
                        required: true
                    }
                },
                messages: {
                    account: {
                        required: "必填欄位"
                    },
                    pwd: {
                        required: "必填欄位"
                    }
                }
            });
        });
    </script>
    <style>
        #forget_form {
            background-color: rgb(245, 244, 244);
            margin: auto;
            text-align: center;
        }

        .forget {
            font-size: xx-large;
            color: black;
        }

        #form-group {
            font-size: large;
            color: black;
        }

        .error {
            color: #D82424;
            font-weight: small;
            font-family: "微軟正黑體";
        }
    </style>
    
</head>

<body>
    <!--導覽頁-->
    <?php include 'header.php'; ?>
    <!--主要內容-->
    <div class="container">
        <div class="row">
                        <?php 
                            if(isset($_SESSION['message'])){
                        ?>
                            <div class="col-sm-12 ">
                                <div class="alert alert-danger text-center">
                                    <?php echo $_SESSION['message']; ?>
                                </div>
                            </div>
                        <?php
                            unset($_SESSION['message']);
                            }
                        ?>
            <form class="form" role="form" name="forget_form" id="forget_form" action="" method="POST">
            
                <div class="forget"><b>忘記密碼</b></div>
                <div class="form-group" id="form-group">
                    <label>帳號</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-inline" id="account" name="account">
                    </div>
                </div>
                <div class="form-group" id="form-group">
                    <label class="col-sm-4 control-label">email</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-inline" id="email" name="email" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" id="login" class="btn btn-outline-danger">送　出</button>
                    <button type="reset" class="btn btn-outline-info">重　填</button>
                </div>
            </form>
        </div>
    </div>

    <!--頁尾-->
    <?php include 'footer.php'; ?>
</body>

</html>