<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script type="text/javascript">
// Hàm xử lý đăng ký
function submitRegister() {


    $(document).ready(function() {
        var data = {
            user_name_signup: $("#user_name_signup").val(),
            password_signup: $("#password_signup").val(),
            fullname_signup: $("#fullname_signup").val(),
            phone_number_signup: $("#phone_number_signup").val(),
            email_signup: $("#email_signup").val(),
            address_signup: $("#address_signup").val(),
            action: "signup",
        };

        // Kiểm tra validation ở đây
        if (check_register()) {
            $.ajax({
                url: '../../Model/user/connectData.php',
                type: 'post',
                data: data,
                success: function(response) {
                    alert(response);
                    if (response == "Đăng ký thành công!") {
                        window.location.reload();
                    }
                }
            });
        }
    });
}


// Hàm xử lý đăng nhập
function submitLogin(event) {

    $(document).ready(function() {
        var data = {
            user_name_login: $("#user_name_login").val(),
            password_login: $("#password_login").val(),
            action: "login",
        };

        // Kiểm tra validation ở đây
        if (check_login()) {
            $.ajax({
                url: '../../Model/user/connectData.php',
                type: 'post',
                data: data,
                success: function(response) {
                    alert(response);
                    if (response == "Đăng nhập thành công!") {
                        window.location.href = "../../View/user/cart.php";
                    }
                }
            });
        }
    });
}
</script>