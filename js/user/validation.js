<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>;

function validateEmail(email) {
    var regexEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    return regexEmail.test(email);
}

function validatePhone(phone) {
    var regexPhone = /^0\d{9}$/;
    return regexPhone.test(phone);
}

function validatePass(pass) {
    var regexPass = /.{8,}/;
    return regexPass.test(pass);
}
function validateName(name) {
    if (name == "") return false;
    return true;
}
// function check_register() {
//     var fullname_signup = document.getElementById("fullname_signup").value;
//     var user_name_signup = document.getElementById("user_name_signup").value;
//     var password_signup = document.getElementById("password_signup").value;
//     var email_signup = document.getElementById("email_signup").value;
//     var phone_number_signup = document.getElementById(
//         "phone_number_signup"
//     ).value;
//     var address_signup = document.getElementById("address_signup").value;

//     // Gửi yêu cầu Ajax
//     var xhr = new XMLHttpRequest();
//     xhr.open("POST", "Controller/trangchu/index.php?action=login", true); // Điều chỉnh đường dẫn và action tại đây
//     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhr.onreadystatechange = function () {
//         if (xhr.readyState == 4 && xhr.status == 200) {
//             var response = xhr.responseText;
//             if (response == "success") {
//                 // Nếu tất cả thông tin hợp lệ, cho phép submit form
//                 return true;
//             } else {
//                 // Nếu có lỗi, hiển thị thông báo lỗi
//                 alert(response);
//                 return false;
//             }
//         }
//     };
//     xhr.send(
//         "fullname_signup=" +
//             encodeURIComponent(fullname_signup) +
//             "&user_name_signup=" +
//             encodeURIComponent(user_name_signup) +
//             "&password_signup=" +
//             encodeURIComponent(password_signup) +
//             "&email_signup=" +
//             encodeURIComponent(email_signup) +
//             "&phone_number_signup=" +
//             encodeURIComponent(phone_number_signup) +
//             "&address_signup=" +
//             encodeURIComponent(address_signup)
//     );
//     return false; // Ngăn form submit mặc định
// }

// function check_login() {
//     var user_name = document.getElementById("user_name_login").value;
//     var pass = document.getElementById("password_login").value;

//     // Check if any field is emptyz
//     if (user_name === "" || pass === "") {
//         alert("Vui lòng điền đầy đủ thông tin");
//         return false;
//     }

//     return true;
// }

const container = document.getElementById("container");
const signupBtn = document.getElementById("signup");
const loginBtn = document.getElementById("login");

signupBtn.addEventListener("click", () => {
    container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
    container.classList.remove("active");
});
