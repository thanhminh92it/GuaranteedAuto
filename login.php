<?php
    session_start();
    $_SESSION['username'] = null;
?>
<html>
<head>
    <meta charset="utf-8" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Đăng nhập với quyền quản trị</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                     alt="">
                <form class="form-signin" method="post" action="login.php">
                    <?php
                    include "database.php";
                    if(isset($_POST['btn']))
                    {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $password = md5($password);
                        $sql = "select * from account where username='".$username."' AND password ='".$password."'";
                        $list = $pdo -> query($sql);
                        $count = 0;
                        foreach($list as $a)
                        {
                            $count = $count + 1;
                        }
                        if($count == 0)
                        {

                            echo "<div class=\"alert alert-danger alert-error\">
                                    <a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>
                                    <strong>Lỗi!</strong> Tài khoản hoặc mật khẩu không chính xác.
                                </div>";
                        }
                        else
                        {
                            session_start();
                            $_SESSION['username'] = $username;
                            header("location:ManagerUser.php");
                        }
                    }
                    ?>
                    <input type="text" class="form-control" name="username" placeholder="Tài khoản" required autofocus>
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
                    <button class="btn btn-lg btn-primary btn-block" name="btn" type="submit">
                        Đăng nhập</button>
                    <label class="checkbox pull-left">
                        <input type="checkbox" value="remember-me">
                        Nhớ tài khoản của tôi
                    </label>
                    <a href="#" class="pull-right need-help">Quên mật khẩu</a><span class="clearfix"></span>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>