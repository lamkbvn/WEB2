<?php
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
} else {
    $action = '';
}



include ("../../Model/DBConfig.php");
$db = new Database;
$db->connect();
// require_once('./View/Cart/cart.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Đọc dữ liệu từ phần thân của yêu cầu (request body)
    $requestData = file_get_contents('php://input');

    // Chuyển đổi dữ liệu từ chuỗi JSON thành mảng PHP
    $selectedProducts = json_decode($requestData, true);

    // Kiểm tra xem dữ liệu có được chuyển đổi thành công không
    if ($selectedProducts !== null) {
        $first=1;
        $id = date('dmyHis');
        // Dữ liệu đã được chuyển đổi thành công, bạn có thể thao tác với nó ở đây
        foreach ($selectedProducts as $product) {
            // Ví dụ: Lấy thông tin của từng sản phẩm và in ra
            $id_product = $product['id_product'];
            $amount = $product['amount'];
            $price = $product['price'];
            $date = $product['date'];
            $dateBuy = date('y-m-d');
            $hoTen = $product['hoTen']; // Thêm dữ liệu Họ tên
            $email = $product['email']; // Thêm dữ liệu Email
            $sodienthoai = $product['sodienthoai']; // Thêm dữ liệu Số điện thoại
            $diachi = $product['diachi']; // Thêm dữ liệu Địa chỉ
            $note_book_tour = $product['note_book_tour']; // Thêm dữ liệu Ghi chú
            $tongTien = $product['tongTien'];
            if($first==1){
                $db->InsertOrder($id, 1, $hoTen, $email, $sodienthoai, $diachi, $note_book_tour, $dateBuy, $tongTien, 1);
                $first=0;
            }
            $db->InsertDetailOrder($id, $id_product, $price, $amount, $price*$amount, $date);
            echo "ID sản phẩm: $id_product, Số lượng book/tour: $amount, Tổng tiền: $tongTien, Số lượng: $amount, Giá: $price, Ngày: $date<br>";
   // Sau đó, bạn có thể thực hiện các thao tác xử lý dữ liệu khác tại đây
}
} else {
    // Xử lý lỗi nếu dữ liệu không thể chuyển đổi thành mảng PHP
    echo "Có lỗi xảy ra khi xử lý dữ liệu từ JavaScript.";
}

} else {
    // Xử lý lỗi nếu không phải là một request POST
    echo "Yêu cầu không hợp lệ.";
}

$db->disconnect();
?>