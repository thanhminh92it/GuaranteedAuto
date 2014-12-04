<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>ĐĂNG NHẬP TÀI KHOẢN</title>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
    <link href="css/login.css" type="text/css" rel="stylesheet" />
    <script src="js/jquery.js" type="text/javascript" language="javascript"></script>
    <script type="text/javascript">
        //  Developed by Amit Sarwara
        //  Visit http://www.tricktodesign.com for this script and more.
        $(document).ready(function()
        {
            $("#login_form").submit(function()
            {
                //remove all the class add the messagebox classes and start fading
                $("#msgbox").removeClass().addClass('messagebox').text('Validating....').fadeIn(1000);
                //check the username exists or not from ajax
                $.post("ajax_login.php",{ user_name:$('#username').val(),password:$('#password').val(),rand:Math.random() } ,function(data)
                {
                    if(data=='yes') //if correct login detail
                    {
                        $("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
                        {
                            //add message and change the class of the box and start fading
                            $(this).html('Logging in.....').addClass('messageboxok').fadeTo(900,1,
                                function()
                                {
                                    //redirect to secure page
                                    document.location='logsuccess.html';
                                });

                        });
                    }
                    else
                    {
                        $("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
                        {
                            //add message and change the class of the box and start fading
                            $(this).html('Your login detail sucks...').addClass('messageboxerror').fadeTo(900,1);
                        });
                    }

                });
                return false; //not to post the  form physically
            });
            //now call the ajax also focus move from
            $("#password").blur(function()
            {
                $("#login_form").trigger('submit');
            });
        });
    </script>

</head>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <span id="msgbox" style="display:none"></span>
        <h2>Đăng nhập tài khoản</h2>
        <form class="form-horizontal" method="post" action="" id="login_form" style="border:1px solid #eee;padding-left: 200px;padding-top:50px;margin-top:15px">
            <div class="control-group">
                <label class="control-label" for="username">Username</label>
                <div class="controls">
                    <input type="text" id="username" placeholder="Username">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="password">Password</label>
                <div class="controls">
                    <input type="password" id="password" placeholder="Password">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox"> Remember me
                    </label>
                    <input name="Submit" type="submit" id="submit" value="Login" class="btn btn-success"/>
                    <input type="reset" name="Reset" value="Reset" class="btn"/>
                </div>
            </div>
        </form>

    </div>
</div>
</body>
</html>