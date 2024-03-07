function validateEmail(email) {
  var regexEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
  return regexEmail.test(email);
}

function validatePhone(phone) {
  var regexPhone = /^0\d{9}$/;
  return regexPhone.test(phone);
}

function validatePass(pass) {
  var regexPass = /^(?=.*[a-zA-Z0-9]).{6,8}$/;
  return regexPass.test(pass);
}

function validatePass_Repass(pass, repass) {
  return pass === repass;
}

function check_register() {
  var pass = document.getElementById('password').value;
  var repass = document.getElementById('cpassword').value;
  var phone = document.getElementById('phone_number').value;
  var user_name = document.getElementById('user_name').value;
  var fullname = document.getElementById('fullname').value;
  var address = document.getElementById('address').value;
  var mail = document.getElementById('email').value;

  // Check if any field is empty
  if (
    user_name === '' ||
    fullname === '' ||
    address === '' ||
    mail === '' ||
    pass === '' ||
    repass === '' ||
    phone === ''
  ) {
    alert('Vui lòng điền đầy đủ thông tin');
    return false;
  }

  if (!validatePass(pass)) {
    document.getElementById('spanPw').innerText = 'Mật khẩu phải từ 6-8 kí tự';

    document.getElementById('password').focus();
    return false;
  } else if (!validatePass_Repass(pass, repass)) {
    document.getElementById('spanCpw').innerText = 'Mật khẩu không giống';

    document.getElementById('cpassword').focus();
    return false;
  } else if (!validatePhone(phone)) {
    document.getElementById('spanPhone').innerText =
      'Số điện thoại không hợp lệ';

    document.getElementById('phone_number').focus();
    return false;
  } else if (!validateEmail(mail)) {
    document.getElementById('spanEmail').innerText = 'Email không hợp lệ';

    document.getElementById('email').focus();
    return false;
  } else if (!validateName(user_name)) {
    document.getElementById('spanUsername').innerText =
      'Tên đăng nhập không hợp lệ';

    document.getElementById('user_name').focus();
    return false;
  } else if (!validateName(fullname)) {
    document.getElementById('spanFullname').innerText =
      'Tên đăng kí không hợp lệ';

    document.getElementById('fullname').focus();
    return false;
  }

  return true;
}

function check_login() {
  var user_name = document.getElementById('user_name').value;
  var pass = document.getElementById('password').value;

  // Check if any field is empty
  if (user_name === '' || pass === '') {
    alert('Vui lòng điền đầy đủ thông tin');
    return false;
  }

  if (!validatePass(pass)) {
    document.getElementById('spanPw').innerText = 'Mật khẩu không chính xác';

    document.getElementById('password').focus();
    return false;
  }
}
