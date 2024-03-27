<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../Css/user/style.css" />
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="get" autocomplete="off" action="../../Model/user/connectData.php"
                onsubmit="return checkRegister()">
                <h1>Create Account</h1>

                <input type="hidden" name="action" value="signup" />
                <!-- Các trường nhập -->
                <input type="text" id="fullname_signup" placeholder="Full Name" />
                <span id="spanFullname" class="error_msg" style="color: red"></span>

                <input type="text" id="user_name_signup" placeholder="User Name" />
                <span id="spanUsername" class="error_msg" style="color: red"></span>

                <input type="password" id="password_signup" placeholder="Password" />
                <span id="spanPw" class="error_msg" style="color: red"></span>

                <input type="email" id="email_signup" placeholder="Email" />
                <span id="spanEmail" class="error_msg" style="color: red"></span>

                <input type="tel" id="phone_number_signup" placeholder="Phone Number" />
                <span id="spanPhone" class="error_msg" style="color: red"></span>

                <input type="text" id="address_signup" placeholder="Address" />
                <span id="spanAddress" class="error_msg" style="color: red"></span>

                <!-- Nút Submit -->
                <button type="button" onclick="submitRegister()">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST" autocomplete="off" action="../../Model/user/connectData.php"
                onsubmit="return checkLogin()">
                <h1>Sign In</h1>

                <input type="hidden" name="action" value="login" />
                <!-- Các trường nhập -->
                <input type="text" id="user_name_login" placeholder="User Name" />
                <input type="password" id="password_login" placeholder="Password" />
                <!-- Nút Submit -->
                <button type="button" onclick="submitLogin()">Log In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Log In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>
                        Register with your personal details to use all of site features
                    </p>
                    <button class="hidden" id="signup">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <?php require '../../Js/user/script.php'?>
    <!-- Include your JavaScript files -->
    <script src="../../Js/user/signup_login.js"></script>
    <script src="../../Js/user/validation.js"></script>

</body>

</html>