<style>
body {
    font-family: Arial, sans-serif;
}



.container h3 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"],
input[type="button"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.alert {
    color: green;
    text-align: center;
}
</style>

<?php

if(isset($_GET['id']) && $_GET['id'] > 0){
    // Get the voucher ID from the URL
    $voucherId = $_GET['id'];

    // Fetch voucher details from the database based on the ID
    // Assuming you have a method to fetch voucher details by ID in your DBConfig class
    $voucherDetails = $db->getVoucherDetailsById($voucherId);

    // Check if voucher details are retrieved successfully
    if($voucherDetails) {
        // Extract voucher details into variables
        extract($voucherDetails);
    }
}
?>




<body>
    <h3>Sửa Voucher</h3>
    <form action="index.php?action=capnhatvoucher" method="POST">
        <label for="ten-voucher">Tên Voucher</label>
        <input type="text" id="ten-voucher" name="ten_voucher"
            value="<?= isset($discount_name) ? $discount_name : '' ?>">

        <label for="ma-voucher">Mã Voucher</label>
        <input type="text" id="ma-voucher" name="ma_voucher" value="<?= isset($code) ? $code : '' ?>">

        <label for="mo-ta">Mô tả</label>
        <input type="text" id="mo-ta" name="mo_ta" value="<?= isset($description) ? $description : '' ?>">

        <label for="gia-tri">Giá trị</label>
        <input type="text" id="gia-tri" name="gia_tri" value="<?= isset($percent) ? $percent : '' ?>">

        <label for="ngay-bat-dau">Ngày bắt đầu</label>
        <input type="date" id="ngay-bat-dau" name="ngay_bat_dau" value="<?= isset($date_start) ? $date_start : '' ?>">

        <label for="ngay-ket-thuc">Ngày kết thúc</label>
        <input type="date" id="ngay-ket-thuc" name="ngay_ket_thuc" value="<?= isset($date_end) ? $date_end : '' ?>">

        <input type="hidden" name="id" value="<?php if(isset($id) && ($id) > 0) echo $id ?>">
        <input type="submit" name="btnedit" value="Cập Nhật">
    </form>
    <?php
			if (isset($alert) && $alert == 'edit_success') {
				echo "<p style='color: green; align-item: center;'>Thêm thành công</p>";
			} else return;
	?>
</body>