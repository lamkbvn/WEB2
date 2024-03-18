<?php

// session_start();
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $objuser = array($username, $password);

    $_SESSION['objuser'] = $objuser;

    header('location: index.php?controller=trang-chu');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="Css/user/style.css" />
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="" method="post">
                <h1>Sign In</h1>
                <div class="form--inner--fill">
                    <label class="add-user--label" for="fullname">Tài khoản:</label><br>
                    <input type="text" name="username" id="user_name_login" placeholder="User Name">

                </div>
                <div class="form--inner--fill">
                    <label class="add-user--label" for="email">Mật khẩu:</label><br>
                    <input type="password" name="password" id="password_login" placeholder="Password">
                </div>

                <button type="submit" name="login">Log In</button>
            </form>
        </div>
    </div>

    <script src="Js/user/validation.js"></script>
</body>

</html>