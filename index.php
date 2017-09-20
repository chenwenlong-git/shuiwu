<?php
session_start();
if (isset($_SESSION['uRole'])) {
    if ($_SESSION['uRole'] == 2) {
        //exit("<script>location.href='manage_main.php?dname=comm'</script>");
        exit("<script>location.href='customer.php'</script>");
    }
    if ($_SESSION['uRole'] == 0 || $_SESSION['uRole'] == 1) {
        exit("<script>location.href='customer.php'</script>");
    }
    if ($_SESSION['uRole'] == 3) {
        exit("<script>location.href='tpl/new_total.php'</script>");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>青岛水务环境公司</title>
    <link rel="stylesheet" type="text/css" href="css/loginnews.css"/>
    <link href="css/slide-unlock.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico"/>
</head>
<style>
    input:-webkit-autofill,
    textarea:-webkit-autofill,
    select:-webkit-autofill {
        background-image: url(../public/images/user1.png) no-repeat;
        -webkit-box-shadow: 0 0 0 1000px white inset;
    }
</style>
<body>
<div class="index-header">
    <div class="index-header-box">
        <img src="/images/cloudthree/header.png" alt="">
        <span>欢迎来到青岛水务信息系统</span>
    </div>

</div>
<div class="container">
    <div class="main clearfix">
        <div class="login-logo">
            <img src="/images/cloudthree/logo.png" alt="">
        </div>
        <div class="login-box">
            <img src="/images/cloudthree/contentimg.png" alt="">
            <div class="login-content">
                <div class="cneng">
                    <span class="login-china">用户登录</span>
                    <span class="login-english">UserLogin</span>
                </div>
                <div class="login-input">
                    <input type="text" name="username" autocomplete="off" class="username login-user" placeholder="用户名" value="<?php if (isset($_COOKIE["usrname"])) {echo $_COOKIE["usrname"];} ?>">
                    <span class="user-inpt" style="text-align: left; color: #FF0000; position:absolute; top:245px; left: 312px;"></span>
                    <div id="detectCapsLock" class="inp" style="display:none;margin-bottom: 5px;margin-top:-20px;color: red;">大写锁定已打开</div>
                    <input  type="password" id="password" name="password" class="password login-pwd" placeholder="密码" value="<?php if (isset($_COOKIE["userpass"])) {echo $_COOKIE["userpass"];} ?>">
                    <span class="pword-inpt" style="text-align: left; color: #FF0000;text-align: left;position:absolute; top:324px; left: 312px;"></span>
                    <p class="slider-inpt" style="color: #FF0000;  margin-top: 5px;margin-bottom: -25px; text-align: left;height: 20px;"></p>
                </div>
                <div class="phon2">
                    <span>
                       <a href="javascript:;" class="login-botton" onclick="SE.login(1)">登录</a>
                    </span>
                    <span>
                        <input type="checkbox" type="checkbox" id="checkbox" <?php if (isset($_COOKIE["usrname"])) {echo "checked='checked'";} ?> >
                        <span class="remember" onclick="remember()">记住密码</span>
                    </span>
                </div>
            </div>
        </div>
        <div class="daoying">
            <img src="/images/cloudthree/daoying.png" alt="">
        </div>
    </div>
</div>
<div style="position: absolute;  width:100%;left: 0;  bottom:0;text-align: center;height: 49px; background: #1551a0;">
    <p style="color:#ccc; line-height: 49px;margin-left: -10px;font-size: 14px;font-family: 'Microsoft YaHei';color: #f8f8f8;">Copyright @ 2012-2017 深圳华会科技有限公司 备案：粤ICP备15092113号</p>
    <!--        <p style="color:#ccc; text-align: center;margin: 0; margin: 0;">地址：深圳市宝安67区留仙一路高新奇战略新兴产业园区2期1号楼2A02</p>-->
</div>
</body>
<script src="js/jquery-1.12.1.min.js"></script>
<script src="js/jquery.slideunlock.js"></script>
<script type="text/javascript" src="js/project.js"></script>
<script type="text/javascript" src="js/jquery.artDialog.js?skin=blue"></script>
<script>
    //回车提交事件
    $("body").keydown(function() {
        if (event.keyCode == "13") {//keyCode=13是回车键
            $(".login-botton").click();
        }
    });
    // 记住密码
    $('.sign-frame').on('click', '.checkbox', function () {
        if ($('#checkbox').prop('checked')) {
            $(this).find('span').removeClass('icon-checked-false').addClass('icon-checked-true');
        } else {
            $(this).find('span').removeClass('icon-checked-true').addClass('icon-checked-false');
        }
    })
    function remember() {
        if ($('#checkbox').prop('checked')) {
            $('#checkbox').attr("checked", false);
        } else {
            $('#checkbox').click();
        }
    }
    function detectCapsLock(event) {
        var e = event || window.event;
        var o = e.target || e.srcElement;
        var oTip = $("#detectCapsLock");
        var keyCode = e.keyCode || e.which; // 按键的keyCode
        var isShift = e.shiftKey || (keyCode == 16 ) || false; // shift键是否按住
        if (
            ((keyCode >= 65 && keyCode <= 90 ) && !isShift) // Caps Lock 打开，且没有按住shift键
            || ((keyCode >= 97 && keyCode <= 122 ) && isShift)// Caps Lock 打开，且按住shift键
        ) {
            oTip.css("display", "block");
        }
        else {
            oTip.css("display", "none");
        }
    }
    document.getElementById('password').onkeypress = detectCapsLock;
    $("#password").focus(function () {
        document.getElementById('password').onkeypress = detectCapsLock;
    });
    $("#password").blur(function () {
        $("#detectCapsLock").css("display", "none");
    });
</script>
<script>
    $(function () {
        $(".username").focus(function () {
            $(".username").css("background-image", "url(../public/images/user2.png)");
        });          //获取焦点时切换背景图
        $(".username").blur(function () {
            $(".username").css("background-image", "url(../public/images/user1.png)");
            //失去焦点时切换背景图
        });
    });

    $(function () {
        $(".password").focus(function () {
            $(".password").css("background-image", "url(../public/images/password-b.png)");
        });             //获取焦点时切换背景图
        $(".password").blur(function () {
            $(".password").css("background-image", "url(../public/images/password.png)");
        });	 //失去焦点时切换背景图
    });
</script>
</html>
