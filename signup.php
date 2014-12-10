<?php
    include "database.php";
    $account = "";
    $email = "";
    if(isset($_POST['btnAcc']))
    {
        $account = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $pass = md5($pass);
        $sql="select * from account where username ='".$account."'";
        $list = $pdo -> query($sql);
        $count = 0;
        foreach($list as $a)
        {
            $count = $count + 1;
        }
        if($count == 0)
        {
           $sql = "insert into account value('$account','$email','$pass')";
           $pdo -> query($sql) or die("Khong them dc");
            header("location:ManagerGuaranteed.php");
        }
        else
        {
            echo "
            <script type=\"text/javascript\">
            alert(\"Tài khoản đã tồn tại\");
            </script>";
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Thêm sản phẩm bảo hành</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap-datepicker.css" type="text/css"/>
   <link rel="stylesheet" href="css/bootstrap-select.css" type="text/css"/>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.json-2.4.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/locales/bootstrap-datepicker.vi.js"></script>
    <script src="js/DatepickerJavaScript.js"></script>
</head>
<body>
<div class="well well-sm text-center">
    <h3> Thêm tài khoản</h3>
</div>
<div class="container col-sm-10">
    <form class="accounts" action="signup.php" method="post">
        <div class="form-group">
            <label class="control-label">Tài khoản</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Tài khoản" value="<?php echo $account?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Địa chỉ Email</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Mật khẩu</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Nhập lại mật khẩu</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" id="reppassword" name="reppassword" placeholder="Nhập lại mật khẩu">
                </div>
            </div>
        </div>
        <div class="controls pull-left">
            <button type="submit" title="Thêm mới" id="mybtn" name="btnAcc" class="btn btn-primary">Thêm mới</button>
        </div>
    </form>

</div>
</body>

</html>