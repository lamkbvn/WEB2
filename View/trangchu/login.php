<?php


// session_start();


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
            <form id="formSign_in">
                <h1>Sign In</h1>
                <input type="hidden" name="action" value="login">
                <div class="form--inner--fill">
                    <!-- <label class="add-user--label" for="fullname">Tài khoản:</label><br> -->
                    <input type="text" name="username" id="user_name_login" placeholder="User Name">

                </div>
                <div class="form--inner--fill">
                    <!-- <label class="add-user--label" for="email">Mật khẩu:</label><br> -->
                    <input type="password" name="password" id="password_login" placeholder="Password">
                </div>
                <a href="?action=forgotPassword" style="color: red">Quên mật khẩu </a>
                <button type="submit" name="login" value="yes" onclick="loginAjax()">Log In</button>

            </form>
        </div>
        <div class="form-container sign-up">
            <form id="signup_form" method="post" onsubmit="return validateForm()">
                <h1>Create Account</h1>
                <input type="hidden" name="action" value="signup">
                <!-- Các trường nhập -->
                <input type="text" id="fullname_signup" name="fullname_signup" placeholder="Full Name">
                <span id="spanFullname_signup" class="error_msg" style="color: red;"></span>

                <input type="text" id="user_name_signup" name="user_name_signup" placeholder="User Name">
                <span id="spanUsername" class="error_msg" style="color: red;"></span>


                <input type="password" id="password_signup" name="password_signup" placeholder="Password">
                <span id="spanPw" class="error_msg" style="color: red;"></span>

                <input type="email" id="email_signup" name="email_signup" placeholder="Email">
                <span id="spanEmail" class="error_msg" style="color: red;"></span>

                <input type="tel" id="phone_number_signup" name="phone_number_signup" placeholder="Phone Number" />
                <span id="spanPhone" class="error_msg" style="color: red;"></span>

                <input type="text" id="address_signup" name="address_signup" placeholder="Address" />
                <span id="spanAddress" class="error_msg" style="color: red;"></span>

                <!-- Nút Submit -->
                <button type='submit' name="btnRegister">Sign Up</button>
            </form>
        </div>
        <div id="result"></div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hiddenLoc" id="login">Log In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hiddenLoc" id="signup">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    const container = document.getElementById("container");
    const signupBtn = document.getElementById("signup");
    const loginBtn = document.getElementById("login");

    signupBtn.addEventListener("click", () => {
        container.classList.add("active");
    });

    loginBtn.addEventListener("click", () => {
        container.classList.remove("active");
    });
</script>
<script>
    let checkValid = 0;

    function validateForm() {
        var fullname = document.getElementById("fullname_signup").value.trim();
        var username = document.getElementById("user_name_signup").value.trim();
        var password = document.getElementById("password_signup").value.trim();
        var email = document.getElementById("email_signup").value.trim();
        var phoneNumber = document.getElementById("phone_number_signup").value.trim();
        var address = document.getElementById("address_signup").value.trim();

        var error = false;

        // Kiểm tra điều kiện và hiển thị thông báo lỗi nếu cần
        if (fullname === "") {
            document.getElementById("spanFullname_signup").textContent = "Vui lòng nhập họ và tên";
            error = true;
        } else {
            document.getElementById("spanFullname_signup").textContent = "";
        }

        if (username === "") {
            document.getElementById("spanUsername").textContent = "Vui lòng nhập username";
            error = true;
        } else if (username.length < 6) {
            document.getElementById("spanUsername").textContent = "Tên người dùng phải có ít nhất 6 ký tự";
            error = true;
        } else {
            document.getElementById("spanUsername").textContent = "";
        }

        if (password === "") {
            document.getElementById("spanPw").textContent = "Vui lòng nhập password";
            error = true;
        } else if (password.length < 6) {
            document.getElementById("spanPw").textContent = "Mật khẩu phải có ít nhất 6 ký tự";
            error = true;
        } else {
            document.getElementById("spanPw").textContent = "";
        }

        var email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var phone_regex = /^\d{10,11}$/;

        // Kiểm tra email
        if (!email_regex.test(email)) {
            document.getElementById("spanEmail").textContent = "Email không hợp lệ";
            error = true;
        } else {
            document.getElementById("spanEmail").textContent = "";
        }

        if (phoneNumber === "") {
            document.getElementById("spanPhone").textContent = "Vui lòng nhập số điện thoại";
            error = true;
        } else if (!/^\d{10,11}$/.test(phoneNumber)) {
            document.getElementById("spanPhone").textContent = "Số điện thoại không hợp lệ";
            error = true;
        } else {
            document.getElementById("spanPhone").textContent = "";
        }

        if (username === "") {
            document.getElementById("spanAddress").textContent = "Vui lòng nhập địa chỉ";
            error = true;
        } else {
            document.getElementById("spanAddress").textContent = "";
        }

        if (error) {
            return false;
        }
        checkValid = 1;

        return true;
    }




    $(document).ready(function() {
        $('.sign-up form').submit(function(e) {
            e.preventDefault(); // Ngăn chặn việc gửi form mặc định

            // Thu thập dữ liệu từ form
            var fullname = $('#fullname_signup').val();
            var username = $('#user_name_signup').val();
            var password = $('#password_signup').val();
            var email = $('#email_signup').val();
            var phoneNumber = $('#phone_number_signup').val();
            var address = $('#address_signup').val();

            // Gửi AJAX request
            $.ajax({
                type: 'POST',
                url: 'Controller/trangchu/check_username.php',
                data: {
                    fullname: fullname,
                    username: username,
                    password: password,
                    email: email,
                    phone_number: phoneNumber,
                    address: address,
                    checkValid: checkValid
                },
                // Xử lý phản hồi từ server ở đây
                success: function(response) {
                    if (response.trim() === "exists username") {
                        alert("Tài khoản đã tồn tại, vui lòng nhập lại!");
                    } else if (response.trim() === "exists email") {
                        alert("Email đã tồn tại, vui lòng nhập lại!");
                    } else if (response.trim() === "exists phone") {
                        alert("Số điện thoại đã tồn tại, vui lòng nhập lại!");
                    } else if (response.trim() === "valid") {
                        alert("Đăng kí thành công");
                    } else {
                        alert("Vui lòng nhập đầy đủ thông tin");
                    }
                },

                error: function(xhr, status, error) {
                    // Xử lý lỗi nếu có
                    console.error(xhr.responseText);
                }
            });
        });
    });


    function loginAjax() {
        var formData = $('#formSign_in').serialize(); // Sử dụng .serialize() để thu thập dữ liệu từ form

        $.ajax({
            url: "/WEB2/Controller/trangchu/index.php",
            type: "POST",
            data: formData,
            success: function(response) {
                if (xhr.status === 401) {
                    // Hiển thị thông báo lỗi nếu thông tin đăng nhập không chính xác
                    alert("Tên đăng nhập hoặc mật khẩu không đúng!");
                } else {
                    // Xử lý phản hồi từ server
                    console.log(response);
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                // Xử lý lỗi nếu có
            }
        });
    }
</script>

<!-- <link rel="stylesheet" href="Controller/trangchu/check_username.php"> -->