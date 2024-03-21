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
//     var pass = document.getElementById("password_signup").value;
//     var phone = document.getElementById("phone_number_signup").value;
//     var user_name = document.getElementById("user_name_signup").value;
//     var fullname = document.getElementById("fullname_signup").value;
//     var address = document.getElementById("address_signup").value;
//     var mail = document.getElementById("email_signup").value;

//     var isTrue = true;
//     // Check if any field is empty
//     // if (
//     //     user_name === "" ||
//     //     fullname === "" ||
//     //     address === "" ||
//     //     mail === "" ||
//     //     pass === "" ||
//     //     phone === ""
//     // ) {
//     //     alert("Vui lòng điền đầy đủ thông tin");
//     //     return false;
//     // }

//     if (!validatePass(pass)) {
//         document.getElementById("spanPw").innerText =
//             "Mật khẩu không đủ mạnh. Mật khẩu cần tối thiểu 8 kí tự";

//         isTrue= false;
//     }
//     if (!validatePhone(phone)) {
//         document.getElementById("spanPhone").innerText =
//             "Số điện thoại không hợp lệ. Vui lòng nhập lại số điện thoại.";

//         isTrue= false;
//     }
//     if (!validateEmail(mail)) {
//         document.getElementById("spanEmail").innerText =
//             "Email không hợp lệ. Vui lòng nhập lại email.";

//         isTrue= false;
//     }
//     if (!validateName(user_name)) {
//       document.getElementById('spanUsername').innerText =
//         'Tên đăng nhập không hợp lệ';

//       isTrue= false;
//     }
//     if (!validateName(fullname)) {
//       document.getElementById('spanFullname_signup').innerText =
//         'Tên đăng kí không hợp lệ';
//       isTrue= false;
//     }

//     // return isTrue;
//     return true;
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
