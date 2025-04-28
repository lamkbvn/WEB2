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


<body>
    <h3>Thêm voucher</h3>
    <form action="index.php?action=themvoucher" method="POST">

        <label for="ten-voucher">Tên Voucher</label>
        <input type="text" id="ten-voucher" name="ten_voucher">
        <label for="ma-voucher">Mã Voucher</label>
        <input type="text" id="ma-voucher" name="ma_voucher">
        <label for="mo-ta">Mô tả</label>
        <input type="text" id="mo-ta" name="mo_ta">
        <label for="gia-tri">Giá trị</label>
        <input type="text" id="gia-tri" name="gia_tri">
        <label for="ngay-bat-dau">Ngày bắt đầu</label>
        <input type="date" id="ngay-bat-dau" name="ngay_bat_dau">
        <label for="ngay-ket-thuc">Ngày kết thúc</label>
        <input type="date" id="ngay-ket-thuc" name="ngay_ket_thuc">
        <input type="submit" name="btnadd" value="Thêm">
    </form>
    <?php
			if (isset($alert) && $alert == 'add_success') {
				echo "<p style='color: green; align-item: center;'>Thêm thành công</p>";
			} else return;
	?>
</body>