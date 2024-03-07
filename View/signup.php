<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../Css/signup.css" />
    <script src="../Js/validation.js"></script>
</head>

<body>

    <div class="popup">

        <form method="POST" action="../Controller/pushValueFromSignup.php" onsubmit="return check_register()">
            <button type="button" class="close">+</button>
            <h3>ĐĂNG KÝ</h3>
            <div class="form-group">
                <label for="user_name">Tên đăng nhập</label>
                <input type="text" id="user_name" name="user_name" />
                <span id="spanUsername" class="error_msg" style="color: red;"></span>
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" />
                <span id="spanPw" class="error_msg " style="color: red;"></span>
            </div>

            <div class="form-group">
                <label for="cpassword">Nhập lại mật khẩu</label>
                <input type="password" id="cpassword" name="cpassword" />
                <span id="spanCpw" class="error_msg " style="color: red;"></span>
            </div>

            <div class="form-group">
                <label for="fullname">Họ và tên</label>
                <input type="text" id="fullname" name="fullname">
                <span id="spanFullname" class="error_msg " style="color: red;"></span>

            </div>

            <div class="form-group">
                <label for="phone_number">Số điện thoại</label>
                <input type="tel" id="phone_number" name="phone_number" />
                <span id="spanPhone" class="error_msg " style="color: red;"></span>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" />
                <span id="spanEmail" class="error_msg " style="color: red;"></span>
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" id="address" name="address" />
                <span id="spanAddress" class="error_msg " style="color: red;"></span>
            </div>

            <button class="btnSignup" name="submit" type='submit'>ĐĂNG KÝ</button>

        </form>
        <div class="linkLogin">
            <span>Nếu đã bạn đã có tài khoản. Hãy</span> <a href="login.php">Đăng nhập</a>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../Js/ajax-script.js"></script>

</html>