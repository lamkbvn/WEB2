<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/login.css" />
    <script src="../Js/validation.js"></script>

</head>

<body>
    <div class="popup">
        <form method="post" action="../Controller/readDatebaseforLogin.php" onsubmit="return check_login()">
            <button type="button" class="close">+</button>
            <h3>ĐĂNG NHẬP</h3>

            <div class="form-group">
                <label for="user_name">Tên đăng nhập</label>
                <input type="text" name="user_name" id="user_name" />
                <span id="spanUsername" class="error_msg" style="color: red;"></span>

            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" />
                <span id="spanPw" class="error_msg " style="color: red;"></span>

            </div>


            <button class="btnLogin" name='submit' type='submit'>ĐĂNG NHẬP</button>

        </form>

        <div class="linkSignup">
            <span>Bạn đã có tài khoản chưa nào? Hãy</span> <a href="signup.php"> Đăng ký</a>

        </div>

    </div>
</body>

</html>