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
                    <input type="text" name="username" id="user_name_login" placeholder="User Name">
                </div>
                <div class="form--inner--fill">
                    <input type="password" name="password" id="password_login" placeholder="Password">
                </div>
                <button type="submit" name="login">Log In</button>
            </form>
        </div>
        <div class="form-container sign-up">
            <form method="post" onsubmit="validateForm()">
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
    function validateForm() {
        var fullname = document.getElementById('fullname_signup').value.trim();
        var username = document.getElementById('user_name_signup').value.trim();
        var password = document.getElementById('password_signup').value.trim();
        var email = document.getElementById('email_signup').value.trim();
        var phone = document.getElementById('phone_number_signup').value.trim();
        var address = document.getElementById('address_signup').value.trim();

        var fullname_error = document.getElementById('spanFullname_signup');
        var username_error = document.getElementById('spanUsername');
        var password_error = document.getElementById('spanPw');
        var email_error = document.getElementById('spanEmail');
        var phone_error = document.getElementById('spanPhone');
        var address_error = document.getElementById('spanAddress');

        var valid = true;

        // Kiểm tra Tên đầy đủ
        if (fullname === '') {
            fullname_error.textContent = 'Vui lòng nhập họ và tên';
            valid = false;
        } else {
            fullname_error.textContent = '';
        }

        // Kiểm tra Tên người dùng
        if (username.length < 6) {
            username_error.textContent = 'Tên người dùng phải có ít nhất 6 ký tự';
            valid = false;
        } else {
            username_error.textContent = '';
        }

        // Kiểm tra Mật khẩu
        if (password.length < 6) {
            password_error.textContent = 'Mật khẩu phải có ít nhất 6 ký tự';
            valid = false;
        } else {
            password_error.textContent = '';
        }

        // Kiểm tra Email
        if (!/^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/.test(email)) {
            email_error.textContent = 'Email không hợp lệ';
            valid = false;
        } else {
            email_error.textContent = '';
        }

        // Kiểm tra Số điện thoại
        if (!/^\d{10,11}$/.test(phone)) {
            phone_error.textContent = 'Số điện thoại không hợp lệ';
            valid = false;
        } else {
            phone_error.textContent = '';
        }

        // Kiểm tra Địa chỉ
        if (address.length < 6) {
            address_error.textContent = 'Địa chỉ phải có ít nhất 6 ký tự';
            valid = false;
        } else {
            address_error.textContent = '';
        }


        return valid;
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
                    address: address
                },
                // Xử lý phản hồi từ server ở đây
                success: function(response) {
                    if (response.trim() === "exists") {
                        alert("Tài khoản đã tồn tại, vui lòng nhập lại!"); // Thông báo tài khoản đã tồn tại
                    } else if (response.trim() === "valid") {
                        alert("Tài khoản đúng!");
                    } else {
                        alert("Đã xảy ra lỗi!");
                    }
                },

                error: function(xhr, status, error) {
                    // Xử lý lỗi nếu có
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

<!-- <link rel="stylesheet" href="Controller/trangchu/check_username.php"> -->