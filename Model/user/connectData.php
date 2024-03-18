<?php
session_start(); // Start session if not already started

require_once '../DBConfig.php'; // Include the DBConfig class

$db = new DBConfig(); // Create an instance of DBConfig class

// Kiểm tra hành động
if(isset($_POST["action"])){
    if($_POST["action"] == "signup"){
        signup();
    }
    else if($_POST["action"] == "login"){
        login();
    }
}

// Đăng ký
function signup(){
    global $db;

    $user_name = $_POST['user_name_signup'];
    $password = $_POST['password_signup'];
    $fullname = $_POST['fullname_signup'];
    $phone_number = $_POST['phone_number_signup'];
    $email = $_POST['email_signup'];
    $address = $_POST['address_signup'];



    // Check if username already exists
    $existing_user = $db->execute("SELECT * FROM acount WHERE user_name = '$user_name'");
    if($existing_user->num_rows > 0){
        echo "Tên đăng nhập đã tồn tại";
        exit;
    }

    // Băm mật khẩu trước khi lưu vào cơ sở dữ liệu
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Thêm thông tin vào bảng Acount
    $db->execute("INSERT INTO acount (user_name, password, id_role, status) VALUES ('$user_name', '$hashed_password', '', '')");

    // Lấy id của tài khoản vừa được thêm vào
    $account_id = $db->getLastInsertId();

    // Thêm thông tin vào bảng nguoiDung
    $db->execute("INSERT INTO nguoidung (fullname, email, phone_number, create_at, status, address, id_acount) VALUES ('$fullname', '$email', '$phone_number', CURDATE(), '', '$address', $account_id)");

    // Lưu ID vào session
    $_SESSION["id"] = $account_id;

    echo "Đăng ký thành công!";
}

// Đăng nhập
function login(){
    global $db;

    $user_name = $_POST['user_name_login'];
    $password = $_POST['password_login'];

    $user = $db->execute("SELECT * FROM acount WHERE user_name = '$user_name'");

    if($user->num_rows > 0){
        $row = $user->fetch_assoc();

        // So sánh mật khẩu băm với mật khẩu người dùng nhập vào
        if(password_verify($password, $row['password'])){
            $_SESSION["login"] = true;
            // Lưu ID từ bảng nguoiDung
            $_SESSION["id"] = $row["id"]; 
            echo 'Đăng nhập thành công!';

            // header("Location: ../View/cart.php"); 
            // exit;
        }
        else{
            echo "Mật khẩu sai";
            exit;
        }
    }
    else{
        echo "Tên đăng nhập không tồn tại";
        exit;
    }
}
?>